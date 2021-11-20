<?php

namespace NgatNgay\Helper;

class Strings
{
    public static function wordCut(string $string, int $word = 35): string
    {
        $split      = explode(' ', $string);
        $word_count = count($split);

        // Neu so tu cho phep nho hon thuc te
        if ($word < $word_count) {
            $output = array_slice($split, 0, $word);
            $output = implode(' ', $output);
            $output .= '...';
        } else {
            $output = implode(' ', $split);
        }

        return $output;
    }

    public static function nl2br(string $str): string
    {
        return str_replace("\n", '<br />', $str);
    }

    public static function br2nl(string $str): string
    {
        return preg_replace('#<br\s*/?>#i', "\n", $str);
    }
}