<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\CategoryService;
use App\Service\ProductService;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected $categoryService;
    protected $productService;

    public function __construct(CategoryService $categoryService, ProductService $productService)
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }

    public function index()
    {
        $product = $this->productService->getAll();
        $category = $this->categoryService->getAll();
        return view('admin.pages.shop.index',compact('category','product'));
    }

    public function detailProduct ($id)
    {
        $detailProduct = $this->productService->getById($id);
        return view('admin.pages.shop.detail-product',compact('detailProduct'));
    }
}
