<?php

use NgatNgay\Helper\Arrays;
use NgatNgay\Helper\Strings;
use PHPUnit\Framework\TestCase;

test('array test', function () {
    $arr = [];
    for ($i = 0; $i < 95; $i++) {
        $arr[] = $i;
    }

    /** @var TestCase $this */
    $this->assertEquals([90, 91, 92, 93, 94], Arrays::getFromPage($arr, 10));
});

test('string test', function () {
    /** @var TestCase $this */
    $this->assertSame('Đụ má mày...', Strings::wordCut('Đụ má mày chửi thề con cặc', 3));
    $this->assertSame('Đụ má mày', Strings::wordCut('Đụ má mày', 3));
    $this->assertSame('Xin chao', Strings::vn2en('Xin chào'));
    $this->assertSame('Chenh lEch Ap suat', Strings::vn2en('Chênh lỆch Áp suất'));
});
