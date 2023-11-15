<?php

namespace App\Repositories\CompanyProfile;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Repositories\CompanyProfile\InterfaceCompanyProfile;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ClientCompanyRepository implements InterfaceCompanyProfile
{
    protected $clientCompany;

    public function __construct(Client $clientCompany)
    {
        $this->clientCompany = $clientCompany;
    }

    private function base()
    {
        $base_path = '';
    }

    protected function uploadImages($file, $path)
    {
        $date = Carbon::now();
        $filePath = $path . "/$date->year";
        $filename = $this->base() . $date->timestamp . '_' . $file->getClientOriginalName();
        $dd = $file->storeAs(
            $filePath, $filename, 'public'
        );
        $url = Storage::disk('public')->url($dd);
        return $url;
    }

    public function getAll()
    {
        return $this->clientCompany->all();
    }

    public function getById($id)
    {
        return $this->clientCompany->where('id',$id)->first();
    }

    public function save(Request $request)
    {
        $clientCompany              = new $this->clientCompany;
        $clientCompany->name        = $request->name;
        $clientCompany->address     = $request->address;
        $clientCompany->link        = $request->link;


        if ($request->file('logo')) {
            $file = $request->file('logo');
            $clientCompany->logo = $this->uploadImages($file,'image/company_profile/logo-client');
        }
        $clientCompany->save();

        return $clientCompany->fresh();
    }

    public function delete($id)
    {
        $clientCompany = $this->clientCompany->find($id);
        $clientCompany->delete();
    }

    public function update(Request $request, $id)
    {
        $update              = $this->clientCompany->find($id);
        $update->name        = $request->name;
        $update->address     = $request->address;
        $update->link        = $request->link;

        if ($request->file('logo')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
                // $image_path = $request->oldImage;
                // unlink($image_path);
            }
            $update->logo = $this->uploadImages($request->file('logo'),'image/company_profile/logo-client');
        }
        $update->save();
        return $update->fresh();
    }
}
