<?php

namespace App\Traits;

trait Transliteratable
{
    public static function bootTransliteratable()
    {
        static::creating(function ($model) {
            $model->name_en = self::transliterate($model->name);
        });

        static::updating(function ($model) {
            $model->name_en = self::transliterate($model->name);
        });
    }

    public static function transliterate($text)
    {
        $transliterationTable = [
            'а' => 'a',   'б' => 'b',   'в' => 'v',   'г' => 'g',   'д' => 'd',
            'е' => 'e',   'ё' => 'e',   'ж' => 'zh',  'з' => 'z',   'и' => 'i',
            'й' => 'y',   'к' => 'k',   'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',   'с' => 's',   'т' => 't',
            'у' => 'u',   'ф' => 'f',   'х' => 'kh',  'ц' => 'ts',  'ч' => 'ch',
            'ш' => 'sh',  'щ' => 'shch','ы' => 'y',   'э' => 'e',   'ю' => 'yu',
            'я' => 'ya',  'ь' => '',    'ъ' => '',
        ];

        $text = mb_strtolower($text, 'UTF-8');

        $transliteratedText = strtr($text, $transliterationTable);

        $transliteratedText = str_replace(' ', '-', $transliteratedText);

        return $transliteratedText;
    }
}
