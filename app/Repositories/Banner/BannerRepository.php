<?php

namespace App\Repositories\Banner;

use App\Models\Banner;
use App\Repositories\Banner\InterfaceBanner;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BannerRepository implements InterfaceBanner
{
    protected $banner;

    public function __construct(Banner $banner)
    {
        $this->banner = $banner;
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
        return $this->banner->get();
    }

    public function getById($id)
    {
        return $this->banner->where('id',$id)->first();
    }

    public function save(Request $request)
    {
        $banner = new $this->banner;
        $banner->name = $request->name;
        $banner->description = $request->description;
        $banner->slug = Str::slug($request->name);
        $banner->status = $request->status;
        $banner->link = $request->link;
        $banner->status = 1;
        $file = $request->file('banner_image');
        $banner->banner_image = $this->uploadImages($file,'image/banner');
        $banner->save();

        return $banner->fresh();
    }

    public function delete($id)
    {
        $category = $this->banner->find($id);
        $category->delete();
    }

    public function update(Request $request, $id)
    {
        $update = $this->banner->find($id);
        $update->name = $request->name;
        $update->description = $request->description;
        $update->slug = Str::slug($request->name);
        $update->status = $request->status;
        $update->link = $request->link;
        $update->status = $request->status;
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
                // $image_path = $request->oldImage;
                // unlink($image_path);
            }
            $update->banner_image = $this->uploadImages($request->file('image'),'image/category');
        }
        $update->save();
        return $update->fresh();
    }
}
