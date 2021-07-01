<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Convert extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "converts";

    protected $fillable = [
        'str',
        'to',
        'mode',
        'romajiSystem',
        'cv',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'convert_users');
    }
}
