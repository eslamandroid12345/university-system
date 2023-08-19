<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SubjectExamStudentResultExport;
use App\Imports\SubjectExamStudentResultImport;
use App\Models\Period;
use App\Models\Subject;
use App\Models\SubjectUnitDoctor;
use App\Models\User;
use App\Models\SubjectExam;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\SubjectExamStudentResult;
use App\Http\Requests\SubjectExamStudentResultRequest;

class SubjectExamStudentResultController extends Controller
{

    public function index(request $request)
    {
        if ($request->ajax()) {

            $period = Period::query()
                ->where('status','=','start')
                ->first();

            $subject_exam_student_results = SubjectExamStudentResult::query()
                ->where('period','=','عاديه')
                ->where('year','=',$period->year_start)
                ->get();

            return Datatables::of($subject_exam_student_results)
                ->addColumn('action', function ($subject_exam_student_results) {
                    return '
                            <button type="button" data-id="' . $subject_exam_student_results->id . '" '. (auth()->user()->user_type == 'student' ? 'hidden' : '') .' class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button '. (auth()->user()->user_type == 'student' ? 'hidden' : '') .' class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $subject_exam_student_results->id . '" data-title="' . $subject_exam_student_results->user->first_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                 ->editColumn('user_id', function ($subject_exam_student_results) {
                     return $subject_exam_student_results->user->first_name . " ". $subject_exam_student_results->user->last_name;
                 })

                ->addColumn('group_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->subject->group->group_name;
                })
                 ->editColumn('subject_id', function ($subject_exam_student_results) {
                     return $subject_exam_student_results->subject->subject_name;
                 })
                ->addColumn('identifier_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->user->identifier_id;
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.subject_exam_student_results.index');
        }
    } // end of index



    public function index2(request $request)
    {
        if ($request->ajax()) {

            $period = Period::query()
                ->where('status','=','start')
                ->first();

            $subject_exam_student_results = SubjectExamStudentResult::query()
                ->where('period','=','استدراكيه')
                ->where('year','=',$period->year_start)
                ->get();

            return Datatables::of($subject_exam_student_results)
                ->addColumn('action', function ($subject_exam_student_results) {
                    return '
                            <button type="button" data-id="' . $subject_exam_student_results->id . '" '. (auth()->user()->user_type == 'student' ? 'hidden' : '') .' class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button '. (auth()->user()->user_type == 'student' ? 'hidden' : '') .' class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $subject_exam_student_results->id . '" data-title="' . $subject_exam_student_results->user->first_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('user_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->user->first_name . " ". $subject_exam_student_results->user->last_name;
                })

                ->addColumn('group_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->subject->group->group_name;
                })
                ->editColumn('subject_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->subject->subject_name;
                })
                ->addColumn('identifier_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->user->identifier_id;
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.subject_exam_student_results.index2');
        }
    } // end of index2


    public function create()
    {
        $subjects = Subject::query()
          ->get();

        $users = User::query()
        ->where('user_type', 'student')
            ->get();

        return view('admin.subject_exam_student_results.parts.create', compact('users', 'subjects')
        );
    } // end of create


    public function store(SubjectExamStudentResultRequest $request): JsonResponse
    {
        $inputs = $request->all();
        if (SubjectExamStudentResult::create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    } // end of store


    public function edit(SubjectExamStudentResult $subjectExamStudentResult)
    {
        return view('admin.subject_exam_student_results.parts.edit', compact('subjectExamStudentResult'));
    } // end of edit


    public function update(Request $request,SubjectExamStudentResult $subjectExamStudentResult): JsonResponse
    {
        if ($subjectExamStudentResult->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    } // end of update method

    public function destroy(Request $request)
    {
        $subjectExamStudentResults = SubjectExamStudentResult::where('id', $request->id)->firstOrFail();
        $subjectExamStudentResults->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    } // end destroy


    public function exportSubjectExamStudentResult()
    {
        return Excel::download(new SubjectExamStudentResultExport(), 'SubjectExamStudentResult.xlsx');
    }


    public function importSubjectExamStudentResult(Request $request): JsonResponse
    {
        $import = Excel::import(new SubjectExamStudentResultImport(), $request->exelFile);
        if ($import) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 500]);
        }
    } // end import

}
