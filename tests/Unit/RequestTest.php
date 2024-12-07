<?php

use NgatNgay\Helper\Request;

test('test', function () {
    $r = new Request();
    
    dump($r->server);
    
    expect(true)->toBeTrue();
});
