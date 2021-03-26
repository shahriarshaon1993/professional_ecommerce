<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function Blog()
    {
        $post = DB::table('posts')
            ->join('post_categories', 'posts.category_id', 'post_categories.id')
            ->select('posts.*', 'post_categories.category_name_en', 'post_categories.category_name_bn')
            ->get();

        return view('pages.blog', compact('post'));
    }

    public function English()
    {
        Session::get('lang');
        Session()->forget('lang');
        Session::put('lang', 'english');

        return redirect()->back();
    }

    public function Bangla()
    {
        Session::get('lang');
        Session()->forget('lang');
        Session::put('lang', 'bangla');

        return redirect()->back();
    }

    public function BlogSingle($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        return view('pages.blog_single', compact('post'));
    }
}
