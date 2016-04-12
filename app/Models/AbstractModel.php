<?php namespace App\Models;

use GuzzleHttp\Client;
use Psr\Log\InvalidArgumentException;

class AbstractModel
{
    protected $client;
    protected $url;
    protected $headers = [];
    protected $defaultHeader = [];

    protected function __construct()
    {
        $this->url = env('MIRROR_API_URL');
        $this->client = new Client;
    }

    protected function buildUri($url = null, array $config = [])
    {
        if (is_null($url)) {
            return $this->client->buildUri($this->url, $config);
        }
        return $this->client->buildUri($url, $config);
    }

    // CLient private function configureDefaults
    protected function setHeaders(array $headers =[])
    {
        if (is_array($headers)) {
            return $this->client->prepareDefaults($headers);
        }
        else
        {
            throw new InvalidArgumentException('Input is not array.');
        }

    }

    public  function setDefaultHeader($typeOfRequest)
    {
        $this->defaultHeader = array(
            'headers' => array(
                'Accept' => 'Application/json',
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Credentials' => 'true',
                'Access-Control-Allow-Headers' => 'Origin, X-Requested-With, Content-Type, Accept, Authorization',
            ),
        );

        if((is_string($typeOfRequest)) && (!is_null($typeOfRequest)))
        {
            $defaultHeader["headers"]['Allow-Methods'] = $typeOfRequest;
        }

        else
        {
            throw new InvalidArgumentException('Input is not a string.');
        }

    }

    public function getDefaultHeaders()
    {
        return $this->defaultHeader;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setClient($client)
    {
        $this->client = $client;
    }

}