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
}