<?php

namespace App\Imports;

use App\Models\Certificate;

use App\Models\CertificateType;
use App\Models\ProcessDegree;
use App\Models\ProcessExam;
use App\Models\Subject;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProcessDegreeImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows): void
    {
        ProcessDegree::query()->select('*')->delete();
        for ($i = 0; $i < count($rows); $i++) {
            $user = User::query()->where('identifier_id','=', $rows[$i]['user_code'])->first('id');
            $subject = Subject::query()->where('code','=',$rows[$i]['subject_code'])->first('id');

            ProcessDegree::create([
                'user_id' => $user->id,
                'period' => $rows[$i]['period'],
                'year' => $rows[$i]['year'],
                'section' => $rows[$i]['section'],
                'request_type' => $rows[$i]['request_type'],
                'processing_date' => $rows[$i]['processing_date'] ?? Carbon::now()->format('Y-m-d'),
                'request_status' => $rows[$i]['request_status'],
                'subject_id' => $subject->id,
                'doctor_id' => $rows[$i]['doctor_id'],
                'exam_code' => $rows[$i]['exam_code'],
                'student_degree_before_request' => $rows[$i]['student_degree_before_request'],
                'student_degree_after_request' => $rows[$i]['student_degree_after_request'],
                'created_at' => $rows[$i]['request_date'],

            ]);
        }
    }
}
