<?php

namespace App\Repositories\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\Subcategory\InterfaceSubcategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class SubcategoryRepository implements InterfaceSubcategory
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
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
        return $this->category->where('parent_id','!=', null)->get();
    }

    public function getSubCategory($type,$id)
    {
        return $this->category->where('type','=',$type)->where('parent_id',$id)->get();
    }

    public function getById($id)
    {
        return $this->category->where('parent_id',$id)->first();
    }

    public function getCategoryId($id)
    {
        return $this->category->where('id',$id)->first();
    }

    public function save(Request $request)
    {
        $subCategory = new $this->category;
        $subCategory->parent_id = $request->parent_id;
        $subCategory->name = $request->name;
        $file = $request->file('imagesub');
        if ($file) {
            $subCategory->image = $this->uploadImages($file,'image/subcategory');

        }else{
            $subCategory->image = url('themes/assets/images/app_category.png');
        }
        $subCategory->type = $request->type;
        $subCategory->save();
        return $subCategory->fresh();
    }

    public function delete($id)
    {
        $category = $this->category->findOrFail($id);
        $category->delete();
    }

    public function update(Request $request, $id)
    {
        $update = $this->category->where('id',$id)->first();
        $update->name = $request->name;
        $update->type = $request->type;
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
                // $image_path = $request->oldImage;
                // unlink($image_path);
            }
            $update->image = $this->uploadImages($request->file('image'),'image/category');
        }else{
            $update->image = url('themes/assets/images/app_category.png');
        }
        $update->save();
        return $update->fresh();
    }
}
