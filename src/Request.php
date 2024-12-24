<?php

namespace NgatNgay\Helper;

class Request
{
    public array $get;
    public array $post;
    public array $header;
    public array $cookie;
    public array $server;
    public array $request;

    public function __construct()
    {
        $this->server = array_change_key_case($_SERVER);
        $this->header = $this->initHeader();

        $this->get = $_GET;
        $this->post = $_POST;
        $this->cookie = $_COOKIE;
        $this->request = $_REQUEST;
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
    
    public function getMethod() {
        return strtolower($this->server['request_method']);
    }
    
    public function isMethod($value) {
        return strtolower($value) === $this->getMethod();
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
    
    public function getUrl($mode = 'full') {
        $uri = $mode === 'no_query' ? strtok($this->server['request_uri'], '?') : $this->server['request_uri'];
        return $this->getBaseUrl() . $uri;
    }

    // Hàm get cho thuộc tính get
    public function get($key, $default = null) {
        return $this->get[$key] ?? $default;
    }

    // Hàm get cho thuộc tính post
    public function post($key, $default = null) {
        return $this->post[$key] ?? $default;
    }

    // Hàm get cho thuộc tính header
    public function header($key, $default = null) {
        return $this->header[$key] ?? $default;
    }

    // Hàm get cho thuộc tính cookie
    public function cookie($key, $default = null) {
        return $this->cookie[$key] ?? $default;
    }

    // Hàm get cho thuộc tính server
    public function server($key, $default = null) {
        return $this->server[$key] ?? $default;
    }

    // Hàm get cho thuộc tính request
    public function request($key, $default = null) {
        return $this->request[$key] ?? $default;
    }
}
