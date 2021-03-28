<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Seo()
    {
        $seo = DB::table('seo')->first();
        return view('admin.coupon.seo', compact('seo'));
    }

    public function UpdateSeo(Request $request)
    {
        $id = $request->id;

        $data = array();
        $data['meta_title'] = $request->meta_title;
        $data['meta_author'] = $request->meta_author;
        $data['meta_tag'] = $request->meta_tag;
        $data['meta_description'] = $request->meta_description;
        $data['meta_analytics'] = $request->meta_analytics;
        $data['bing_analytics'] = $request->bing_analytics;
        $data['created_at'] = now();
        $data['updated_at'] = now();
        DB::table('seo')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }
}
