<?php


namespace App\Http\Controllers\Students;
use App\Repository\FessRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Fess_store;
use Illuminate\Http\Request;

class FessController extends Controller
{
    protected $Fees;

    public function __construct(FessRepositoryInterface $Fees)
    {
        $this->Fees = $Fees;
    }

    public function index()
    {
        return $this->Fees->index();
    }

    public function create()
    {
        return $this->Fees->create();
    }


    public function store(Fess_store $request)
    {
        return $this->Fees->store($request);
    }

    public function edit($id)
    {
        return $this->Fees->edit($id);
    }


    public function update(Fess_store $request)
    {
        return $this->Fees->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Fees->destroy($request);
    }
}
