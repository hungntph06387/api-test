<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Convert extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'str',
        'to',
        'mode',
        'romajiSystem',
        'cv',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }



}
