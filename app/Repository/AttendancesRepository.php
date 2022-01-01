<?php


namespace App\Repository;

use App\Models\Attendances;
use App\teachers;
use App\Models\grades;
use App\Students;

class AttendancesRepository implements AttendancesRepositoryInterface
{
    public function index()
    {
        $Grades = grades::with(['Sections'])->get();
        $list_Grades = grades::all();
        $teachers = teachers::all();
        return view('admin.Attendance.Sections',compact('Grades','list_Grades','teachers'));
    }

    public function show($id)
    {
        $students = Students::with('attendance')->where('section_id',$id)->get();
        return view('admin.Attendance.index',compact('students'));
    }

    public function store($request)
    {
        try {

            foreach ($request->attendences as $studentid => $attendence) {

                if( $attendence == 'presence' ) {
                    $attendence_status = true;
                } else if( $attendence == 'absent' ){
                    $attendence_status = false;
                }

              Attendances::create([
                    'student_id'=> $studentid,
                    'grade_id'=> $request->grade_id,
                    'classroom_id'=> $request->classroom_id,
                    'section_id'=> $request->section_id,
                    'teacher_id'=> 1,
                    'attendence_date'=> date('Y-m-d'),
                    'attendence_status'=> $attendence_status
                ]);
// return $studentid;

            }

            toastr()->success(trans('messages.success'));
            return redirect()->back();

        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        // TODO: Implement update() method.
    }

    public function destroy($request)
    {
        // TODO: Implement destroy() method.
    }
}



