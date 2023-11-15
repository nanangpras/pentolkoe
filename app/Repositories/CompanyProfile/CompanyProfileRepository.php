<?php

namespace App\Repositories\CompanyProfile;
use App\Models\DetailCompany;
use Illuminate\Http\Request;
use App\Repositories\CompanyProfile\InterfaceCompanyProfile;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class CompanyProfileRepository implements InterfaceCompanyProfile
{
    protected $companyProfile;

    public function __construct(DetailCompany $companyProfile)
    {
        $this->companyProfile = $companyProfile;
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
        return $this->companyProfile->first();
    }

    public function getById($id)
    {
        return $this->companyProfile->where('id',$id)->first();
    }

    public function save(Request $request)
    {
        $companyProfile              = new $this->companyProfile;
        $companyProfile->name        = $request->name;
        $companyProfile->tagline     = $request->tagline;
        $companyProfile->description = $request->description;
        $companyProfile->link        = $request->link;
        $companyProfile->address     = $request->address;
        $companyProfile->link_fb     = $request->link_fb;
        $companyProfile->link_ig     = $request->link_ig;
        $companyProfile->link_tiktok = $request->link_tiktok;
        $companyProfile->phone       = $request->phone;
        $companyProfile->email       = $request->email;
        $companyProfile->logo        = $request->logo;


        if ($request->file('imagecompany')) {
            $file = $request->file('imagecompany');
            $companyProfile->image = $this->uploadImages($file,'image/company_profile');
        }
        if ($request->file('logocompany')) {
            $logo = $request->file('logocompany');
            $companyProfile->logo = $this->uploadImages($logo,'image/company_profile/logo');
        }
        $companyProfile->save();

        return $companyProfile->fresh();
    }

    public function delete($id)
    {
        $companyProfile = $this->companyProfile->find($id);
        $companyProfile->delete();
    }

    public function update(Request $request, $id)
    {
        $update              = $this->companyProfile->find($id);
        $update->name        = $request->name;
        $update->tagline     = $request->tagline;
        $update->description = $request->description;
        $update->link        = $request->link;
        $update->address     = $request->address;
        $update->link_fb     = $request->link_fb;
        $update->link_ig     = $request->link_ig;
        $update->link_tiktok = $request->link_tiktok;
        $update->phone       = $request->phone;
        $update->email       = $request->email;
        $update->logo        = $request->logo;

        if ($request->file('logo')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
                // $image_path = $request->oldImage;
                // unlink($image_path);
            }
            $update->image = $this->uploadImages($request->file('logo'),'image/company_profile/logo');
        }

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
                // $image_path = $request->oldImage;
                // unlink($image_path);
            }
            $update->image = $this->uploadImages($request->file('image'),'image/company_profile');
        }
        $update->save();
        return $update->fresh();
    }
}
