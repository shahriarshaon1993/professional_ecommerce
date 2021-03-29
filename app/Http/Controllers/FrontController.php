<?php

namespace App\Http\Controllers;

use App\Models\Admin\Newslater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function StoreNewslater(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|unique:newslaters|email|max:55'
        ]);

        $newsleter = new Newslater();
        $newsleter->email = $request->email;
        $newsleter->save();

        $notification = array(
            'message' => 'Your Subscription Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function OrderTracking(Request $request)
    {
        $code = $request->code;

        $track = DB::table('orders')->where('status_code', $code)->first();

        if ($track) {
            return view('pages.tracking', compact('track'));
        } else {
            $notification = array(
                'message' => 'Staus Code Invalid',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
