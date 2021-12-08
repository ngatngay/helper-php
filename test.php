<?php

require 'vendor/autoload.php';

$arr = [];
for ($i = 0; $i < 95; $i++) {
    $arr[] = $i;
}


print_r(\NgatNgay\Helper\Arrays::getFromPage($arr, 10));