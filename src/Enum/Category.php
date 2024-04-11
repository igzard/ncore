<?php

namespace Igzard\Ncore\Enum;

enum Category
{
    case FILM_SD_HUN;

    public function value(): string
    {
        return match($this)
        {
            self::FILM_SD_HUN => 'Film (HUN SD)',
        };
    }

    public static function make(string $value): self
    {
        return match($value)
        {
            'Film (HUN SD)' => self::FILM_SD_HUN,
        };
    }
}
