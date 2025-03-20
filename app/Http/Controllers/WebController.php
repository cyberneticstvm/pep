<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    function homePage(Request $request)
    {
        $title = "Prime Elite Property - Buy, Sell, Rent and Invest Premium Properties in USA";
        $desc = "";
        $keywords = "";
        return view('index', compact('title', 'desc', 'keywords'));
    }
}
