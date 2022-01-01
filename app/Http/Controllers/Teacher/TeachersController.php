<?php

namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\Controller;

use App\teachers;
use Illuminate\Http\Request;

use App\Repository\TeacherRepositoryInterface;

class TeachersController extends Controller
{

protected $Teacher;

    public function __construct(TeacherRepositoryInterface $Teacher) {

        $this->Teacher = $Teacher;

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    return  $this->Teacher->get_all_teacher();



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $specializations = $this->Teacher->Getspecialization();
         $genders = $this->Teacher->GetGender();
         return view('admin.teacher.create',compact('specializations','genders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->Teacher->store_teacher($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function show(teachers $teachers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Teachers = $this->Teacher->editTeachers($id);
        $specializations = $this->Teacher->Getspecialization();
        $genders = $this->Teacher->GetGender();
        return view('admin.teacher.edit',compact('Teachers','specializations','genders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
          return $this->Teacher->update_teacher($request);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       return $this->Teacher->delete_teacher($request);
    }
}
