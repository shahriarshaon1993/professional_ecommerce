<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'subcategory_id', 'brand_id', 'product_name', 'product_code', 'product_quantity', 'product_details', 'product_color', 'product_size', 'product_price', 'selling_price', 'discount_price', 'video_link', 'main_slider', 'hot_deal', 'best_rated', 'mid_slider', 'hot_new', 'trand', 'image_one', 'image_two', 'image_three', 'status', 'buyone_getone',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
