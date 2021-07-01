<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConvertUser extends Model
{
    use HasFactory;

    protected $table = "convert_users";

    protected $fillable = [
        'user_id',
        'convert_id',
    ];
}
