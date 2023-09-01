<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AdminExport;
use App\Imports\AdminImport;
use App\Models\DataModification;
use App\Models\DepartmentBranchStudent;
use App\Models\Period;
use App\Models\SubjectStudent;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;

class AdminController extends Controller
{

    public function index(request $request)
    {

        if ($request->ajax()) {
            $admins = User::query()
                ->where('user_type', '=', 'manger')
                ->orWhere('user_type', '=', 'factor')
                ->orWhere('user_type', '=', 'employee')
                ->latest()
                ->get();

            return Datatables::of($admins)
                ->addColumn('action', function ($admin) {
                    return '
                            <button type="button" data-id="' . $admin->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $admin->id . '" data-title="' . $admin->first_name . '">
                                    <i class="fas fa-trash"></i>

                            </button>
                       ';
                })
                ->editColumn('image', function ($admin) {

                    if ($admin->image != null) {
                        return '
                    <img alt="image" class="avatar avatar-md rounded-circle" src="' . asset("uploads/users/" . $admin->image) . '">
                    ';
                    } else {
                        return '
                    <img alt="image" class="avatar avatar-md rounded-circle" src="' . asset("uploads/users/default/avatar2.jfif") . '">
                    ';
                    }

                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.admins.index');
        }
    }


    public function delete(Request $request)
    {
        $admin = User::query()
            ->where('id', $request->id)
            ->first();

        if ($admin->image != null) {

            if (file_exists(public_path("uploads/users/" . $admin->image))) {
                unlink(public_path("uploads/users/" . $admin->image));
                $admin->delete();
                return response(['message' => 'user Deleted Successfully', 'status' => 200], 200);

            } else {
                return response(['message' => 'Error delete image user', 'status' => 500], 500);
            }

        } else {

            $admin->delete();
            return response(['message' => 'user Deleted Successfully', 'status' => 200], 200);
        }
    }


    public function create()
    {
        $types = ['doctor', 'employee', 'manger', 'factor'];

        return view('admin.admins.parts.create', compact('types'));
    }

    public function store(AdminStoreRequest $request): JsonResponse
    {
        if ($image = $request->file('image')) {
            $destinationPath = 'uploads/users/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $request['image'] = "$profileImage";
        }

        $admin = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'first_name_latin' => $request->first_name_latin,
            'last_name_latin' => $request->last_name_latin,
            'image' => $profileImage ?? null,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type,
            'job_id' => $request->job_id,
        ]);

        if ($admin->save()) {

            return response()->json(['status' => 200]);

        } else {

            return response()->json(['status' => 405]);
        }

    }

    public function edit(User $admin)
    {

        $types = ['doctor', 'employee', 'manger', 'factor'];

        return view('admin.admins.parts.edit', compact('admin', 'types'));
    }


    public function update(AdminUpdateRequest $request): JsonResponse{

        $admin = User::query()
            ->findOrFail($request->id);

        if ($image = $request->file('image')) {

            $destinationPath = 'uploads/users/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $request['image'] = "$profileImage";

            if (file_exists(public_path('uploads/users/'.$admin->image)) && $admin->image != null) {
                unlink(public_path('uploads/users/'.$admin->image));
            }
        }


        $admin->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'first_name_latin' => $request->first_name_latin,
            'last_name_latin' => $request->last_name_latin,
            'image' => $request->image != null ? $profileImage : $admin->image,
            'national_id' => $request->national_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'job_id' => $request->job_id,

        ]);

        if ($admin->save()) {

            return response()->json(['status' => 200]);

        } else {

            return response()->json(['status' => 405]);
        }
    }

    public function profile(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user_data = DataModification::where('user_id', $user->id)->get();

        $departmentStudent = DepartmentBranchStudent::query()
            ->where('user_id',$user->id)
            ->first('department_branch_id');

        $period = Period::query()
            ->where('status', '=', 'start')
            ->first();

        $subject_students = SubjectStudent::query()
            ->where('user_id', '=', Auth::id())
            ->where('period', '=', $period->period)
            ->where('year', '=', $period->year_start)
            ->get();


        return view('admin.admins.profile',compact('user', 'user_data','subject_students','period','departmentStudent'));
    }

    public function updatePass(Request $request): JsonResponse
    {
        $user = User::query()
            ->findOrFail($request->id);


        if (!Hash::check($request->old_password,$user->password)){

            return response()->json(['status' => 201]);

        }elseif ($request->password != $request->password_confirm){

            return response()->json(['status' => 203]);

        } else{

            $user->update(['password' => Hash::make($request->password)]);

             return response()->json(['status' => 200]);
        }
    }


    public function exportAdmin()
    {
        return Excel::download(new AdminExport(), 'admins.xlsx');
    }

    public function importAdmin(Request $request): JsonResponse
    {
        $import = Excel::import(new AdminImport(),$request->exelFile);
        if ($import) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 500]);
        }
    }
}
