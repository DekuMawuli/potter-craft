<?php

namespace App\CustomHelpers;

use Illuminate\Support\Str;

class CustomHelper
{

    public static function message(string $at, string $am): void
    {
        session()->flash("alert-type", $at);
        session()->flash("alert-message", $am);
    }


    public static function generateModelCode(string $prefix): string
    {
        return $prefix.Str::random(10);
    }

}
