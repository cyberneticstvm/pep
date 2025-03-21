<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class WebController extends Controller
{
    function homePage(Request $request)
    {
        $country = Cookie::get('country');
        if (!$country) Cookie::queue('country', Country::first()->code);
        $title = "Prime Elite Property - Buy, Sell, Rent and Invest Premium Properties in USA";
        $desc = "";
        $keywords = "";
        return view('index', compact('title', 'desc', 'keywords'));
    }
}
