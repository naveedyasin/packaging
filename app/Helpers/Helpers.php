<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

if (!function_exists('includeRouteFiles')) {

    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param $folder
     */
    function includeRouteFiles($folder)
    {
        $directory = $folder;
        $handle = opendir($directory);
        $directory_list = [$directory];

        while (false !== ($filename = readdir($handle))) {
            if ($filename != '.' && $filename != '..' && is_dir($directory . $filename)) {
                array_push($directory_list, $directory . $filename . '/');
            }
        }

        foreach ($directory_list as $directory) {
            foreach (glob($directory . '*.php') as $filename) {
                require $filename;
            }
        }
    }
}

if (!function_exists('generateReference')) {
    /**
     * Generte random string
     *
     * @return void
     */
    function generateReference($len = 6)
    {
        $chars = array(
            "1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
            "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
            "w", "x", "y", "z"
        );
        $textstr = "";
        for ($i = 0; $i < $len; $i++) {
            $textstr .= $chars[rand(0, count($chars) - 1)];
        }
        return $textstr;
    }
}

if(!function_exists('hasPermissions')) {
    function hasPermissions($permission){
        $allPermissions = Auth::user()->getPermissions()->pluck('slug')->toArray();
        $roles = Auth::user()->roles->pluck('slug')->toArray();

        return in_array($permission, $allPermissions) || in_array('admin', $roles);
    }
}
