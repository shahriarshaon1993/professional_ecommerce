<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Brand()
    {
        $brands = Brand::all();
        return view('admin.category.brand', compact('brands'));
    }

    public function StoreBrand(Request $request)
    {
        $validateData = $request->validate([
            'brand_name' => 'required|unique:brands|max:255',
            'brand_logo' => 'mimes:jpg,png',
        ]);

        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $image = $request->file('brand_logo');

        if ($image) {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/media/brand/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $brand->brand_logo = $image_url;
            $brand->save();

            $notification = array(
                'message' => 'Brand Added Successfully',
                'alert-type' => 'success',
            );

            return Redirect()->back()->with($notification);
        } else {
            $brand->save();

            $notification = array(
                'message' => 'its ok',
                'alert-type' => 'success',
            );

            return Redirect()->back()->with($notification);
        }
    }

    public function DeleteBrand($id)
    {
        $brand = Brand::find($id);
        $image = $brand->brand_logo;
        unlink($image);
        $brand->delete();

        $notification = array(
            'message' => 'Brand Delete Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function EditBrand($id)
    {
        $brand = Brand::find($id);
        return view('admin.category.edit_brand', compact('brand'));
    }

    public function Updatebrand(Request $request, $id)
    {
        $validateData = $request->validate([
            'brand_name' => 'required|max:255',
            'brand_logo' => 'mimes:jpg,png',
        ]);

        $brand = Brand::find($id);
        $old_logo = $request->old_logo;

        $brand->brand_name = $request->brand_name;
        $image = $request->file('brand_logo');
        unlink($old_logo);

        if ($image) {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/media/brand/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $brand->brand_logo = $image_url;
            $brand->save();

            $notification = array(
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'success',
            );

            return Redirect()->route('brands')->with($notification);
        } else {
            $brand->save();

            $notification = array(
                'message' => 'its ok',
                'alert-type' => 'success',
            );

            return Redirect()->route('brands')->with($notification);
        }
    }
}
