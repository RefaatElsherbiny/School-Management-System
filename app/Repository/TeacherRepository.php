<?php

namespace App\Repository;

use App\gender;
use App\specializations;
use App\teachers;
use Exception;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface {

//Show Table on database

    public function get_all_teacher()
    {

        $Teachers =  teachers::all();
        return view('admin.teacher.teachers' , compact('Teachers'));

    }

    //Show_specializations And Gender

    public function Getspecialization(){
        return specializations::all();
    }

    public function GetGender(){
       return gender::all();
    }

// Create table on Database

   public function store_teacher($request)
   {

    try {
        $Teachers = new teachers();
        $Teachers->Email = $request->Email;
        $Teachers->Password =  Hash::make($request->Password);
        $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
        $Teachers->Specialization_id = $request->Specialization_id;
        $Teachers->Gender_id = $request->Gender_id;
        $Teachers->Joining_Date = $request->Joining_Date;
        $Teachers->Address = $request->Address;
        $Teachers->save();
        toastr()->success(trans('messages.success'));
        return redirect()->route('Teachers.index');
    }
    catch (Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
    }



   }
   public function editTeachers($id)
    {
        return teachers::findOrFail($id);
    }


  public function update_teacher ($request)
  {

    try {
                   $Teachers = teachers::findOrFail($request->id);
                   $Teachers->Email = $request->Email;
                   $Teachers->Password =  Hash::make($request->Password);
                   $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
                   $Teachers->Specialization_id = $request->Specialization_id;
                   $Teachers->Gender_id = $request->Gender_id;
                   $Teachers->Joining_Date = $request->Joining_Date;
                   $Teachers->Address = $request->Address;
                   $Teachers->save();
                   toastr()->success(trans('messages.Update'));
                   return redirect()->route('Teachers.index');
               }
               catch (Exception $e) {
                   return redirect()->back()->with(['error' => $e->getMessage()]);
               }

             }



//    public function UpdateTeachers($request)
//    {
//
//    }


// Delete table on Database

public function delete_teacher($request)
{
    teachers::findOrFail($request->id)->delete();
    toastr()->error(trans('messages.Delete'));
    return redirect()->route('Teachers.index');
}




}


