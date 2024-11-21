<?php

namespace NgatNgay\Helper;

interface IResponse
{
    public function data($data);
    public function status($status);
    public function headers($headers);
    public function json();
    public function send();
}
function response($data = null, $status = 200, $headers = []): IResponse
{
    return new class ($data, $status, $headers) implements IResponse {      
        public function __construct(
        private $data,
        private $status,
        private array $headers = []
        ) {}
        
        public function data($data) {
            $this->data = $data;
            return $this;
}
        public function status($status) {
            $this->status = $status;
            return $this;
}
        public function json() {
            $this->headers += ['Content-Type: application/json'];
            
            if (is_array($this->data)) {
            $this->data = json_encode($this->data);
            }
            return $this;
       }

        public function headers($headers)
        {
            $this->headers = $headers;
            return $this;
        }
        
        public function send() {
            @ob_end_clean();
            
            if (is_array($this->data)) {
                $this->json();
            }
            
            http_response_code($this->status);
            
            $this->headers = array_unique($this->headers);
            foreach ($this->headers as $header) {
                header($header);
            }
                 
            echo $this->data;
        }
    };
}
