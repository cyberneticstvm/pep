<?php

use App\Models\Country;
use App\Models\Setting;
use Illuminate\Support\Facades\Cookie;

function uniqueId($model, $column)
{
    do {
        $code = random_int(100000, 999999);
    } while ($model::where($column, $code)->first());
    return $code;
}

function settings()
{
    return Setting::find(1);
}

function preloaderText()
{
    $text = settings()['name'];
    return str_split(strtoupper(substr(str_replace(" ", "", $text), 0, 10)));
}

function country()
{
    return (Cookie::get('country')) ? Country::find(Cookie::get('country')) : Country::find(1);
}

function countires()
{
    return Country::whereNull('country_id')->orderBy('name')->get();
}
