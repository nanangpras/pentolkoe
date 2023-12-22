<?php

namespace App\Repositories\Course;

use App\Models\Chapter;
use App\Models\Coupon;
use App\Models\Lesson;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Repositories\Course\InterfaceCourse;

class CourseRepository implements InterfaceCourse
{

    public function saveChapter(Request $request)
    {
        $chapter                 = new Chapter();
        $chapter->name           = $request->name;
        $chapter->product_id     = $request->product_id;
        $chapter->save();

        return $chapter->fresh();
    }

    public function updateChapter(Request $request, $id)
    {
        $chapter             = Chapter::find($id);
        $chapter->name       = $request->name;
        $chapter->product_id = $request->product_id;
        $chapter->save();

        return $chapter->fresh();
    }

    public function deleteChapter($id)
    {
        $delete = Chapter::findOrFail($id);
        $delete->delete();
    }

    public function saveLesson(Request $request)
    {
        $lesson             = new Lesson();
        $lesson->name       = $request->name;
        $lesson->video      = $request->video;
        $lesson->chapter_id = $request->chapter_id;
        $lesson->save();
        return $lesson->fresh();
    }

    public function updateLesson(Request $request, $id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->name       = $request->name;
        $lesson->video      = $request->video;
        $lesson->chapter_id = $request->chapter_id;
        $lesson->save();
        return $lesson->fresh();
    }

    public function deleteLesson($id)
    {
        $delete = Lesson::find($id);
        $delete->delete();
    }

    // member

    public function listCourseFree()
    {
        $data = Product::with('productImages')->where('flags', '=','free')->get();
        return $data;
    }

    public function detailCourse($slug)
    {
        $detail = Product::with(['chapters','chapters.lessons'])->where('slug', '=',$slug)->first();
        return $detail;
    }

    public function detailLesson($id)
    {
        $lesson = Lesson::findOrFail($id);
        return $lesson;
    }
}
