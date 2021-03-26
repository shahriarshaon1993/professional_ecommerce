<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Admin\Post;
use App\Models\Admin\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Index()
    {
        $posts = DB::table('posts')
            ->join('post_categories', 'posts.category_id', 'post_categories.id')
            ->select('posts.*', 'post_categories.category_name_en')
            ->get();

        return view('admin.blog.post.index', compact('posts'));
    }

    public function Create()
    {
        $post_category = PostCategory::all();
        return view('admin.blog.post.create', compact('post_category'));
    }

    public function Store(Request $request)
    {
        $validateData = $request->validate([
            'category_id' => 'required',
            'post_title_en' => 'required',
            'post_title_bn' => 'required',
            'details_en' => 'required',
            'details_bn' => 'required',
            'post_image' => 'required',
        ]);

        $post = new Post();

        $post->category_id = $request->category_id;
        $post->post_title_en = $request->post_title_en;
        $post->post_title_bn = $request->post_title_bn;
        $post->details_en = $request->details_en;
        $post->details_bn = $request->details_bn;

        $post_image = $request->post_image;

        if ($post_image) {
            $post_image_name = hexdec(uniqid()) . '.' . $post_image->getClientOriginalExtension();
            Image::make($post_image)->resize(300, 300)->save('public/media/post/' . $post_image_name);
            $post->post_image = 'public/media/post/' . $post_image_name;

            $post->save();

            $notification = array(
                'message' => 'Post Added Successfully',
                'alert-type' => 'success',
            );

            return Redirect()->back()->with($notification);
        }
    }

    public function Delete($id)
    {
        $posts = Post::find($id);

        $post_image = $posts->post_image;
        unlink($post_image);

        $posts->delete();

        $notification = array(
            'message' => 'Post Delete Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function Show($id)
    {
        $posts = DB::table('posts')
            ->join('post_categories', 'posts.category_id', 'post_categories.id')
            ->select('posts.*', 'post_categories.category_name_en')
            ->where('posts.id', $id)->first();

        return view('admin.blog.post.show', compact('posts'));
    }

    public function Edit($id)
    {
        $post = Post::find($id);
        $post_category = PostCategory::all();
        return view('admin.blog.post.edit', compact('post', 'post_category'));
    }

    public function Update(Request $request, $id)
    {
        $validateData = $request->validate([
            'category_id' => 'required',
            'post_title_en' => 'required',
            'post_title_bn' => 'required',
            'details_en' => 'required',
            'details_bn' => 'required',
            'post_image' => 'required',
        ]);

        $old_image = $request->old_image;

        $post = Post::find($id);
        unlink($old_image);

        $post->category_id = $request->category_id;
        $post->post_title_en = $request->post_title_en;
        $post->post_title_bn = $request->post_title_bn;
        $post->details_en = $request->details_en;
        $post->details_bn = $request->details_bn;

        $post_image = $request->post_image;

        if ($post_image) {
            $post_image_name = hexdec(uniqid()) . '.' . $post_image->getClientOriginalExtension();
            Image::make($post_image)->resize(300, 300)->save('public/media/post/' . $post_image_name);
            $post->post_image = 'public/media/post/' . $post_image_name;

            $post->save();

            $notification = array(
                'message' => 'Post Updated Successfully',
                'alert-type' => 'success',
            );

            return Redirect()->route('all.post')->with($notification);
        }
    }
}
