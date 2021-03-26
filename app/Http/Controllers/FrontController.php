<?php

namespace App\Http\Controllers;

use App\Models\Admin\Newslater;
use Illuminate\Http\Request;

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
}
