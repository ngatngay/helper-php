<?php

namespace NgatNgay\Helper;

class File
{
    /**
     * @param $fileSize string
     * @return string
     */
    public static function readableSize($fileSize)
    {
        $size = floatval($fileSize);

        if ($size < 1024) {
            $s = $size . ' B';
        } elseif ($size < 1048576) {
            $s = round($size / 1024, 2) . ' KB';
        } elseif ($size < 1073741824) {
            $s = round($size / 1048576, 2) . ' MB';
        } elseif ($size < 1099511627776) {
            $s = round($size / 1073741824, 2) . ' GB';
        } elseif ($size < 1125899906842624) {
            $s = round($size / 1099511627776, 2) . ' TB';
        } elseif ($size < 1152921504606846976) {
            $s = round($size / 1125899906842624, 2) . ' PB';
        } elseif ($size < 1180591620717411303424) {
            $s = round($size / 1152921504606846976, 2) . ' EB';
        } elseif ($size < 1208925819614629174706176) {
            $s = round($size / 1180591620717411303424, 2) . ' ZB';
        } else {
            $s = round($size / 1208925819614629174706176, 2) . ' YB';
        }

        return $s;
    }
}
