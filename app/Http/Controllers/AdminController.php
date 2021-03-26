<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.home');
    }

    public function ChangePassword()
    {
        return view('admin.auth.passwordchange');
    }

    public function UpdatePass(Request $request)
    {
        $password = Auth::user()->password;
        $oldpass = $request->oldpass;
        $newpass = $request->password;
        $confirm = $request->password_confirmation;

        if (Hash::check($oldpass, $password)) {

            if ($newpass === $confirm) {
                $user = Admin::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();

                $notification = array(
                    'message' => 'Password Changed Successfully ! Now Login with Your New Password',
                    'alert-type' => 'success'
                );

                return Redirect()->route('admin.login')->with($notification);
            } else {
                $notification = array(
                    'message' => 'New password and Confirm Password not matched!',
                    'alert-type' => 'error'
                );

                return Redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Old Password not matched!',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function Logout()
    {
        Auth::logout();
        $notification = array(
            'message' => 'Admin Successfully Logout',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.login')->with($notification);
    }
}
