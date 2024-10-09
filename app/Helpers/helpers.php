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
     * @param int $price_old
     * @return int|string
     */
    function avito_price(int $price_rrc, string $brand, array $discounts, int $price_old = 0): int|string
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
        if ($discount && $additional == 'По умолчанию') {
            if ($price_old == 0 || $price_old == $price) {
                return round($price * (100 - $discount) / 100, -1);
            }
        }

        return $price;
    }
}

if (!function_exists('avito_show_discount')) {
    /**
     * @param int $price
     * @param string $brand
     * @param array $discounts
     * @param int $price_old
     * @return string
     */
    function avito_show_discount(int $price, string $brand, array $discounts, int $price_old = 0): string
    {
        list('discount' => $discount, 'additional' => $additional) = $discounts[$brand];
        if ($discount && $additional == 'По умолчанию') {
            if ($price_old == 0 || $price_old == $price) {
                return '<p>#'.$discount.'</p>';
            } else {
                return '<p>#Распродажа</p>';
            }
        }

        return '';
    }
}

if (!function_exists('avito_tile_type')) {
    /**
     * @param string $name
     * @return string
     */
    function avito_tile_type(string $name): string
    {
        if (stripos($name, 'литка') !== false) {
            return 'Плитка';
        }
        if (stripos($name, 'озаика') !== false) {
            return 'Мозаика';
        }
        if (stripos($name, 'анно') !== false) {
            return 'Панно';
        }
        if (stripos($name, 'ставка') !== false) {
            return 'Вставка';
        }
        if (stripos($name, 'ордюр') !== false) {
            return 'Бордюр';
        }
        if (stripos($name, 'голок') !== false) {
            return 'Уголок';
        }
        if (stripos($name, 'линтус') !== false) {
            return 'Плинтус';
        }

        return 'Плитка';
    }
}

if (!function_exists('avito_type')) {
    /**
     * @param string $name
     * @return string
     */
    function avito_type(string $name): string
    {
        if (stripos($name, 'литка') !== false
            || stripos($name, 'озаика') !== false
            || stripos($name, 'анно') !== false
            || stripos($name, 'ставка') !== false
            || stripos($name, 'ордюр') !== false
            || stripos($name, 'голок') !== false
            || stripos($name, 'линтус') !== false
        ) {
            return 'Керамическая плитка';
        } elseif (stripos($name, 'ерамогранит') !== false) {
            return 'Керамогранит';
        } else {
            return 'Другое';
        }
    }
}

if (!function_exists('avito_bauservice_width')) {
    /**
     * @param string|null $width
     * @param float $from
     * @param float $to
     * @return float
     */
    function avito_bauservice_width(string|null $width, float $from, float $to): float
    {
        $width = str_replace(',', '.', $width);
        $width = (float) $width;

        if ($width >= $from && $width <= $to) {
            return $width;
        } else {
            return 6666666;
        }
    }
}

if (!function_exists('avito_bauservice_length')) {
    /**
     * @param string|null $length
     * @return float
     */
    function avito_bauservice_length(string|null $length, float $from, float $to): float
    {
        $length = str_replace(',', '.', $length);
        $length = (float) $length;

        if ($length >= $from && $length <= $to) {
            return $length;
        } else {
            return 1212121212;
        }
    }
}

if (!function_exists('avito_bauservice_height')) {
    /**
     * @param string|null $height
     * @return float
     */
    function avito_bauservice_height(string|null $height, float $from, float $to): float
    {
        $height = str_replace(',', '.', $height);
        $height = (float) $height;
        $height = $height * 10;

        if ($height >= $from && $height <= $to) {
            return $height;
        } else {
            return 111111;
        }
    }
}

if (!function_exists('avito_bauservice_pattern')) {
    /**
     * @param string $title
     * @param string|null $design
     * @return string
     */
    function avito_bauservice_pattern(string $title ,string|null $design): string
    {
        if (stripos($title, 'ерраццо') !== false) {
            return 'Терраццо';
        } elseif (stripos($title, 'оль-перец') !== false) {
            return 'Соль-перец';
        } elseif (stripos($title, 'эчворк') !== false) {
            return 'Пэчворк';
        } elseif (stripos($title, 'рнамент') !== false) {
            return 'Орнамент';
        }

        return match ($design) {
            'Абстракция' => 'Орнамент',
            'Бетон, цемент', 'Бетон', 'Цемент' => 'Бетон',
            'Дерево', 'Дерево, паркет' => 'Дерево',
            'Камень' => 'Камень',
            'Кирпич' => 'Кирпич',
            'Моноколор' => 'Однотонный',
            'Мрамор' => 'Мрамор',
            'Мрамор и гранит' => 'Гранит',
            'Травертин' => 'Травертин',
            default => 'Другой',
        };
    }
}

if (!function_exists('avito_bauservice_for')) {
    /**
     * @param string|null $for
     * @return string
     */
    function avito_bauservice_for(string|null $for): string
    {
        return match ($for) {
            'Пол', 'Лестница, Пол' => 'На пол',
            'Стена' => 'На стену',
            default => 'На пол | На стену',
        };
    }
}

if (!function_exists('avito_bauservice_color')) {
    /**
     * @param string|null $color
     * @return string
     */
    function avito_bauservice_color(string|null $color): string
    {
        return match ($color) {
            'Бежевый', 'Темно-бежевый', 'Светло-бежевый', 'Серо-бежевый' => 'Бежевый',
            'Белый', 'Бежевый, Белый' => 'Белый',
            'Бирюзовый' => 'Бирюзовый',
            'Бордовый' => 'Бордовый',
            'Голубой', 'Голубой, Серый', 'Голубой, Коричневый', 'Белый, Голубой' => 'Голубой',
            'Желтый' => 'Желтый',
            'Зеленый', 'Зеленый, Черный', 'Зеленый, Серый', 'Бежевый, Зеленый', 'Белый, Зеленый' => 'Зеленый',
            'Золотой' => 'Золотой',
            'Бежево-коричневый', 'Коричневый', 'Табачный', 'Темно-коричневый', 'Серо-коричневый', 'Коричневый, Шоколад', 'Коричневый, Табачный', 'Коричневый, Серый' => 'Коричневый',
            'Красный', 'Коричневый, Красный' => 'Красный',
            'Оранжевый', 'Желтый, Оранжевый', 'Бежевый, Оранжевый' => 'Оранжевый',
            'Розовый', 'Белый, Розовый' => 'Розовый',
            'Серебряный', 'Серебряный, Черный' => 'Серебристый',
            'Серый', 'Темно-серый', 'Серый, Темно-серый', 'Светло-серый, Серый', 'Светло-серый', 'Серый, Черный' => 'Серый',
            'Синий', 'Сиреневый', 'Белый, Синий' => 'Синий',
            'Фиолетовый' => 'Фиолетовый',
            'Антрацит', 'Черный', 'Графитовый' => 'Черный',
            'Многоцветный', 'Разноцветный', 'Коричневый, Разноцветный, Серый, Фиолетовый', 'Белый, Коричневый, Серый, Черный', 'Бежевый, Белый, Голубой, Коричневый, Разноцветный', 'Белый, Разноцветный' => 'Разноцветный',
            default => 'Другой',
        };
    }
}

if (!function_exists('avito_bauservice_space_type')) {
    /**
     * @param string|null $for
     * @return string
     */
    function avito_bauservice_space_type(string|null $for): string
    {
        $a = [
            'Балкон',
            'Ванная',
            'Крыльцо',
            'Кухня',
            'Общественное помещение',
            'Ступени',
            'Терасса',
            'Туалет',
            'Улица',
            'Фартук',
            'Фасад',
        ];

        return match ($for) {
            'Для бассейна, Для ванной, Для гостиной, Для коридора, Для кухни, Для пола' => 'Балкон | Ванная | Крыльцо | Кухня | Туалет | Улица | Фартук',
            'Для бассейна, Для ванной, Для гостиной, Для коридора, Для кухни, Для пола, Для фасада, Общественные помещения, Строительная плитка', 'Для ванной, Для гостиной, Для коридора, Для кухни, Для пола, Для фасада, Общественные помещения' => 'Балкон | Ванная | Крыльцо | Кухня | Общественное помещение | Ступени | Терасса | Туалет | Улица | Фартук | Фасад',
            'Для ванной' => 'Ванная | Туалет',
            'Для ванной, Для гостиной', 'Для ванной, Для гостиной, Для коридора, Для пола', 'Для ванной, Для пола', 'Для гостиной, Для коридора, Для пола', 'Для гостиной, Для пола' => 'Балкон | Ванная | Туалет',
            'Для ванной, Для гостиной, Для коридора, Для кухни', 'Для ванной, Для гостиной, Для кухни', 'Для ванной, Для гостиной, Для кухни, Для пола', 'Для ванной, Для кухни' => 'Балкон | Ванная | Туалет | Кухня | Фартук',
            'Для ванной, Для гостиной, Для коридора, Для кухни, Для пола' => 'Балкон | Ванная | Крыльцо | Туалет | Кухня | Фартук',
            'Для ванной, Для гостиной, Для коридора, Для кухни, Для пола, Общественные помещения' => 'Балкон | Ванная | Крыльцо | Кухня | Общественное помещение | Туалет | Фартук',
            'Для ванной, Для гостиной, Для кухни, Для пола, Общественные помещения' => 'Балкон | Ванная | Туалет | Кухня | Общественное помещение | Фартук',
            'Для ванной, Для гостиной, Для кухни, Общественные помещения' => 'Ванная | Туалет | Кухня | Общественное помещение | Фартук',
            'Для гостиной' => 'Балкон | Крыльцо',
            'Для гостиной, Для коридора, Для пола, Общественные помещения' => 'Балкон | Ванная | Туалет | Общественное помещение',
            'Для кухни' => 'Кухня',
            'Для пола' => 'Балкон | Ванная | Крыльцо | Кухня | Туалет',
            'Для пола, Общественные помещения' => 'Балкон | Ванная | Крыльцо | Кухня | Туалет | Общественное помещение',
            'Для пола, Общественные помещения, Строительная плитка' => 'Балкон | Ванная | Крыльцо | Кухня | Туалет | Общественное помещение | Фасад',
            'Для фасада' => 'Фасад',
            'Общественные помещения' => 'Общественное помещение',
            default => 'default',
        };
    }
}
