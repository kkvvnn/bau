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
     * @param bool $shuffle
     * @return string
     */
    function avito_images_urls(array $arr, bool $shuffle = false): string
    {
        $arr = array_unique($arr);
        $arr = array_slice($arr, 0, 10);
        foreach ($arr as &$a) {
            $a = str_replace(' ', '%20', $a);
        }
        if ($shuffle) {
            shuffle($arr);
        }
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

if (!function_exists('avito_show_discount_2')) {
    /**
     * @param int|null $vivod
     * @param int $price
     * @param string $brand
     * @param array $discounts
     * @param int $price_old
     * @return string
     */
    function avito_show_discount_2(int|null $vivod, int $price, string $brand, array $discounts, int $price_old = 0): string
    {
        if ($vivod) {
            return 'Вывод из ОА';
        }
        list('discount' => $discount, 'additional' => $additional) = $discounts[$brand];
        if ($discount && $additional == 'По умолчанию') {
            if ($price_old == 0 || $price_old == $price) {
                return $discount;
            } else {
                return 'Распродажа';
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

if (!function_exists('avito_type_of_water_mixers')) {
    /**
     * @param string $name
     * @return string
     */
    function avito_type_of_water_mixers(string $name): string
    {
        if (stripos($name, 'ванн') !== false || stripos($name, 'душ') !== false) {
            return 'Для ванн и душей';
        }
        if (stripos($name, 'раковин') !== false) {
            return 'Для умывальников и раковин';
        }
        if (stripos($name, 'кухн') !== false) {
            return 'Для кухни';
        }
        if (stripos($name, 'биде') !== false) {
            return 'Для биде';
        }
        if (stripos($name, 'питьев') !== false) {
            return 'Краны питьевой воды';
        }
        if (stripos($name, 'омплект') !== false) {
            return 'Комплекты';
        }
        if (stripos($name, 'омплектующ') !== false) {
            return 'Комплектующие';
        }

        return 'Для ванн и душей';
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
            || stripos($name, 'екор') !== false
        ) {
            return 'Керамическая плитка';
        } elseif (stripos($name, 'ерамогранит') !== false) {
            return 'Керамогранит';
        }
        elseif (stripos($name, 'обрезной') !== false) {
            return 'Керамогранит';
        }
        elseif (stripos($name, 'лаппатированный') !== false) {
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

            return 0;
        }
        return 0;
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
     * @return int
     */
    function avito_bauservice_height(string|null $height, float $from, float $to): int
    {
        $height = str_replace(',', '.', $height);
        $height =((float) $height) * 10;
        $height = round($height);

        if ($height >= $from && $height <= $to) {
            return $height;
        } else {
            return 9;  //if not specified
        }
    }
}
if (!function_exists('avito_artkera_height')) {
    /**
     * @param string|null $height
     * @param float $from
     * @param float $to
     * @return int
     */
    function avito_artkera_height(string|null $height, float $from, float $to): int
    {
        $height = str_replace(',', '.', $height);
        $height =((float) $height) / 10;
        $height = round($height);

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
            'Мрамор' => 'Мрамор',
            'Мрамор и гранит' => 'Гранит',
            'Травертин' => 'Травертин',
            default => 'Однотонный',
        };
    }
}

if (!function_exists('avito_spc_skalla_pattern')) {
    /**
     * @param string $title
     * @return string
     */
    function avito_spc_skalla_pattern(string $title): string
    {
        if (stripos($title, 'Дуб') !== false) {
            return 'Дуб';
        } elseif (stripos($title, 'Орех') !== false) {
            return 'Орех';
        } elseif (stripos($title, 'Мрамор') !== false) {
            return 'Мрамор';
        } elseif (stripos($title, 'Бетон') !== false) {
            return 'Бетон';
        } else {
            return 'Одноцветный';
        }

    }
}

if (!function_exists('avito_spc_skalla_thickness')) {
    /**
     * @param float $thickness
     * @return string
     */
    function avito_spc_skalla_thickness(float $thickness): string
    {
        return match ($thickness) {
            4.0 => '4 мм',
            4.5 => '4,5 мм',
            5.0 => '5 мм',
            default => '',
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
        if (stripos($for, 'напольн') !== false) {
            return 'На пол';
        }
        if (stripos($for, 'настенн') !== false) {
            return 'На стену';
        }
        if (stripos($for, 'екор') !== false) {
            return 'На стену';
        }

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
            'Бежевый', 'Темно-бежевый', 'Светло-бежевый', 'Серо-бежевый' => 'Бежевая',
            'Белый', 'Бежевый, Белый' => 'Белая',
            'Бирюзовый' => 'Бирюзовая',
            'Бордовый' => 'Бордовая',
            'Голубой', 'Голубой, Серый', 'Голубой, Коричневый', 'Белый, Голубой' => 'Голубая',
            'Желтый' => 'Жёлтая',
            'Зеленый', 'Зеленый, Черный', 'Зеленый, Серый', 'Бежевый, Зеленый', 'Белый, Зеленый' => 'Зелёная',
            'Золотой' => 'Золотая',
            'Бежево-коричневый', 'Коричневый', 'Табачный', 'Темно-коричневый', 'Серо-коричневый', 'Коричневый, Шоколад', 'Коричневый, Табачный', 'Коричневый, Серый' => 'Коричневая',
            'Красный', 'Коричневый, Красный' => 'Красная',
            'Оранжевый', 'Желтый, Оранжевый', 'Бежевый, Оранжевый' => 'Оранжевая',
            'Розовый', 'Белый, Розовый' => 'Розовая',
            'Серебряный', 'Серебряный, Черный' => 'Серебристая',
            'Серый', 'Темно-серый', 'Серый, Темно-серый', 'Светло-серый, Серый', 'Светло-серый', 'Серый, Черный' => 'Серая',
            'Синий', 'Сиреневый', 'Белый, Синий' => 'Синяя',
            'Фиолетовый' => 'Фиолетовая',
            'Антрацит', 'Черный', 'Графитовый' => 'Чёрная',
            default => 'Разноцветная',
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

if (!function_exists('avito_packaging_type')) {
    /**
     * @param string|null $unit
     * @return string
     */
    function avito_packaging_type(string|null $unit): string
    {
        $available = [
            'Штучно',
            'Упаковка',
        ];

        return match ($unit) {
            'шт' => 'Штучно',
            default => 'Упаковка',
        };
    }
}

if (!function_exists('avito_package_quantity')) {
    /**
     * @param string|null $square_in_pack
     * @return string
     */
    function avito_package_quantity(string|null $square_in_pack): string
    {
        if ((float)$square_in_pack > 5) {
            return '1';
        }

        return (string)((float)$square_in_pack);
    }
}

if (!function_exists('avito_kvartz_vinil_installation_type')) {
    /**
     * @param string|null $tip_soedineniya
     * @return string
     */
    function avito_kvartz_vinil_installation_type(string|null $tip_soedineniya): string
    {
        $available = [
            'Замковый',
            'Клеевой',
            'Самоклеящийся',
        ];

        return match ($tip_soedineniya) {
            'Клеевое' => 'Клеевой',
            default => 'Замковый',
        };
    }
}

if (!function_exists('avito_surface_leedo')) {
    /**
     * @param string|null $surface
     * @return string
     */
    function avito_surface_leedo(string|null $surface): string
    {
        $available = [
            'Глянцевая',
            'Лаппатированная (полуполированная)',
            'Матовая',
            'Комбинированная',
        ];

        return match ($surface) {
            'антислип, антискользящая', 'матовая', 'матовая, шероховатая', 'структурированная, матовая', 'Матовая', 'Неполированная матовая', 'Карвинг', 'Неполированная структурная', 'Cтруктурный Карвинг', 'Матовая Структурная', 'Матовый микроструктура', 'Матовый Карвинг', 'Матовый патинированный', 'Противоскользящая', 'Металлизированная', 'Противоскользящая структурная' => 'Матовая',
            'полуматовая', 'сатинированная, полуглянцевая', 'полуглянцевая', 'структурированная, полуматовая', 'структурированная, полуглянцевая', 'Лаппатированная', 'Сатинированная', 'Полуполированная', 'Сахарная', 'Полное лаппатирование', 'Сатинированный' => 'Лаппатированная (полуполированная)',
            'полированная, глянцевая', 'структурированная и глянцевая', 'рельефная глянцевая', 'Полированная', 'Глянцевая', 'Полированный матированный', 'Лакированная', 'Лакированная, антибактериальная обработка' => 'Глянцевая',
            default => 'Комбинированная',
        };
    }
}

if (!function_exists('avito_texture_leedo')) {
    /**
     * @param string|null $texture
     * @return string
     */
    function avito_texture_leedo(string|null $texture): string
    {
        $available = [
            'Гладкая',
            'Рельефная (структурированная)',
        ];

        return match ($texture) {
            'Да', 'рельефная матовая и глянцевая', 'структурированная и глянцевая', 'рельефная глянцевая', 'структурированная, полуматовая', 'структурированная, полуглянцевая', 'структурированная, матовая', 'Cтруктурный Карвинг', 'Неполированная структурная', 'Матовая Структурная', 'Матовый микроструктура', 'Противоскользящая структурная' => 'Рельефная (структурированная)',
            default => 'Гладкая',
        };
    }
}

if (!function_exists('avito_shape_leedo')) {
    /**
     * @param string|null $shape
     * @return string
     */
    function avito_shape_leedo(string|null $shape): string
    {
        $available = [
            'Квадрат',
            'Прямоугольник',
            'Октагон (Восьмиугольник)',
            'Круг',
            'Соты (Шестиугольник)',
            'Ромб',
            'Особая форма',
        ];

        return match ($shape) {
            'квадрат' => 'Квадрат',
            'прямоугольник' => 'Прямоугольник',
            'гексагон (шестиугольная)', 'гексагон вытянутый (длинный шестиугольник)' => 'Соты (Шестиугольник)',
            'diamond - ромбовидная тессера' => 'Ромб',
            'круг' => 'Круг',
            default => 'Особая форма',
        };
    }
}

if (!function_exists('avito_color_leedo')) {
    /**
     * @param string|null $color
     * @return string
     */
    function avito_color_leedo(string|null $color): string
    {
        $available = [
            'Белая',
            'Белёное дерево',
            'Бежевая',
            'Серое дерево',
            'Серебристая',
            'Серая',
            'Светло-коричневое дерево',
            'Коричневая',
            'Золотистое дерево',
            'Тёмное дерево',
            'Чёрная',
            'Золотая',
            'Жёлтая',
            'Оранжевая',
            'Розовая',
            'Красная',
            'Бордовая',
            'Фиолетовая',
            'Синяя',
            'Голубая',
            'Бирюзовая',
            'Зелёная',
            'Зеркальная',
            'Разноцветная',
        ];

        return match ($color) {
            'синий' => 'Синяя',
            'коричневый|жёлто-коричневый' => 'Коричневая',
            'чёрный|тёмно-серый|антрацитовый|серебристый' => 'Чёрная',
            'золотистый|коричневый|золотой|бронзовый|медный|металлик' => 'Золотая',
            'белый|серый' => 'Серая',
            'золотой металлик|золотистый|золото|металлик|жёлтый' => 'Золотая',
            'бежевый|жёлтый' => 'Бежевая',
            'оранжевый|жёлтый|коричневый' => 'Оранжевая',
            'коричневый' => 'Коричневая',
            'сиреневый|белый|серый' => 'Фиолетовая',
            'серебристый металлик|серебро|серебристый|металлик|серый' => 'Серебристая',
            'синий|голубой' => 'Голубая',
            'оранжевый|чёрный|золотистый' => 'Оранжевая',
            'белый|серебристый|серый|металлик' => 'Серебристая',
            'коричневый|жёлто-коричневый|золотистый|бронзовый' => 'Золотая',
            'бежевый|коричневый|бронзовый|золотистый|жёлтый|жёлто-коричневый' => 'Золотая',
            'бежевый|кремовый|песочный' => 'Бежевая',
            'серый|серебристый' => 'Серебристая',
            'серый' => 'Серая',
            'голубой|белый|серый|бело-голубой' => 'Голубая',
            'коричневый|оранжевый|бежевый' => 'Коричневая',
            'белый' => 'Белая',
            'голубой|синий' => 'Голубая',
            'золотой|золотистый|золото|жёлтый|коричневый' => 'Золотая',
            'бежевый|золотой|золотистый|коричневый' => 'Бежевая',
            'чёрный' => 'Чёрная',
            'бежевый|кремовый|серебристый|металлик' => 'Бежевая',
            'голубой|синий|бирюзовый' => 'Бирюзовая',
            'синий|морской|чёрный|голубой|бирюзовый' => 'Бирюзовая',
            'белый|серый|серо-белый микс' => 'Серая',
            'бежевый|серебристый|серый|бежево-серый' => 'Бежевая',
            'фиолетовый|бежевый' => 'Фиолетовая',
            'серый|белый|чёрный|чёрно-белый' => 'Серая',
            'зелёный|хаки' => 'Зелёная',
            'чёрный|чёрно-белый' => 'Чёрная',
            'оранжевый|коричневый' => 'Оранжевая',
            'фиолетовый|сиреневый|розовый' => 'Фиолетовая',
            'бежевый|кремовый|песочный|коричневый|бежево-коричневый' => 'Бежевая',
            'оранжевый|бежевый|медный' => 'Бежевая',
            'белый|молочный' => 'Белая',
            'коричневый|белый' => 'Коричневая',
            'белый|салатовый' => 'Белая',
            'красно-коричневый|красный|коричневый' => 'Красная',
            'жёлтый' => 'Жёлтая',
            'синий|белый|бело-синий' => 'Синяя',
            'белый|серый|розовый' => 'Розовая',
            default => 'Разноцветная',
        };
    }
}

if (!function_exists('avito_pattern_leedo')) {
    /**
     * @param array|null $pattern
     * @return string
     */
    function avito_pattern_leedo(array|null $pattern): string
    {
        $available = [
            'Однотонный',
            'Мрамор',
            'Камень',
            'Гранит',
            'Оникс',
            'Травертин',
            'Бетон',
            'Цемент',
            'Дерево',
            'Кирпич',
            'Орнамент',
            'Пэчворк',
            'Геометрия',
            'Терраццо',
            'Соль-перец',
            'Иллюстрация (принт)',
            'Растительный',
        ];

        if (in_array("моноколор", $pattern)) {
            return 'Однотонный';
        } else if (in_array('паттерн - орнамент', $pattern)) {
            return 'Орнамент';
        } else if (in_array('древесная текстура с неяркими прожилками', $pattern)) {
            return 'Дерево';
        } else {
            return 'Мрамор';
        }
    }
}


if (!function_exists('is_multi_pixel')) {
    /**
     * @param string $vendor_code
     * @return string|bool
     */
    function is_multi_pixel(string $vendor_code): string|bool
    {
        $multies = [
            'PIX341' => 'Pixmosaic Venezia',
            'PIX340' => 'Pixmosaic Venezia',
            'PIX348' => 'Pixmosaic Venezia',
            'PIX347' => 'Pixmosaic Venezia',
            'PIX346' => 'Pixmosaic Venezia',
            'PIX345' => 'Pixmosaic Venezia',
            'PIX344' => 'Pixmosaic Venezia',
            'PIX343' => 'Pixmosaic Venezia',
            'PIX342' => 'Pixmosaic Venezia',

            'PIX264' => 'Pixmosaic galka',
            'PIX265' => 'Pixmosaic galka',
            'PIX266' => 'Pixmosaic galka',
            'PIX267' => 'Pixmosaic galka',

            'PIX736' => 'Pixmosaic kamen glass 1',
            'PIX735' => 'Pixmosaic kamen glass 1',
            'PIX734' => 'Pixmosaic kamen glass 1',
            'PIX730' => 'Pixmosaic kamen glass 1',
            'PIX729' => 'Pixmosaic kamen glass 1',
            'PIX728' => 'Pixmosaic kamen glass 1',
            'PIX727' => 'Pixmosaic kamen glass 1',
            'PIX726' => 'Pixmosaic kamen glass 1',
            'PIX725' => 'Pixmosaic kamen glass 1',

            'PIX737' => 'Pixmosaic kamen glass 2',
            'PIX723' => 'Pixmosaic kamen glass 2',
            'PIX722' => 'Pixmosaic kamen glass 2',
            'PIX721' => 'Pixmosaic kamen glass 2',
            'PIX720' => 'Pixmosaic kamen glass 2',
            'PIX715' => 'Pixmosaic kamen glass 2',
            'PIX714' => 'Pixmosaic kamen glass 2',
            'PIX704' => 'Pixmosaic kamen glass 2',

            'PIX717' => 'Pixmosaic glass',
            'PIX739' => 'Pixmosaic glass',
            'PIX716' => 'Pixmosaic glass',
            'PIX712' => 'Pixmosaic glass',
            'PIX710' => 'Pixmosaic glass',
            'PIX708' => 'Pixmosaic glass',
            'PIX707' => 'Pixmosaic glass',
            'PIX705' => 'Pixmosaic glass',

            'PIX766' => 'Pixmosaic soft touch',
            'PIX764' => 'Pixmosaic soft touch',
            'PIX765' => 'Pixmosaic soft touch',
            'PIX757' => 'Pixmosaic soft touch',
            'PIX756' => 'Pixmosaic soft touch',
            'PIX755' => 'Pixmosaic soft touch',
            'PIX759' => 'Pixmosaic soft touch',
            'PIX758' => 'Pixmosaic soft touch',
            'PIX762' => 'Pixmosaic soft touch',
            'PIX763' => 'Pixmosaic soft touch',
            'PIX761' => 'Pixmosaic soft touch',
            'PIX760' => 'Pixmosaic soft touch',

            'PIX775' => 'Pixmosaic perlamutr',
            'PIX774' => 'Pixmosaic perlamutr',
            'PIX773' => 'Pixmosaic perlamutr',
            'PIX772' => 'Pixmosaic perlamutr',
            'PIX771' => 'Pixmosaic perlamutr',
            'PIX770' => 'Pixmosaic perlamutr',
            'PIX769' => 'Pixmosaic perlamutr',
            'PIX768' => 'Pixmosaic perlamutr',
            'PIX767' => 'Pixmosaic perlamutr',
            'PIX754' => 'Pixmosaic perlamutr',
            'PIX753' => 'Pixmosaic perlamutr',
            'PIX752' => 'Pixmosaic perlamutr',
            'PIX751' => 'Pixmosaic perlamutr',
            'PIX750' => 'Pixmosaic perlamutr',
            'PIX701' => 'Pixmosaic perlamutr',
            'PIX700' => 'Pixmosaic perlamutr',
            'PIX703' => 'Pixmosaic perlamutr',
            'PIX702' => 'Pixmosaic perlamutr',

            'PIX732' => 'Pixmosaic metall',
            'PIX731' => 'Pixmosaic metall',
            'PIX709' => 'Pixmosaic metall',

            'PIX132' => 'Pixmosaic glass pressovan',
            'PIX131' => 'Pixmosaic glass pressovan',
            'PIX130' => 'Pixmosaic glass pressovan',
            'PIX133' => 'Pixmosaic glass pressovan',
            'PIX129' => 'Pixmosaic glass pressovan',
            'PIX128' => 'Pixmosaic glass pressovan',
            'PIX127' => 'Pixmosaic glass pressovan',
            'PIX126' => 'Pixmosaic glass pressovan',
            'PIX125' => 'Pixmosaic glass pressovan',
            'PIX124' => 'Pixmosaic glass pressovan',
            'PIX107' => 'Pixmosaic glass pressovan',
            'PIX106' => 'Pixmosaic glass pressovan',
            'PIX104' => 'Pixmosaic glass pressovan',
            'PIX102' => 'Pixmosaic glass pressovan',
            'PIX110' => 'Pixmosaic glass pressovan',
            'PIX105' => 'Pixmosaic glass pressovan',
            'PIX111' => 'Pixmosaic glass pressovan',
            'PIX109' => 'Pixmosaic glass pressovan',
            'PIX108' => 'Pixmosaic glass pressovan',
            'PIX121' => 'Pixmosaic glass pressovan',
            'PIX100' => 'Pixmosaic glass pressovan',
            'PIX122' => 'Pixmosaic glass pressovan',
            'PIX123' => 'Pixmosaic glass pressovan',
            'PIX120' => 'Pixmosaic glass pressovan',
            'PIX113' => 'Pixmosaic glass pressovan',
            'PIX116' => 'Pixmosaic glass pressovan',
            'PIX117' => 'Pixmosaic glass pressovan',
            'PIX114' => 'Pixmosaic glass pressovan',
            'PIX119' => 'Pixmosaic glass pressovan',

            'PIX014' => 'Pixmosaic crystall glass',
            'PIX013' => 'Pixmosaic crystall glass',
            'PIX006' => 'Pixmosaic crystall glass',
            'PIX005' => 'Pixmosaic crystall glass',
            'PIX004' => 'Pixmosaic crystall glass',
            'PIX003' => 'Pixmosaic crystall glass',
            'PIX002' => 'Pixmosaic crystall glass',
            'PIX001' => 'Pixmosaic crystall glass',

            'PIX610' => 'Pixmosaic keramika sot',
            'PIX623' => 'Pixmosaic keramika sot',
            'PIX622' => 'Pixmosaic keramika sot',

            'PIX625' => 'Pixmosaic keramika 2',
            'PIX624' => 'Pixmosaic keramika 2',

            'PIX307' => 'Pixmosaic onyx',
            'PIX306' => 'Pixmosaic onyx',
            'PIX305' => 'Pixmosaic onyx',
            'PIX210' => 'Pixmosaic onyx',
            'PIX211' => 'Pixmosaic onyx',
            'PIX207' => 'Pixmosaic onyx',
            'PIX206' => 'Pixmosaic onyx',
            'PIX204' => 'Pixmosaic onyx',
            'PIX203' => 'Pixmosaic onyx',
            'PIX201' => 'Pixmosaic onyx',
            'PIX200' => 'Pixmosaic onyx',

            'PIX259' => 'Pixmosaic travertin',
            'PIX258' => 'Pixmosaic travertin',

            'PIX302' => 'Pixmosaic slanec',
            'PIX301' => 'Pixmosaic slanec',
            'PIX300' => 'Pixmosaic slanec',
            'PIX299' => 'Pixmosaic slanec',
            'PIX298' => 'Pixmosaic slanec',
            'PIX297' => 'Pixmosaic slanec',

            'PIX290' => 'Pixmosaic mramor 1',
            'PIX288' => 'Pixmosaic mramor 1',
            'PIX289' => 'Pixmosaic mramor 1',

            'PIX281' => 'Pixmosaic mramor 2',
            'PIX282' => 'Pixmosaic mramor 2',
            'PIX283' => 'Pixmosaic mramor 2',

            'PIX284' => 'Pixmosaic mramor 3',
            'PIX285' => 'Pixmosaic mramor 3',

            'PIX291' => 'Pixmosaic mramor 4',
            'PIX292' => 'Pixmosaic mramor 4',

            'PIX209' => 'Pixmosaic mramor 5',
            'PIX212' => 'Pixmosaic mramor 5',

            'PIX262' => 'Pixmosaic mramor 6',
            'PIX261' => 'Pixmosaic mramor 6',
            'PIX263' => 'Pixmosaic mramor 6',
            'PIX260' => 'Pixmosaic mramor 6',

            'PIX280' => 'Pixmosaic mramor 7',
            'PIX279' => 'Pixmosaic mramor 7',

            'PIX277' => 'Pixmosaic mramor 8',
            'PIX272' => 'Pixmosaic mramor 8',
            'PIX271' => 'Pixmosaic mramor 8',
            'PIX269' => 'Pixmosaic mramor 8',
            'PIX268' => 'Pixmosaic mramor 8',
            'PIX270' => 'Pixmosaic mramor 8',

            'PIX278' => 'Pixmosaic mramor 9',
            'PIX273' => 'Pixmosaic mramor 9',
            'PIX274' => 'Pixmosaic mramor 9',
            'PIX276' => 'Pixmosaic mramor 9',
            'PIX275' => 'Pixmosaic mramor 9',

            'PIX230' => 'Pixmosaic nova',
            'PIX229' => 'Pixmosaic nova',
            'PIX226' => 'Pixmosaic nova',
            'PIX227' => 'Pixmosaic nova',
            'PIX228' => 'Pixmosaic nova',

            'PIX231' => 'Pixmosaic cream marfil',
            'PIX232' => 'Pixmosaic cream marfil',
            'PIX233' => 'Pixmosaic cream marfil',
            'PIX234' => 'Pixmosaic cream marfil',
            'PIX235' => 'Pixmosaic cream marfil',

            'PIX224' => 'Pixmosaic ligth emperador',
            'PIX225' => 'Pixmosaic ligth emperador',
            'PIX223' => 'Pixmosaic ligth emperador',
            'PIX222' => 'Pixmosaic ligth emperador',
            'PIX221' => 'Pixmosaic ligth emperador',
            'PIX802' => 'Pixmosaic ligth emperador',
            'PIX350' => 'Pixmosaic ligth emperador',

            'PIX220' => 'Pixmosaic dark emperador',
            'PIX219' => 'Pixmosaic dark emperador',
            'PIX303' => 'Pixmosaic dark emperador',
            'PIX217' => 'Pixmosaic dark emperador',
            'PIX218' => 'Pixmosaic dark emperador',
            'PIX304' => 'Pixmosaic dark emperador',

            'PIX294' => 'Pixmosaic thassos',
            'PIX295' => 'Pixmosaic thassos',
            'PIX296' => 'Pixmosaic thassos',

            'PIX241' => 'Pixmosaic bianco carrara',
            'PIX242' => 'Pixmosaic bianco carrara',
            'PIX238' => 'Pixmosaic bianco carrara',
            'PIX239' => 'Pixmosaic bianco carrara',
            'PIX240' => 'Pixmosaic bianco carrara',

            'PIX244' => 'Pixmosaic nero marquna',
            'PIX245' => 'Pixmosaic nero marquna',
            'PIX246' => 'Pixmosaic nero marquna',
            'PIX247' => 'Pixmosaic nero marquna',
            'PIX248' => 'Pixmosaic nero marquna',
            'PIX249' => 'Pixmosaic nero marquna',

            'PIX250' => 'Pixmosaic black majesty',
            'PIX251' => 'Pixmosaic black majesty',
            'PIX252' => 'Pixmosaic black majesty',

            'PIX214' => 'Pixmosaic dondong',
            'PIX213' => 'Pixmosaic dondong',

            'PIX256' => 'Pixmosaic white wooden',
            'PIX255' => 'Pixmosaic white wooden',
            'PIX254' => 'Pixmosaic white wooden',
            'PIX253' => 'Pixmosaic white wooden',

            'PIX336' => 'Pixmosaic ice grey',
            'PIX334' => 'Pixmosaic ice grey',
            'PIX333' => 'Pixmosaic ice grey',
            'PIX338' => 'Pixmosaic ice grey',
            'PIX337' => 'Pixmosaic ice grey',
            'PIX335' => 'Pixmosaic ice grey',

            'PIX332' => 'Pixmosaic tundra grey',
            'PIX330' => 'Pixmosaic tundra grey',
            'PIX329' => 'Pixmosaic tundra grey',
            'PIX328' => 'Pixmosaic tundra grey',

            'PIX326' => 'Pixmosaic cappuchino',
            'PIX325' => 'Pixmosaic cappuchino',
            'PIX324' => 'Pixmosaic cappuchino',
            'PIX323' => 'Pixmosaic cappuchino',
            'PIX322' => 'Pixmosaic cappuchino',
            'PIX321' => 'Pixmosaic cappuchino',

            'PIX319' => 'Pixmosaic mramor 10',
            'PIX318' => 'Pixmosaic mramor 10',
            'PIX317' => 'Pixmosaic mramor 10',
            'PIX316' => 'Pixmosaic mramor 10',

            'PIX315' => 'Pixmosaic jet green',
            'PIX314' => 'Pixmosaic jet green',
            'PIX313' => 'Pixmosaic jet green',
            'PIX312' => 'Pixmosaic jet green',
            'PIX311' => 'Pixmosaic jet green',

            'PIX308/6' => 'Pixmosaic spider green',
            'PIX308'   => 'Pixmosaic spider green',
        ];

        if (array_key_exists($vendor_code, $multies)) {
            return $multies[$vendor_code];
        } else {
            return false;
        }
    }
}
