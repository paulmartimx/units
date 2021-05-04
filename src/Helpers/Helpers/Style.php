<?php


if (!function_exists('style')) {

    /**
     * style: toma un $path relativo a public_path() y devuelve un tag de <link> con query anti-cache
     *
     * @param string $path
     * @return string
     */

    function style($path, $url = false)
    {
        if(file_exists(public_path($path)))
            {
                $query = filemtime( public_path($path) );

                if($url)
                    return "<link rel='stylesheet' href='".url($path)."?{$query}' type='text/css' />";

                return "<link rel='stylesheet' href='/{$path}?{$query}' type='text/css' />";
            }

        return '';
    }
}