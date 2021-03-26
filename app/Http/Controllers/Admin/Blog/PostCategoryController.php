<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Admin\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Index()
    {
        $post_categories = PostCategory::all();
        return view('admin.blog.post_category.index', compact('post_categories'));
    }

    public function Store(Request $request)
    {
        $validateData = $request->validate([
            'category_name_en' => 'required',
            'category_name_bn' => 'required',
        ]);

        $post_category = new PostCategory();

        $post_category->category_name_en = $request->category_name_en;
        $post_category->category_name_bn = $request->category_name_bn;
        $post_category->save();

        $notification = array(
            'message' => 'Post Category Added Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function Delete($id)
    {
        $post_category = PostCategory::find($id);

        $post_category->delete();

        $notification = array(
            'message' => 'Post Category Delete Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function Edit($id)
    {
        $post_category = PostCategory::find($id);
        return view('admin.blog.post_category.edit', compact('post_category'));
    }

    public function Update(Request $request, $id)
    {
        $validateData = $request->validate([
            'category_name_en' => 'required',
            'category_name_bn' => 'required',
        ]);

        $post_category = PostCategory::find($id);

        $post_category->category_name_en = $request->category_name_en;
        $post_category->category_name_bn = $request->category_name_bn;
        $post_category->save();

        $notification = array(
            'message' => 'Post Category Updated Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->route('post.category')->with($notification);
    }
}
