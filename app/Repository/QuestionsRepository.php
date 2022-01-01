<?php


namespace App\Repository;

use App\Models\Questions;
use App\Models\Quizzes;

class QuestionsRepository implements QuestionsRepositoryInterface
{
    public function index()
    {
        $questions = Questions::get();
        return view('admin.Questions.index', compact('questions'));
    }

    public function create()
    {
        $quizzes = Quizzes::get();
        return view('admin.Questions.create',compact('quizzes'));
    }

    public function store($request)
    {
        try {
            $question = new Questions();
            $question->title = $request->title;
            $question->answers = $request->answers;
            $question->right_answer = $request->right_answer;
            $question->score = $request->score;
            $question->quizze_id = $request->quizze_id;
            $question->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('questions.create');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $question = Questions::findorfail($id);
        $quizzes = Quizzes::get();
        return view('admin.Questions.edit',compact('question','quizzes'));
    }

    public function update($request)
    {
        try {
            $question = Questions::findorfail($request->id);
            $question->title = $request->title;
            $question->answers = $request->answers;
            $question->right_answer = $request->right_answer;
            $question->score = $request->score;
            $question->quizze_id = $request->quizze_id;
            $question->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('questions.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Questions::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}



