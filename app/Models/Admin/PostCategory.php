<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name_en', 'category_name_bn'

    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
