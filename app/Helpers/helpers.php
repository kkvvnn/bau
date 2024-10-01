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

if (!function_exists('avito_price')) {
    /**
     * @param int $price_rrc
     * @param string $brand
     * @param array $discounts
     * @param int $old_price
     * @return int|string
     */
    function avito_price(int $price_rrc, string $brand, array $discounts, int $old_price = 0): int|string
    {
        $price = $price_rrc;

        if ($price == 0) {
            return '';
        }

        list('discount' => $discount, 'additional' => $additional) = $discounts[$brand];

        if ($additional == 'Не указывать цену') {
            return '';
        }
        if ($additional == 'Цена 1 рубль') {
            return 1;
        }
        if ($additional == 'По умолчанию') {
            if ($discount) {
                if ($old_price == 0 || $old_price == $price) {
                    return round($price * (100 - $discount) / 100, -1);
                }
            }
        }

        return '';
    }
}
