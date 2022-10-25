<?php

namespace App\Helpers;

use App\Models\Setting;

class Helper
{
    static function GeneralSiteSettings($var)
    {
        $Setting = Setting::find(1);
        return $Setting->$var;
    }
}