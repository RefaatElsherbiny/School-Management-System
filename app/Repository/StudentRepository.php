<?php

namespace App\Repository;

use App\gender;
use App\Models\class_room;
use App\Models\grades;
use App\Models\Image;
use App\Models\My_Parent;
use App\Models\Sections;
use App\Models\Type_blood;
use App\Models\Type_nationalite;
use App\specializations;
use App\Students;
use App\teachers;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentRepository implements StudentRepositoryInterface {

//Show Table on database
public function show_student()
{
    $students = Students::all();
    return view('admin.Students.index',compact('students'));
}

    //Show Add Students

public function create_student()
{
    $data['nationals'] = Type_nationalite::all();
    $data['Genders'] = gender::all();

    $data['bloods'] = Type_blood::all();
    $data['grades'] = grades::all();
    $data['parents'] = My_Parent::all();

    return view('admin.Students.add', $data);
}

//insert On Database


public function Store_Student($request){


    DB::beginTransaction();

    try {
        $students = new Students();
        $students->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
        $students->email = $request->email;
        $students->password = Hash::make($request->password);
        $students->gender_id = $request->gender_id;
        $students->nationalitie_id = $request->nationalitie_id;
        $students->blood_id = $request->blood_id;
        $students->Date_Birth = $request->Date_Birth;
        $students->Grade_id = $request->Grade_id;
        $students->Classroom_id = $request->Class_room_id;
        $students->section_id = $request->section_id;
        $students->parent_id = $request->parent_id;
        $students->academic_year = $request->academic_year;
        $students->save();

        // insert img
        if($request->hasfile('photos'))

        {
            // storege Sutdents
            foreach($request->file('photos') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->storeAs('attachments/students/'.$students->name,
                $file->getClientOriginalName(),'upload_attachments');

                // insert in image_table
                $images= new Image();
                $images->filename=$name;
                $images->imageable_id= $students->id;
                $images->imageable_type = 'App\Students';
                $images->save();
            }
        }
        DB::commit(); // insert data
        toastr()->success(trans('messages.success'));
        return redirect()->route('Students.create');

    }

    catch (\Exception $e){
        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

}

// Edit table Student

public function Edit_Student($id)


{
    $data['nationals'] = Type_nationalite::all();
    $data['Genders'] = gender::all();
    $data['bloods'] = Type_blood::all();
    $data['Grades'] = grades::all();
    $data['parents'] = My_Parent::all();
    $Students =  Students::findOrFail($id);

    return view('admin.Students.edit',$data,compact('Students'));
}
// Update table Student
public function Update_Student($request)
    {
        try {
            $Edit_Students = Students::findorfail($request->id);
            $Edit_Students->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
            $Edit_Students->email = $request->email;
            $Edit_Students->password = Hash::make($request->password);
            $Edit_Students->gender_id = $request->gender_id;
            $Edit_Students->nationalitie_id = $request->nationalitie_id;
            $Edit_Students->blood_id = $request->blood_id;
            $Edit_Students->Date_Birth = $request->Date_Birth;
            $Edit_Students->Grade_id = $request->Grade_id;
            $Edit_Students->Classroom_id = $request->Class_room_id;
            $Edit_Students->section_id = $request->section_id;
            $Edit_Students->parent_id = $request->parent_id;
            $Edit_Students->academic_year = $request->academic_year;
            $Edit_Students->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Students.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

//    public function UpdateTeachers($request)
//    {
//
//    }


// Delete Raw on Database
public function Delete_Student($request)
{

    Students::destroy($request->id);
    toastr()->error(trans('messages.Delete'));
    return redirect()->route('Students.index');
}



//Get Ajax on database


public function Get_Ajax_class_room($id)
{
    $list_classes = class_room::where("grade_id", $id)->pluck("name_class", "id");
    return $list_classes;

}

public function Get_Sections($id){

    $list_sections = Sections::where("class_id", $id)->pluck("name_sections", "id");
    return $list_sections;
}
public function show($id)
{

    $Student = Students::findOrFail($id);
    return view('admin.Students.shows' , compact('Student'));}



public function Upload_attachment($request)
{
    foreach($request->file('photos') as $file)
    {
        $name = $file->getClientOriginalName();
        $file->storeAs('attachments/students/'.$request->student_name,
         $file->getClientOriginalName(),'upload_attachments');

        // insert in image_table
        $images= new image();
        $images->filename=$name;
        $images->imageable_id = $request->student_id;
        $images->imageable_type = 'App\Students';
        $images->save();
    }
    toastr()->success(trans('messages.success'));
    return redirect()->route('Students.show',$request->student_id);
}

public function Download_attachment($studentsname, $filename)
{
    return response()->download(public_path('attachments/students/'.$studentsname.'/'.$filename));
}

public function Delete_attachment($request)
    {
        // Delete img in server disk
        Storage::disk('upload_attachments')->delete('attachments/students/'.$request->
        student_name.'/'.$request->filename);

        // Delete in data
        image::where('id',$request->id)->where('filename',$request->filename)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Students.show',$request->student_id);
    }

}


