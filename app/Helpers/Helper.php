<?php

use App\Models\Country;
use Illuminate\Support\Facades\Cookie;

function uniqueId($model, $column)
{
    do {
        $code = random_int(100000, 999999);
    } while ($model::where($column, $code)->first());
    return $code;
}

function country()
{
    return (Cookie::get('country')) ? Country::find(Cookie::get('country')) : Country::find(1);
}
