<?php

namespace NgatNgay\Helper;

class Arrays
{
    public static function multipleUploadToSimple(string $filesName): array
    {
        $files = [];

        foreach ($_FILES[$filesName] as $k => $l) {
            foreach ($l as $i => $v) {
                if (!array_key_exists($i, $files)) {
                    $files[$i] = [];
                }

                $files[$i][$k] = $v;
            }
        }

        return $files;
    }
}