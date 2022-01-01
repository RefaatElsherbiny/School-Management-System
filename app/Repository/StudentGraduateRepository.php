<?php

namespace App\Repository;

use App\Models\grades;
use App\Students;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentGraduateRepository implements StudentGraduateRepositoryInterface
{

//Show promotion Table on database

    public function index()
    {
        //This SoftDelete use onlyTrashed
        $students = Students::onlyTrashed()->get();
        return view('Students.Graduated.index' , compact('students'));

    }


    public function create()
    {
        $Grade = grades::all();
        return view('Students.Graduated.create' , compact('Grade'));
    }

    public function store($request)
    {
        $students = Students::where('Grade_id',$request->Grade_id)->where('Classroom_id',$request->Class_room_id)
        ->where('section_id',$request->section_id)->get();
        
          if ($students->count() < 1) {

            return redirect()->back()->with('error_Graduated', __('لاتوجد بيانات في جدول الطلاب'));
          }

         foreach ($students as $students){
           $ids = explode(',' , $students->id);
           Students::whereIn('id' , $ids)->delete();
        }
        toastr()->success(trans('messages.success'));
        return redirect()->route('Graduate.index');

    }
   


    public function ReturnData($request)
    {
        Students::onlyTrashed()->where('id', $request->id)->first()->restore();
        toastr()->success(trans('messages.success'));
        return redirect()->back();
    }

    public function destroy($request)
    {
        Students::onlyTrashed()->where('id', $request->id)->first()->forceDelete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();
    }
}
