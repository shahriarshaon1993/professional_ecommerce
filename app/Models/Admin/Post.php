<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'post_title_en', 'post_title_bn', 'post_image', 'details_en', 'details_bn'

    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
