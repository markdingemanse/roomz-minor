<?php namespace App\tests\testSteef;

class SharedHeaderSet extends HeaderSet
{
public function __construct(){
        $this->addHeader('Accept','Application/json')
        ->addHeader('Access-Control-Allow-Origin','https://google.nl')
        ->addHeader('Access-Control-Allow-Credentials','true')
        ->addHeader('Access-Control-Allow-Headers','Origin, X-Requested-With, Content-Type, Accept, Authorization');
    }

}