<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Index()
    {
        $product = DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->select('products.*', 'categories.category_name', 'brands.brand_name')
            ->get();


        // return json_encode($product);
        return view('admin.product.index', compact('product'));
    }

    public function create()
    {
        $category = Category::all();
        $brand = Brand::all();

        return view('admin.product.create', compact('category', 'brand'));
    }

    public function GetSubCat($category_id)
    {
        $cat = DB::table('subcategories')->where('category_id', $category_id)->get();
        return json_encode($cat);
    }

    public function Store(Request $request)
    {
        // Vlidation Korte Hobe

        $product = new Product();

        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->product_quantity = $request->product_quantity;
        $product->discount_price = $request->discount_price;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->brand_id = $request->brand_id;
        $product->product_size = $request->product_size;
        $product->product_color = $request->product_color;
        $product->selling_price = $request->selling_price;
        $product->product_details = $request->product_details;
        $product->video_link = $request->video_link;
        $product->main_slider = $request->main_slider;
        $product->hot_deal = $request->hot_deal;
        $product->buyone_getone = $request->buyone_getone;
        $product->best_rated = $request->best_rated;
        $product->trand = $request->trand;
        $product->mid_slider = $request->mid_slider;
        $product->hot_new = $request->hot_new;
        $product->status = 1;

        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;

        if ($image_one && $image_two && $image_three) {
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(300, 300)->save('public/media/product/' . $image_one_name);
            $product->image_one = 'public/media/product/' . $image_one_name;

            $image_two_name = hexdec(uniqid()) . '.' . $image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(300, 300)->save('public/media/product/' . $image_two_name);
            $product->image_two = 'public/media/product/' . $image_two_name;

            $image_three_name = hexdec(uniqid()) . '.' . $image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(300, 300)->save('public/media/product/' . $image_three_name);
            $product->image_three = 'public/media/product/' . $image_three_name;

            $product->save();

            $notification = array(
                'message' => 'Product Added Successfully',
                'alert-type' => 'success',
            );

            return Redirect()->back()->with($notification);
        }
    }

    public function Inactive($id)
    {
        DB::table('products')->where('id', $id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Product Successfully Inactive',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function Active($id)
    {
        DB::table('products')->where('id', $id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Product Successfully Active',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function DeleteProduct($id)
    {
        $product = Product::find($id);

        $image_one = $product->image_one;
        $image_two = $product->image_two;
        $image_three = $product->image_three;

        unlink($image_one);
        unlink($image_two);
        unlink($image_three);

        $product->delete();

        $notification = array(
            'message' => 'Product Delete Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function ViewProduct($id)
    {
        $product = DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->select('products.*', 'categories.category_name', 'brands.brand_name', 'subcategories.subcategory_name')
            ->where('products.id', $id)->first();

        return view('admin.product.show', compact('product'));
    }

    public function EditProduct($id)
    {
        $product = Product::find($id);
        $brand = Brand::all();
        $category = Category::all();
        $subcategory = Subcategory::all();

        return view('admin.product.edit', compact('product', 'brand', 'category', 'subcategory'));
    }

    public function UpdateProduct(Request $request, $id)
    {
        $product = Product::find($id);

        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->product_quantity = $request->product_quantity;
        $product->discount_price = $request->discount_price;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->brand_id = $request->brand_id;
        $product->product_size = $request->product_size;
        $product->product_color = $request->product_color;
        $product->selling_price = $request->selling_price;
        $product->product_details = $request->product_details;
        $product->video_link = $request->video_link;
        $product->main_slider = $request->main_slider;
        $product->hot_deal = $request->hot_deal;
        $product->buyone_getone = $request->buyone_getone;
        $product->best_rated = $request->best_rated;
        $product->trand = $request->trand;
        $product->mid_slider = $request->mid_slider;
        $product->hot_new = $request->hot_new;

        $update = $product->update();

        if ($update) {
            $notification = array(
                'message' => 'Product Successfully Updated',
                'alert-type' => 'success',
            );

            return Redirect()->route('all.product')->with($notification);
        } else {
            $notification = array(
                'message' => 'Nothing To Updated',
                'alert-type' => 'success',
            );

            return Redirect()->route('all.product')->with($notification);
        }
    }

    public function UpdateProductPhoto(Request $request, $id)
    {
        $old_one = $request->old_one;
        $old_two = $request->old_two;
        $old_three = $request->old_three;

        $data = array();

        $image_one = $request->file('image_one');
        $image_two = $request->file('image_two');
        $image_three = $request->file('image_three');

        // For Image One

        if ($image_one) {
            unlink($old_one);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image_one->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/media/product/';
            $image_url = $upload_path . $image_full_name;
            $success = $image_one->move($upload_path, $image_full_name);

            $data['image_one'] = $image_url;
            $product_img = DB::table('products')->where('id', $id)->update($data);

            $notification = array(
                'message' => 'Image One Updated Successfully',
                'alert-type' => 'success',
            );

            return Redirect()->route('all.product')->with($notification);
        }

        // For Image Two

        if ($image_two) {
            unlink($old_two);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image_two->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/media/product/';
            $image_url = $upload_path . $image_full_name;
            $success = $image_two->move($upload_path, $image_full_name);

            $data['image_two'] = $image_url;
            $product_img = DB::table('products')->where('id', $id)->update($data);

            $notification = array(
                'message' => 'Image Two Updated Successfully',
                'alert-type' => 'success',
            );

            return Redirect()->route('all.product')->with($notification);
        }

        // For Image Three

        if ($image_three) {
            unlink($old_three);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image_three->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/media/product/';
            $image_url = $upload_path . $image_full_name;
            $success = $image_three->move($upload_path, $image_full_name);

            $data['image_three'] = $image_url;
            $product_img = DB::table('products')->where('id', $id)->update($data);

            $notification = array(
                'message' => 'Image Three Updated Successfully',
                'alert-type' => 'success',
            );

            return Redirect()->route('all.product')->with($notification);
        }
    }
}
