<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function SubCategory()
    {
        $category = Category::all();

        $subcat = DB::table('subcategories')
            ->join('categories', 'subcategories.category_id', 'categories.id')
            ->select('subcategories.*', 'categories.category_name')
            ->get();

        return view('admin.category.subcategory', compact('category', 'subcat'));
    }

    public function StoreSubCat(Request $request)
    {
        $validateData = $request->validate([
            'subcategory_name' => 'required',
            'category_id' => 'required',
        ]);

        $subcategory = new Subcategory();
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();

        $notification = array(
            'message' => 'Sub Category Added Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function DeleteSubCategory($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();

        $notification = array(
            'message' => 'Sub Category Deleted Successfully',
            'alert-type' => 'worning',
        );

        return Redirect()->back()->with($notification);
    }

    public function EditSubCategory($id)
    {
        $subcat = Subcategory::find($id);
        $category = Category::all();

        return view('admin.category.edit_subcategory', compact('category', 'subcat'));
    }

    public function UpdateSubCategory(Request $request, $id)
    {
        $validateData = $request->validate([
            'subcategory_name' => 'required',
            'category_id' => 'required',
        ]);

        $subcategory = Subcategory::find($id);
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();

        $notification = array(
            'message' => 'Sub Category Updated Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->route('sub.categories')->with($notification);
    }
}
