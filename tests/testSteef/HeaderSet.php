<?php namespace App\tests\testSteef;


class HeaderSet
{

    protected $headers = [];

    public function addHeader($key,$value){
        $this->headers[$key] = $value;
    }

    protected function getHeaders(){
        return $this->headers;
    }
}
