<?php

namespace App\Http\Controllers\Students;
use App\http\Controllers\Controller;
use App\Http\Requests\Student_store;
use App\Repository\StudentRepositoryInterface;
use App\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    protected $Student;

    public function __construct(StudentRepositoryInterface $Student)
    {
        $this->Student = $Student;
    }

    public function index()
    {
        //
        return $this->Student->show_student();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return $this->Student->create_student();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Student_store $request)
    {
        //
        return $this->Student->store_student($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       return $this->Student->Edit_Student($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function update( Student_store $request)
    {
        return $this->Student->Update_Student($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->Student->Delete_Student($request);
    }
   public function Get_Ajax_class_room($id)
{

    return $this->Student->Get_Ajax_class_room($id);
}


public function Get_Sections($id)
{
    return $this->Student->Get_Sections($id);
}

public function show($id)

{
    return $this->Student->show($id);
}



public function Upload_attachment(Request $request)
{
    return $this->Student->Upload_attachment($request);
}

public function Download_attachment($studentsname,$filename)
{
    return $this->Student->Download_attachment($studentsname,$filename);
}

public function Delete_attachment(Request $request)
    {
        return $this->Student->Delete_attachment($request);

    }
}
