<?php

namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller;
use App\Http\Requests\store_sections;
use App\Models\class_room;
use App\Models\grades;
use App\Models\Sections;
use App\teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Grades = grades::with(['Sections'])->get();

        $re = class_room::all();
        $list_Grades = grades::all();
        $teachers = teachers::all();

        return view('admin.sections.sections' , compact('Grades' , 'list_Grades' , 're' , 'teachers'));

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
    public function store(store_sections $request)
    {



        try {


            $validated = $request->validated();
            $Sections = new Sections();

            $Sections->name_sections = ['ar' => $request->name_section_ar,
            'en' => $request->name_section_en];
            $Sections->grade_id = $request->Grade_id;

            $Sections->class_id = $request->Class_id;
            $Sections->status = 1;

            $Sections->save();
            $Sections->teachers()->attach($request->teacher_id);

            toastr()->success(trans('messages.success'));

            return back();
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);


        }
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function show(Sections $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $sections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function update(store_sections $request)
    {


        try {
            $validated = $request->validated();
            $Sections = Sections::findOrFail($request->id);

            $Sections->name_sections = ['ar' => $request->name_section_ar, 'en' =>

             $request->name_section_en];

            $Sections->Grade_id = $request->Grade_id;
            $Sections->Class_id = $request->Class_id;

            if(isset($request->Status)) {
              $Sections->status = 1;
            } else {
              $Sections->status = 2;
            }

            // update pivot tABLE
        if (isset($request->teacher_id)) {
            $Sections->teachers()->sync($request->teacher_id);
        } else {
            $Sections->teachers()->sync(array());
        }

            $Sections->save();
            toastr()->success(trans('messages.Update'));

            return redirect()->route('sections.index');
        }
        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //

        $print = Sections::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('sections.index');

    }

    public function getclasses($id)

    {

        $list_classes = class_room::where("Grade_id", $id)->pluck("name_class", "id");

        return $list_classes;




    }

public function g()
{
    return view('livewire_page.livewire');
}

}





