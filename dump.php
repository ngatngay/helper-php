<?php

$data = "";

foreach (glob('src/*.php') as $file) {
    $data .= file_get_contents($file) . "\n?>";
}

file_put_contents('helper.php', $data);
