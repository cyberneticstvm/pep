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
    return Country::where('code', Cookie::get('country'))->first();
}
