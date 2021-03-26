<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Response;

class CartController extends Controller
{
    public function AddCart($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $data = array();

        if ($product->discount_price == NULL) {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';
            Cart::add($data);

            return \Response::json(['success' => 'Successfully add on your cart']);
        } else {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';
            Cart::add($data);

            return \Response::json(['success' => 'Successfully add on your cart']);
        }
    }

    public function Check()
    {
        $countent = Cart::content();
        // return response()->json($countent);
        dd($countent);
    }

    public function ShowCart()
    {
        $cart = Cart::content();
        return view('pages.cart', compact('cart'));
    }

    public function RemoveCart($rowId)
    {
        Cart::remove($rowId);

        $notification = array(
            'message' => 'Product remove form cart',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function UpdateCartItem(Request $request)
    {
        $rowId = $request->productId;
        $qty = $request->qty;
        Cart::update($rowId, $qty);

        $notification = array(
            'message' => 'Product Quantity Updated',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function ViewProduct($id)
    {
        $product = DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->select('products.*', 'categories.category_name', 'subcategories.subcategory_name', 'brands.brand_name')
            ->where('products.id', $id)
            ->first();

        $color = $product->product_color;
        $product_color = explode(',', $color);

        $size = $product->product_size;
        $product_size = explode(',', $size);

        return response::json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
        ));
    }

    public function InsertCart(Request $request)
    {
        $id = $request->product_id;

        $product = DB::table('products')->where('id', $id)->first();
        $data = array();

        if ($product->discount_price == NULL) {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);

            $notification = array(
                'message' => 'Product Added successfully',
                'alert-type' => 'success',
            );

            return Redirect()->back()->with($notification);
        } else {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);

            $notification = array(
                'message' => 'Product Added successfully',
                'alert-type' => 'success',
            );

            return Redirect()->back()->with($notification);
        }
    }

    public function Checkout()
    {
        if (Auth::check()) {
            $cart = Cart::content();
            return view('pages.checkout', compact('cart'));
        } else {
            $notification = array(
                'message' => 'At first login your account',
                'alert-type' => 'success',
            );

            return Redirect()->route('login')->with($notification);
        }
    }

    public function Wishlist()
    {
        $userid = Auth::id();
        $product = DB::table('wishlists')
            ->join('products', 'wishlists.product_id', 'products.id')
            ->select('products.*', 'wishlists.user_id')
            ->where('wishlists.user_id', $userid)
            ->get();

        return view('pages.wishlist', compact('product'));
    }

    public function Coupon(Request $request)
    {
        $coupon = $request->coupon;
        $check = DB::table('coupons')->where('coupon', $coupon)->first();

        if ($check) {
            Session::put('coupon', [
                'name' => $check->coupon,
                'discount' => $check->discount,
                'balance' => Cart::subtotal() - $check->discount,
            ]);

            $notification = array(
                'message' => 'Successfully Coupon Applied',
                'alert-type' => 'success',
            );

            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Invalid Coupon',
                'alert-type' => 'success',
            );

            return Redirect()->back()->with($notification);
        }
    }

    public function CouponRemove()
    {
        Session::forget('coupon');
        $notification = array(
            'message' => 'Your coupon remove successfully',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function PaymentStep()
    {
        $cart = Cart::content();

        return view('pages.pyment', compact('cart'));
    }
}
