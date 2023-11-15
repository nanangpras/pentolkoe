<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\CategoryService;
use App\Service\CourseService;
use App\Service\ProductService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $productService;
    protected $categoryService;
    protected $courseService;

    public function __construct(ProductService $productService, CategoryService $categoryService,CourseService $courseService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->courseService = $courseService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = 'edukasi';
        $data = $this->productService->getAllbyCategroyType($category);
        return view('admin.pages.course.data',compact('data'));
        // dd($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $category = $this->categoryService->getCategoryByType('edukasi');
        $product = $this->productService->getAllbyCategroyType('edukasi');
        $chapter = $request->session()->get('chapter');
        return view('admin.pages.course.create',compact('category','product','chapter'));
    }

    public function createChapter(Request $request)
    {
        $category = $this->categoryService->getCategoryByType('edukasi');
        $product = $this->productService->getAllbyCategroyType('edukasi');
        $chapter = $request->session()->get('chapter');
        return view('admin.pages.course.create.chapter',compact('category','product','chapter'));
    }

    public function storeChapter(Request $request)
    {
        if(empty($request->session()->get('chapter'))){
            $chapter = $this->courseService->saveChapter($request);
            $request->session()->put('chapter', $chapter);
        }else{
            $chapter = $request->session()->get('chapter');
            $request->session()->put('chapter', $chapter);
        }
        return view('admin.pages.course.create.lesson',compact('chapter'));
    }

    public function createLesson(Request $request)
    {
        $lesson = $request->session()->get('lesson');
        $chapter = $request->session()->get('chapter');
        return view('admin.pages.course.create.lesson',compact('lesson','chapter'));
    }

    public function storeLesson(Request $request)
    {
        $this->courseService->saveLesson($request);
        $request->session()->forget('lesson');
        $request->session()->forget('chapter');
        return redirect()->route('course.education.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->productService->save($request);
        return redirect()->route('course.index')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detail_course = $this->productService->getDetailCategroyType($id,'edukasi');
        // dd($detail_course);
        return view('admin.pages.course.detail',compact('detail_course'));
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
        //
    }
}
