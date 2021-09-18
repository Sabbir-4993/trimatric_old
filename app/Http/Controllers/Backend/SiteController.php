<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Settings;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function settings(){
        $site = Settings::all();
        return view('backend.settings.settings', compact('site'));
    }

    public function site_update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone1' => 'required',
            'phone2' => '',
            'address' => 'required',
        ]);
        $settings = new Settings();
        $settings->name = $request->name;
        $settings->email = $request->email;
        $settings->phone1 = $request->phone1;
        $settings->phone2 = $request->phone2;
        $settings->address = $request->address;
        $settings->save();
        return redirect()->back()->with('message', 'Settings Update Successfully');

    }

    public function social(){
        return view('backend.settings.social');
    }

    public function password(){
        return view('backend.settings.password');
    }


}
