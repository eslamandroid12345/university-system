<?php

namespace App\Http\Controllers\Student;
use App\Models\Period;
use App\Models\SubjectUnitDoctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\SubjectExamStudentResult;

class SubjectExamStudentResultController extends Controller
{

    public function normal(request $request)
    {
        if ($request->ajax()) {

            $period = Period::query()
                ->where('status','=','start')
                ->first();

            $subject_exam_student_results = SubjectExamStudentResult::query()
                ->where('period','=','عاديه')
                ->where('user_id','=',Auth::id())
                ->where('year','=',$period->year_start)
                ->get();

            return Datatables::of($subject_exam_student_results)

                ->editColumn('user_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->user->first_name . " " . $subject_exam_student_results->user->last_name;
                })

                ->addColumn('identifier_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->user->identifier_id;
                })
                 ->addColumn('subject_id', function ($subject_exam_student_results) {
                     return $subject_exam_student_results->subject->subject_name;
                 })

                ->addColumn('group_id', function ($subject_exam_student_results) {
                     return $subject_exam_student_results->subject->group->group_code;
                 })

                ->addColumn('unit_id', function ($subject_exam_student_results) {
                     return $subject_exam_student_results->subject->unit->unit_code;
                 })

                ->addColumn('doctor_id', function ($subject_exam_student_results) {
                    $period = Period::query()
                        ->where('status','=','start')
                        ->first();

                    $doctor =  SubjectUnitDoctor::query()
                        ->where('subject_id','=',$subject_exam_student_results->subject_id)
                        ->where('year','=',$period->year_start)
                        ->first()
                        ->doctor;

                    return $doctor->first_name . " " . $doctor->last_name;

                })
                ->addColumn('add_request', function ($subject_exam_student_results) {
                        return '
                            <button type="button" data-id="' . $subject_exam_student_results->subject_id . '" class="btn btn-pill btn-info-light add-request"> ' . trans('student_result.add_request_button') . '  </button>
                       ';
                })

                ->escapeColumns([])
                ->make(true);
        } else {
            return view('student.subject_exam_student_result.normal');
        }
    }


    public function remedial(request $request)
    {
        if ($request->ajax()) {

            $period = Period::query()
                ->where('status','=','start')
                ->first();

            $subject_exam_student_results = SubjectExamStudentResult::query()
                ->where('period','=','استدراكيه')
                ->where('user_id','=',Auth::id())
                ->where('year','=',$period->year_start)
                ->get();

            return Datatables::of($subject_exam_student_results)

                ->editColumn('user_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->user->first_name . " " . $subject_exam_student_results->user->last_name;
                })

                ->addColumn('identifier_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->user->identifier_id;
                })
                ->addColumn('subject_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->subject->subject_name;
                })

                ->addColumn('group_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->subject->group->group_code;
                })
                ->addColumn('unit_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->subject->unit->unit_code;
                })

                ->addColumn('doctor_id', function ($subject_exam_student_results) {
                    $period = Period::query()
                        ->where('status','=','start')
                        ->first();

                    $doctor =  SubjectUnitDoctor::query()
                        ->where('subject_id','=',$subject_exam_student_results->subject_id)
                        ->where('year','=',$period->year_start)
                        ->first()
                        ->doctor;

                    return $doctor->first_name . " " . $doctor->last_name;

                })
                ->addColumn('add_request', function ($subject_exam_student_results) {
                    return '
                            <button type="button" data-id="' . $subject_exam_student_results->id . '" class="btn btn-pill btn-info-light add-request"> ' . trans('student_result.add_request_button') . ' </button>

                       ';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('student.subject_exam_student_result.remedial');
        }
    }



}
