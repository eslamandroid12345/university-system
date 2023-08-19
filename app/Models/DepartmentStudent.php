<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DepartmentStudent extends Model
{
    protected $fillable = [
        'user_id',
        'department_id',
        'year',
        'period',
        'confirm_request',
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class,'department_id','id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
