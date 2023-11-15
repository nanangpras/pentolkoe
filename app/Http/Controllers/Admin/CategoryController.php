<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
// use App\Service\Category\CategoryService as CategoryService;
use App\Service\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = $this->categoryService->getAll();
        return view('admin.pages.category.data',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = $this->categoryService->save($request);
        $subcategory = new Category();
        $subcategory->parent_id = $category->id;
        $subcategory->name = $request->namesubcategory;
        $subcategory->type = $request->type;
        $subcategory->image = url('themes/assets/images/app_category.png');
        $subcategory->save();
        return redirect()->route('category.index')->with('success', 'Data berhasil ditambahkan');

    }

    public function saveSubcategory(Request $request)
    {
        $this->categoryService->saveSub($request);
        return redirect()->route('category.index')->with('success', 'Data Sub Kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function getSubCategory($id)
    {
        $this->categoryService->getById($id);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = $this->categoryService->getById($id);
        return view('admin.pages.category.edit',compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->categoryService->update($request,$id);
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->categoryService->delete($id);
        return redirect()->route('category.index');
    }
}
