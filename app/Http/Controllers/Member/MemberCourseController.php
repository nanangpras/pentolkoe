<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Service\CourseService;
use Illuminate\Http\Request;

class MemberCourseController extends Controller
{
    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    public function index()
    {
        $list = $this->courseService->listCourseFree();
        // dd($list);
        return view('member.pages.course.index',compact('list'));
    }

    public function detailCourse($slug)
    {
        $detail = $this->courseService->detailCourse($slug);
        // view()->share('detail',$detail);
        // dd($detail);
        return view('course.pages.course-content',compact('detail'));
    }

    public function detailLesson(Request $request, $id)
    {
        $slug = $request->slug;
        $detail = $this->courseService->detailCourse($slug);
        $lessonDetail = $this->courseService->detailLesson($id);
        return view('course.pages.lesson-content',compact('lessonDetail','detail'));
    }
}
