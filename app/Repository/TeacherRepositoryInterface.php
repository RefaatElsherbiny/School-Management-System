<?php


namespace App\Repository;

interface TeacherRepositoryInterface {


    // Show three models
  public function get_all_teacher();

  //Get all specializations
  public function Getspecialization();

    //Get all genders

  public function GetGender();


// Insert on Database

  public function store_teacher($request);

  //Eidt View Teachers

  public function editTeachers($id);

    //Update on Database


public function update_teacher($request);

  //Delete on Database

  public function delete_teacher ($request);


}
