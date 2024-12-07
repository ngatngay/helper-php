<?php

namespace NgatNgay\Helper;

class Request
{
    public array $get;
    public array $post;
    public array $header;
    public array $cookie;
    public array $server;

    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->cookie = $_COOKIE;
        $this->header = $this->initHeader();
        $this->server = $_SERVER;
    }

    private function initHeader()
    {
        $headers = [];
        foreach ($_SERVER as $name => $value) {
            if (substr($name, 0, 5) == 'HTTP_') {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }
        return $headers;
    }
}
