<?php

namespace App\Service;

use App\Repositories\Coupon\CouponRepository;
use App\Repositories\Course\CourseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Exception;

class CourseService
{
    protected $course;
    public function __construct(CourseRepository $course)
    {
        $this->course = $course;
    }

    public function saveChapter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'product_id' => 'required',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->course->saveChapter($request);

        return $result;
    }

    public function updateChapter(Request $request, $id)
    {
        return $this->course->updateChapter($request,$id);
    }

    public function deleteChapter($id)
    {
        return $this->course->deleteChapter($id);
    }

    public function saveLesson(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'video' => 'required',
            'chapter_id' => 'required',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->course->saveLesson($request);

        return $result;
    }

    public function updateLesson(Request $request, $id)
    {
        return $this->course->updateLesson($request,$id);
    }

    public function deleteLesson($id)
    {
        return $this->course->deleteLesson($id);
    }
}
