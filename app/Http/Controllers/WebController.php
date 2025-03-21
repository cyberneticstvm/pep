<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class WebController extends Controller
{
    function homePage(Request $request)
    {
        if (Cookie::get('country')) Cookie::queue('country', Country::first()->id);
        $title = "Prime Elite Property - Buy, Sell, Rent and Invest Premium Properties in USA";
        $desc = "";
        $keywords = "";
        return view('index', compact('title', 'desc', 'keywords'));
    }
}
