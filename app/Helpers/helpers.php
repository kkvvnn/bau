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

if (!function_exists('size_by_name')) {
    /**
     * @param string $title
     * @param $width_or_length
     * @return float|string
     */
    function size_by_name(string $title, $width_or_length): float|string
    {
        $result = preg_match('/[0-9]+[.,]?[0-9]+[xх][0-9]+[.,]?[0-9]+/u', $title, $found); // one of x - cyrillic
        if ($result) {
            $size = preg_replace('/х/', 'x', $found[0]); // first x - cyrillic
            $size = str_replace(',', '.', $size);

            $size = explode('x', $size);

            list($a, $b) = $size;

            $a = (float) $a;
            $b = (float) $b;

            if ($a > $b) {
                $length = $a;
                $width = $b;
            } else {
                $length = $b;
                $width = $a;
            }


            if ($width_or_length == 'W') {
                return $width;
            }
            if ($width_or_length == 'L') {
                return $length;
            }

            return 'ERROR-1';
        }
        return 'ERROR-2';
    }
}

if (!function_exists('avito_bauservice_size')) {
    /**
     * @param string|null $size
     * @param float $from
     * @param float $to
     * @param string $title
     * @param string $width_or_length
     * @return float|string
     */
    function avito_bauservice_size(string|null $size, float $from, float $to, string $title, string $width_or_length): float|string
    {
        if (!$size) {
            return size_by_name($title, $width_or_length);
        }

        $size = str_replace(',', '.', $size);
        $size = (float) $size;

        if ($size >= $from && $size <= $to) {
            return $size;
        } else {
            return 'ERROR-OUT-OF-RANGE';
        }
    }
}


if (!function_exists('avito_bauservice_height')) {
    /**
     * @param string|null $height
     * @param float $from
     * @param float $to
     * @return float
     */
    function avito_bauservice_height(string|null $height, float $from, float $to): float
    {
        $height = str_replace(',', '.', $height);
        $height =((float) $height) * 10;

        if ($height >= $from && $height <= $to) {
            return $height;
        } else {
            return 9;  //if not specified
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
        $available = [
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
            default => 'Ванная | Кухня | Туалет',
        };
    }
}
