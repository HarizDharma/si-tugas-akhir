<?php

if (!function_exists('isRequestBladeView')) {
    function isRequestBladeView()
    {
        $acceptHeader = request()->header('Accept');

        return !request()->wantsJson() && ! request()->isJson();
    }
}


