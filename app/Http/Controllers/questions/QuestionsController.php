<?php


namespace App\Http\Controllers\questions;
use App\Repository\QuestionsRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{ protected $Question;

    public function __construct(QuestionsRepositoryInterface $Question)
    {
        $this->Question =$Question;
    }

    public function index()
    {
        return $this->Question->index();
    }

    public function create()
    {
        return $this->Question->create();
    }

    public function store(Request $request)
    {
        return $this->Question->store($request);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return $this->Question->edit($id);
    }

    public function update(Request $request)
    {
        return $this->Question->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Question->destroy($request);
    }
}