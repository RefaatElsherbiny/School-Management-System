<?php


namespace App\Repository;

interface StudentRepositoryInterface {


    // Show  Table Student

public function show_student();

public function create_student();

  //Get all specializations

    //Get all genders
    public function Get_Ajax_class_room($id);

    public function Get_Sections($id);




// Insert on Database

public function store_student($request);

  //Eidt View Student
public function Edit_Student($id);

    //Update on Database
    public function Update_Student($request);



  //Delete on Database
  public function Delete_Student($request);

  public function show($id);

  public function Upload_attachment($request);

  public function Download_attachment($studentsname,$filename);



  public function Delete_attachment($request);





}
