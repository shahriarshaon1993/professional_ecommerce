<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Admin\Coupon;
use App\Models\Admin\Newslater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Coupon()
    {
        $coupons = Coupon::all();
        return view('admin.coupon.coupon', compact('coupons'));
    }

    public function StoreCoupon(Request $request)
    {
        $validateData = $request->validate([
            'coupon' => 'required|max:255',
            'discount' => 'required|integer|max:255',
        ]);

        $coupon = new Coupon();
        $coupon->coupon = $request->coupon;
        $coupon->discount = $request->discount;
        $coupon->save();

        $notification = array(
            'message' => 'Coupon Added Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function DeleteCoupon($id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();

        $notification = array(
            'message' => 'Coupon Deleted Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function EditCoupon($id)
    {
        $coupon = Coupon::find($id);
        return view('admin.coupon.edit_coupon', compact('coupon'));
    }

    public function UpdateCoupon(Request $request, $id)
    {
        $validateData = $request->validate([
            'coupon' => 'required|max:255',
            'discount' => 'required|integer|max:255',
        ]);

        $coupon = Coupon::find($id);
        $coupon->coupon = $request->coupon;
        $coupon->discount = $request->discount;
        $coupon->save();

        $notification = array(
            'message' => 'Coupon Updated Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->route('admin.coupons')->with($notification);
    }

    public function Newalater()
    {
        $newslaters = Newslater::all();
        return view('admin.coupon.newslater', compact('newslaters'));
    }

    public function DeleteNewsleter($id)
    {
        $newslater = Newslater::find($id);
        $newslater->delete();

        $notification = array(
            'message' => 'Delete Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function DeleteAll(Request $request)
    {
        $ids = $request->get('ids');
        $dbs = DB::delete('delete from newslaters where id in (' . implode(",", $ids) . ')');

        $notification = array(
            'message' => 'Delete Your Selected Data',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }
}
