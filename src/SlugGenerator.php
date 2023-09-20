<?php

namespace Slg\SlugGenerator;

use Illuminate\Support\Str;

class SlugGenerator
{
    public static function generate($string)
    {
        $string = Str::lower($string);
        $string = preg_replace('/[^a-zA-Z0-9 -]/', '', $string);

        $string = str_replace(' ', '-', $string);
        $string = preg_replace('/-+/', '-', $string);

        return $string;
    }
}
