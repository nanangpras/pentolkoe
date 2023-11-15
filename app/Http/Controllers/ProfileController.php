<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Service\RajaOngkirService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    protected $rajaOngkirService;
    public function __construct(RajaOngkirService $rajaOngkirService)
    {
        $this->rajaOngkirService = $rajaOngkirService;
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // return view('profile.edit', [
        //     'user' => $request->user(),
        // ]);
        $user = auth()->user();
        $provinsi   = $this->rajaOngkirService->getProvince();
        $dtkabupaten  = $this->rajaOngkirService->getCity($user->province_id);
        $kabupaten = json_decode($dtkabupaten,true);
        $dtkecamatan = $this->rajaOngkirService->getSubdistrict($user->city_id);
        $kecamatan = json_decode($dtkecamatan,true);
        // dd($kabupaten);
        return view('member.pages.profile.profile', [
            'user'      => $request->user(),
            'provinsi'  => $provinsi,
            'kabupaten'  => $kabupaten,
            'kecamatan'  => $kecamatan,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
