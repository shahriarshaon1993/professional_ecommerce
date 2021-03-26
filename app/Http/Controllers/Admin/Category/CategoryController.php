<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Category()
    {
        $category = Category::all();
        return view('admin.category.category', compact('category'));
    }

    public function StoreCategory(Request $request)
    {
        $validateData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);

        $category = new Category();

        $category->category_name = $request->category_name;
        $category->save();

        $notification = array(
            'message' => 'Category Added Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function DeleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();

        $notification = array(
            'message' => 'Category Delete Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function EditCategory($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit_category', compact('category'));
    }

    public function UpdateCategory(Request $request, $id)
    {
        $validateData = $request->validate([
            'category_name' => 'required|max:255',
        ]);

        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->save();

        $notification = array(
            'message' => 'Category Update Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->route('categories')->with($notification);
    }
}
