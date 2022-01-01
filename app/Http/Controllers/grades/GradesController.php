<?php

namespace App\Http\Controllers\Grades;

use App\Models\Grades;
use App\Models\class_room;

use App\Http\Controllers\Controller;
use App\Http\Requests\Grades_Store;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


            $Grades = grades::all();
        return view('admin.Grades.grads' , compact('Grades'));
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
    public function store(Grades_Store $request)
    {
        //
        if (grades::where('name_grades->ar', $request->Name)
        ->orWhere('note_grades->en',$request->Name_en)->exists()) {

            return redirect()->back()->withErrors(trans('Grades.exists'));
        }


   try {

            $validated = $request->validated();
            $Grade = new grades();
            /*
            $translations = [
                'en' => $request->Name_en,
                'ar' => $request->Name
            ];
            $Grade->setTranslations('Name', $translations);
            */
            $Grade->name_grades = ['en' => $request->Name_en, 'ar' => $request->Name];
            $Grade->note_grades = ['en' => $request->Notes, 'ar' => $request->Notes];
            $Grade->save();

                   toastr()->success(trans('Grades.messege_grades_add'));

            return redirect()->route('grades.index');        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\grades  $grades
     * @return \Illuminate\Http\Response
     */
    public function show(grades $grades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\grades  $grades
     * @return \Illuminate\Http\Response
     */
    public function edit(grades $grades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\grades  $grades
     * @return \Illuminate\Http\Response
     */
    public function update(Grades_Store $request)
    {
        //
        try {

            $validated = $request->validated();
            $Grades = grades::findOrFail($request -> id);

                $Grades -> update([

                $Grades->name_grades = ['en' => $request->Name_en, 'ar' => $request->Name],
                $Grades->note_grades = ['en' => $request->Notes, 'ar' => $request->Notes],

                ]);

            toastr()->success(trans('Grades.messege_grades_update'));
            return redirect()->route('grades.index');
        }
        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\grades  $grades
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
$class_room = class_room::where('grade_id' , $request -> id)->pluck('grade_id');

    if($class_room ->count() == 0 ){

    $Grades = grades::findOrFail($request->id)->delete();

    toastr()->error(trans('messege.delete'));
    return redirect()->route('grades.index');

}else {

    toastr()->error(trans('Grades.jkbvyc'));
    return redirect()->route('grades.index');
}


    }
}
