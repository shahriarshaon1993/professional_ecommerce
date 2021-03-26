<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.passwords.change');
    }

    public function ChangePassword(Request $request)
    {
        $this->validate($request, [
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            $notification = array(
                'message' => 'Password is change successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('login')->with($notification);
        } else {

            $notification = array(
                'message' => 'Current Password is Invalid',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }
}
