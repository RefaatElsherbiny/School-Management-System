<?php

namespace App\Repository;

use App\Models\grades;
use App\Models\promotion;
use App\Students;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentPromotionRepository implements StudentPromotionRepositoryInterface
{

//Show promotion Table on database

    public function index()
    {
        $Grades = grades::all();
        return view('admin.Students.promotion.index', compact('Grades'));
    }


    public function create()
    {
        $promotions = promotion::all();
        return view('admin.Students.promotion.management', compact('promotions'));
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {
            $students = Students::where('Grade_id', $request->Grade_id)->where('Classroom_id', $request->Class_room_id)
                    ->where('section_id', $request->section_id)->where('academic_year', $request->academic_year)->get();

            if ($students->count() < 1) {
                return redirect()->back()->with('error_promotions', __('لاتوجد بيانات في جدول الطلاب'));
            }

            foreach ($students as $student) {
                $ids = explode(',', $student->id);
                $refat =  Students::whereIn('id', $ids)
        ->update([
            'Grade_id'=>$request->Grade_id_new,
            'Classroom_id'=>$request->Classroom_id_new,
            'section_id'=>$request->section_id_new,
            'academic_year'=>$request->academic_year_new,
        ]);

                Promotion::updateOrCreate([
            'student_id'=>$student->id,
            'from_grade'=>$request->Grade_id,
            'from_Classroom'=>$request->Class_room_id,
            'from_section'=>$request->section_id,
            'to_grade'=>$request->Grade_id_new,
            'to_Classroom'=>$request->Classroom_id_new,
            'to_section'=>$request->section_id_new,
            'academic_year'=>$request->academic_year,
            'academic_year_new'=>$request->academic_year_new,
        ]);
            }

            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function delete($request)
    {
        DB::beginTransaction();

        try {

            // التراجع عن الكل
            if($request->page_id ==1){

             $Promotions = Promotion::all();
             foreach ($Promotions as $Promotion){

                 //التحديث في جدول الطلاب
                 $ids = explode(',',$Promotion->student_id);

                 Students::whereIn('id', $ids)
                 ->update([
                 'Grade_id'=>$Promotion->from_grade,
                 'Classroom_id'=>$Promotion->from_Classroom,
                 'section_id'=> $Promotion->from_section,
                 'academic_year'=>$Promotion->academic_year,
               ]);

                 //حذف جدول الترقيات
                 Promotion::truncate();

             }
                DB::commit();
                toastr()->error(trans('messages.Delete'));
                return redirect()->back();

            }

            else{

                $Promotion = Promotion::findorfail($request->id);
                Students::where('id' , $Promotion->student_id)
                    ->update([
                        'Grade_id'=>$Promotion->from_grade,
                        'Classroom_id'=>$Promotion->from_Classroom,
                        'section_id'=> $Promotion->from_section,
                        'academic_year'=>$Promotion->academic_year,
                    ]);


                Promotion::destroy($request->id);
                DB::commit();
                toastr()->error(trans('messages.Delete'));
                return redirect()->back();

            }

        }

        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
