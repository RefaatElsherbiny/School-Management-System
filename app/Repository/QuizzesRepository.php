<?php


namespace App\Repository;

use App\Models\grades;
use App\teachers;
use App\Models\Quizzes;
use App\Models\Subjects;

class QuizzesRepository implements QuizzesRepositoryInterface
{

    public function index()
    {
        $quizzes = Quizzes::get();
        return view('admin.Quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        $data['grades'] = grades::all();
        $data['subjects'] = Subjects::all();
        $data['teachers'] = Teachers::all();
        return view('admin.Quizzes.create', $data);
    }

    public function store($request)
    {
        try {

            $quizzes = new Quizzes();
            $quizzes->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizzes->subject_id = $request->subject_id;
            $quizzes->grade_id = $request->Grade_id;
            $quizzes->classroom_id = $request->Class_room_id;
            $quizzes->section_id = $request->section_id;
            $quizzes->teacher_id = $request->teacher_id;
            $quizzes->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Quizzes.create');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $quizz = Quizzes::findorFail($id);
        $data['grades'] = Grades::all();
        $data['subjects'] = Subjects::all();
        $data['teachers'] = Teachers::all();
        return view('admin.Quizzes.edit', $data, compact('quizz'));
    }

    public function update($request)
    {
        try {
            $quizz = Quizzes::findorFail($request->id);
            $quizz->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizz->subject_id = $request->subject_id;
            $quizz->grade_id = $request->Grade_id;
            $quizz->classroom_id = $request->Class_room_id;
            $quizz->section_id = $request->section_id;
            $quizz->teacher_id = $request->teacher_id;
            $quizz->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Quizzes.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Quizzes::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}



