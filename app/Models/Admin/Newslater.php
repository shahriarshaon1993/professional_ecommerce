<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newslater extends Model
{
    use HasFactory;

    protected $fillable = [
        'email'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
