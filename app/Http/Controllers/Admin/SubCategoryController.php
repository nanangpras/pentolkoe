<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\CategoryService;
use App\Service\SubCategoryService;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    protected $subCategoryService;

    public function __construct(SubCategoryService $categoryService)
    {
        $this->subCategoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategory = $this->subCategoryService->getAll();
        return view('admin.pages.category_sub.data',compact('subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->subCategoryService->save($request);
        return redirect()->route('subcategory.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $detail = $this->subCategoryService->getCategoryId($id);
        if ($request->key == "delete") {
            return view('admin.pages.category_sub.delete',compact('detail'));
        } else {
            return view('admin.pages.category_sub.show',compact('detail'));
        }

        // return $detail;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->subCategoryService->delete($id);
        return redirect()->route('subcategory.index');
    }

    public function getSubCategory($type,$id)
    {
        $subproduct = $this->subCategoryService->getsubCategory($type,$id);
        return response()->json($subproduct);
    }
}
