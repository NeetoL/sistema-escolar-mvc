<?php

namespace App\http;

class Response{
    private $httpCode = 200;
    private $headers = [];
    private $contentType = "text/html";
    private $content;
    private $data;
    public function __construct($httpCode,$content,$contentType = 'text/html'){
        $this->httpCode = $httpCode;
        $this->content = $content;
        //$this->contentType = $contentType;
        $this->setContentType($contentType);
    }

    public function setContentType($contentType){
        $this->contentType = $contentType;
        $this->addHeaders('Content-Type', $contentType);
    }

    public function addHeaders($keys,$value){
        $this->headers[$keys] = $value;
    }

    private function sendHeaders(){
        http_response_code($this->httpCode);
        foreach($this->headers as $key => $value){
            header($key.': '.$value);
        }
    }

    public function sendResponse(){
        switch ($this->contentType) {
            case 'text/html':
                echo $this->content;
                break;
        }
    }
}