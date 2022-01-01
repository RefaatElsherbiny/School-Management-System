<?php

namespace App\Http\Controllers\class_room;
use App\DataTables;
use App\Models\AdminDatabale;

use App\Http\Controllers\Controller;
use App\Http\Requests\store_classroom;
use App\Models\class_room;
use App\Models\grades;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $My_Classes = class_room::all();
        $Grades = grades::all();
        return view('admin.class_room.class_room',compact('My_Classes','Grades'));
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(store_classroom $request)
    {
        //

        $List_Classes = $request->List_Classes;

        try {

            $validated = $request->validated();
            foreach ($List_Classes as $List_Class) {

                $My_Classes = new class_room();

                $My_Classes->name_class = ['en' => $List_Class['name_class_en'],
                 'ar' => $List_Class['name_class']];


                $My_Classes->Grade_id = $List_Class['Grade_id'];

                $My_Classes->save();

            }

            toastr()->success(trans('messages.success'));
            return redirect()->route('class_room.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\class_room  $class_room
     * @return \Illuminate\Http\Response
     */
    public function show(class_room $class_room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\class_room  $class_room
     * @return \Illuminate\Http\Response
     */
    public function edit(class_room $class_room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\class_room  $class_room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        try {

            $Classrooms = class_room::findOrFail($request->id);

            $Classrooms->update([

                $Classrooms->name_class = ['ar' => $request->name_class, 'en' => $request->name_class],
                $Classrooms->Grade_id = $request->Grade_id,
            ]);
            toastr()->success(trans('messages.Update'));
            return redirect()->route('class_room.index');
        }

        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\class_room  $class_room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //


                    $Grades = class_room::findOrFail($request->id)->delete();
        toastr()->error(trans('Grades.messege_grades_delete'));
        return redirect()->route('class_room.index');




    }

    public function delete_all(Request $request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);

        class_room::whereIn('id', $delete_all_id)->Delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('class_room.index');
    }

 public function Filter_Classes(Request $request)
 {

    $Grades = grades::all();
    $Search = class_room::select('*')->where('Grade_id','=',$request->Grade_id)->get();
    return view('admin.class_room.class_room',compact('Grades'))->withDetails($Search); }

}
