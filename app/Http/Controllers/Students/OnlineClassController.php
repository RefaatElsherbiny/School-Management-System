<?php


namespace App\Http\Controllers\Students;
use App\Http\Controllers\Controller;
use App\Http\Traits\MeetingZoomTrait;

use App\Models\grades;
use App\Models\Online_class;
use Illuminate\Http\Request;

use MacsiDigital\Zoom\Facades\Zoom;

class OnlineClassController extends Controller
{
    use MeetingZoomTrait;

    public function index()
    {
        $online_classes = Online_class::all();
        return view('admin.online_classes.index', compact('online_classes'));
    }


    public function create()
    {
        $Grades = grades::all();
        return view('admin.online_classes.add', compact('Grades'));
    }

    public function indirectCreate()
    {
        $Grades = grades::all();
        return view('admin.online_classes.indirect', compact('Grades'));
    }


    public function store(Request $request)
    {
        try {



            $meeting = $this->createMeeting($request);


            Online_class::create([
                'integration' => true,
                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Class_room_id,
                'section_id' => $request->section_id,
                'user_id' => auth()->user()->id,
                'meeting_id' => $meeting->id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $meeting->duration,
                'password' => $meeting->password,
                'start_url' => $meeting->start_url,
                'join_url' => $meeting->join_url,
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('online_classes.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }


    public function storeIndirect(Request $request)
    {
        try {
            Online_class::create([
                'integration' => false,
                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Class_room_id,
                'section_id' => $request->section_id,
                'user_id' => auth()->user()->id,
                'meeting_id' => $request->meeting_id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $request->duration,
                'password' => $request->password,
                'start_url' => $request->start_url,
                'join_url' => $request->join_url,
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('online_classes.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }



    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Request $request)
    {
        try {

            $info = Online_class::find($request->id);

            if($info->integration == true){

                $meeting = Zoom::meeting()->find($request->meeting_id);
                $meeting->delete();
               Online_class::destroy($request->id);

            }
            else{
               Online_class::destroy($request->id);
            }

            toastr()->error(trans('messages.Delete'));
            return redirect()->route('online_classes.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }
}
