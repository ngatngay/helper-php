<?php

namespace NgatNgay\Helper;

class Strings
{
    public static function wordCut(string $string, int $words = 35, string $end = '...'): string
    {
        preg_match('/^\s*+(?:\S++\s*+){1,'.$words.'}/u', $string, $matches);

        if (! isset($matches[0]) || static::length($string) === static::length($matches[0])) {
            return $string;
        }

        return rtrim($matches[0]).$end;
    }

    public static function nl2br(string $str): string
    {
        return str_replace("\n", '<br />', $str);
    }

    public static function br2nl(string $str): string
    {
        return preg_replace('#<br\s*/?>#i', "\n", $str);
    }

    public static function length(string $str): int
    {
        return mb_strlen($str);
    }
}
