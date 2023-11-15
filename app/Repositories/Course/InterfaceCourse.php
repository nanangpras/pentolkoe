<?php

namespace App\Repositories\Course;
use Illuminate\Http\Request;
use App\Models\Category;


interface InterfaceCourse
{
    public function saveChapter(Request $request);
    public function updateChapter(Request $request,$id);
    public function deleteChapter($id);
    public function saveLesson(Request $request);
    public function updateLesson(Request $request,$id);
    public function deleteLesson($id);
}
