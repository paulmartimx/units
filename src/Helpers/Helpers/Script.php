<?php

if (!function_exists('script')) {

    /**
     * script: toma un $path relativo a public_path() y devuelve un tag de <script> con query anti-cache
     *
     * @param string $path
     * @return string
     */
    function script($path, $url = false)
    {
        if(file_exists(public_path($path)))
            {
                $query = filemtime( public_path($path) );
                
                if($url)
                    return "<script type='text/javascript' src='".url($path)."?{$query}'></script>";
                
                return "<script type='text/javascript' src='/{$path}?{$query}'></script>";
            }

        return '';
    }
}