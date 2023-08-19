<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrackReregister extends Model
{

    protected $table = 'track_reregisters';

    protected $fillable = [
        'user_id',
        'year',
        'status',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
