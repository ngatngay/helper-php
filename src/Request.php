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
        $this->server = array_change_key_case($_SERVER);
        $this->header = $this->initHeader();

        $this->get = $_GET;
        $this->post = $_POST;
        $this->cookie = $_COOKIE;
    }

    private function initHeader()
    {
        $headers = [];

        foreach ($this->server as $name => $value) {

            if (substr($name, 0, 5) == 'http_') {
                $headers[str_replace('_', '-', substr($name, 5))] = $value;
            }
        }

        return $headers;
    }
    
    public function isCLI() {
        return php_sapi_name() === 'cli';
    }
    public function isCLIServer() {
        return php_sapi_name() === 'cli-server';
    }
    
    public function getIp() {
        $ip = '127.0.0.1';

        return $ip;
    }
    
    public function getUserAgent() {
        return $this->header['user-agent'] ?? '';
    }
    
    public function getBaseUrl()
    {
        return ($this->server['request_scheme'] ?? 'http')
            . '://'
            . ($this->server['server_name'] ?? 'localhost');
    }
}
