<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class WebController extends Controller
{
    function switchCountry(Request $request)
    {
        Cookie::forget('country');
        Cookie::queue('country', $request->cid, time() + 60 * 60 * 24 * 365);
        return redirect()->back()->with("success", "Country switched successfully");
    }

    function refreshCaptcha()
    {
        return response()->json(['captcha' => captcha_img('flat')]);
    }

    function homePage(Request $request)
    {
        if (!Cookie::get('country')) Cookie::queue('country', Country::first()->id, time() + 60 * 60 * 24 * 365);
        $title = "Prime Elite Property - Buy, Sell, Rent and Invest Premium Properties in USA";
        $desc = "";
        $keywords = "";
        return view('index', compact('title', 'desc', 'keywords'));
    }

    function login()
    {
        if (Auth::user()):
            return view('user.dashboard');
        else:
            return view('account.login');
        endif;
    }

    function register()
    {
        if (Auth::user()):
            return view('user.dashboard');
        else:
            return view('account.register');
        endif;
    }

    function dashboard()
    {
        return view('user.dashboard');
    }

    function terms()
    {
        return view('terms');
    }
}
