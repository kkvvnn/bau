<?php

if (!function_exists('ucfirst_rus')) {
    /**
     * @param string $text
     * @return string
     */
    function ucfirst_rus(string $text): string
    {
        return mb_strtoupper(mb_substr($text, 0, 1)) . mb_substr($text, 1);
    }
}

if (!function_exists('avito_images_urls')) {
    /**
     * @param array $arr
     * @return string
     */
    function avito_images_urls(array $arr): string
    {
        $arr = array_unique($arr);
        $arr = array_slice($arr, 0, 10);
        return implode(' | ', $arr);
    }
}
