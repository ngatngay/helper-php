<?php

use Doctum\Doctum;
use Symfony\Component\Finder\Finder;

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->in(__DIR__ . '/src');

return new Doctum($iterator, [
    'build_dir' => __DIR__ . '/docs',
    'cache_dir' => __DIR__ . '/docs-cache'
]);

