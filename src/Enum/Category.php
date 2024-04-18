<?php

namespace Igzard\Ncore\Enum;

enum Category
{
    case FILM_HUN_SD;
    case FILM_HUN_DVD9;
    case SOROZAT_ENG_DVD;
    case SOROZAT_END_XVID;
    case FILM_HUN_DVD;
    case FILM_ENG_HD;
    case FILM_HUN_HD;
    case FILM_ENG_DVD9;
    case SOROZAT_ENG_HD;
    case FILM_ENG_SD;
    case SOROZAT_ENG_SD;
    case SOROZAT_HUN_SD;

    public function value(): string
    {
        return match($this)
        {
            self::FILM_HUN_SD => 'Film (HUN SD)',
            self::FILM_HUN_DVD9 => 'Film (HUN DVD9)',
            self::SOROZAT_ENG_DVD => 'Sorozat (ENG DVD)',
            self::SOROZAT_END_XVID => 'Sorozat (ENG XviD)',
            self::FILM_HUN_DVD => 'Film (HUN DVD)',
            self::FILM_ENG_HD => 'Film (ENG HD)',
            self::FILM_HUN_HD => 'Film (HUN HD)',
            self::FILM_ENG_DVD9 => 'Film (ENG DVD9)',
            self::SOROZAT_ENG_HD => 'Sorozat (ENG HD)',
            self::FILM_ENG_SD => 'Film (ENG SD)',
            self::SOROZAT_ENG_SD => 'Sorozat (ENG SD)',
            self::SOROZAT_HUN_SD => 'Sorozat (HUN SD)',
        };
    }

    public static function make(string $value): self
    {
        return match($value)
        {
            'Film (HUN SD)' => self::FILM_HUN_SD,
            'Film (HUN DVD9)' => self::FILM_HUN_DVD9,
            'Sorozat (ENG DVD)' => self::SOROZAT_ENG_DVD,
            'Sorozat (ENG XviD)' => self::SOROZAT_END_XVID,
            'Film (HUN DVD)' => self::FILM_HUN_DVD,
            'Film (ENG HD)' => self::FILM_ENG_HD,
            'Film (HUN HD)' => self::FILM_HUN_HD,
            'Film (ENG DVD9)' => self::FILM_ENG_DVD9,
            'Sorozat (ENG HD)' => self::SOROZAT_ENG_HD,
            'Film (ENG SD)' => self::FILM_ENG_SD,
            'Sorozat (ENG SD)' => self::SOROZAT_ENG_SD,
            'Sorozat (HUN SD)' => self::SOROZAT_HUN_SD,
        };
    }
}
