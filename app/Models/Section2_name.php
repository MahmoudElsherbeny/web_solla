<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section2_name extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name', 'birthdate', 'created_at'
    ];

    protected $casts = [
        'created_at'  => 'datetime:Y-m-d g:i a'
    ];
}
