<?php

use App\Models\Profile;

if (! function_exists('getCompanyInfoSosial')) {

    function getCompanyInfoSosial()
    {
        return Profile::where('group_name','=','sosialprofile')->get();
    }
}
