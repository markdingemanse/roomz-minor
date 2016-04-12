<?php namespace App\tests\testSteef;

class HeaderSetFactory
{
    public static $__instance;

    public function __construct(){
    $getSet = new SharedHeaderSet();
    $getSet->addHeader('Allow-Methods','GET');
    $this->sets['get'] = $getSet;
    }

    public static function getInstance()
    {
        return (instance == null) ? $__instance = new HeaderSetFactory : $__instance;
    }

    public function getHeaderSet($name)
    {
        return $this->sets[$name];
    }

}

//$this->buildURI(HeaderSetFactory->getHeaderSet('post')->getHeaders());
