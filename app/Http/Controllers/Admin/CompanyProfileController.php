<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\CompanyProfileService;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    protected $comproService;

    public function __construct(CompanyProfileService $comproService)
    {
        $this->comproService = $comproService;
    }

    public function index()
    {
        $company = $this->comproService->getAll();
        return view('admin.pages.company_profile.data',compact('company'));
    }

    public function store(Request $request)
    {
        $this->comproService->save($request);
        return redirect()->route('setting-company')->with('success', 'Data berhasil ditambahkan');
    }
}
