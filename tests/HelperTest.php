<?php

use NgatNgay\Helper\Arrays;
use NgatNgay\Helper\FileSystem;
use NgatNgay\Helper\Strings;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

test('arrays test', function () {
    $arrayHelper = new Arrays();

    $arr = [];
    for ($i = 0; $i < 95; $i++) {
        $arr[] = $i;
    }

    /** @var TestCase $this */
    $this->assertEquals([90, 91, 92, 93, 94], $arrayHelper->getFromPage($arr, 10));
});

test('strings test', function () {
    $stringsHelper = new Strings();

    /** @var TestCase $this */
    $this->assertSame('Đụ má mày...', $stringsHelper->wordCut('Đụ má mày chửi thề con cặc', 3));
    $this->assertSame('Đụ má mày', $stringsHelper->wordCut('Đụ má mày', 3));
    $this->assertSame('Xin chao', $stringsHelper->vn2en('Xin chào'));
    $this->assertSame('Chenh lEch Ap suat', $stringsHelper->vn2en('Chênh lỆch Áp suất'));

    Assert::assertEquals(true, $stringsHelper->empty(''));
    Assert::assertEquals(false, $stringsHelper->empty('1'));
});

test('file test', function () {
    $fileSystemHelper = new FileSystem();

    $this->assertSame('213 B', $fileSystemHelper->readableSize(213));
    $this->assertSame('1 KB', $fileSystemHelper->readableSize(1024));
});
