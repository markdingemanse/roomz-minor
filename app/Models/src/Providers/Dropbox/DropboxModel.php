<?php namespace App\Models\src\Providers\Dropbox;

use App\Models\AbstractModel;
use Psr\Log\InvalidArgumentException;

class DropboxModel extends  AbstractModel
{

    protected function __construct()
    {
        parent::__construct();
    }

    public function query()
    {
        $url = $this->url . '/index';

        $this->setDefaultHeader('GET');
        $this->setHeaders($this->getDefaultHeaders());

        $request = $this->getClient()->get($this->buildUri($url));

        // ophalen data met get getBody()->getContents()
        return json_decode($request->getBody()->getContents());
    }

    //Store function
    public function save($data)
    {
        if ((!is_array($data)) || (empty($data)))
        {
            throw new InvalidArgumentException('Input is not an array.');
        }
        $url = $this->url . '/save';
        $this->setDefaultHeader('POST');
        $this->setHeaders($this->getDefaultHeaders());

        $request = $this->getClient()->post($this->buildUri($url), $data);

        //is het goed of niet getStatusCode()
        return json_decode($request->getStatusCode());
    }

    //(Show)Find function  by id
    public function find($id)
    {
        if ((!is_int($id)) || (empty($id)))
        {
            throw new InvalidArgumentException('Input is not an id.');
        }
        $url = $this->url . '/find/' . $id;

        $this->setDefaultHeader('GET');
        $this->setHeaders($this->getDefaultHeaders());

        $request = $this->getClient()->get($this->buildUri($url));

        // ophalen data met get getBody()->getContents()
        return json_decode($request->getBody()->getContents());
    }

    //Update function
    public function update($id)
    {
        if ((!is_int($id)) || (empty($id)))
        {
            throw new InvalidArgumentException('Input is not an id.');
        }
        $url = $this->url . '/update/' . $id;

        $this->setDefaultHeader('PUT');
        $this->setHeaders($this->getDefaultHeaders());

        $request = $this->getClient()->put($this->buildUri($url));

        return json_decode($request->getStatusCode());
    }

    //Delete function
    public function delete($id)
    {
        if ((!is_int($id)) || (empty($id)))
        {
            throw new InvalidArgumentException('Input is not an id.');
        }
        $url = $this->url . '/delete/' . $id;

        $this->setDefaultHeader('DELETE');
        $this->setHeaders($this->getDefaultHeaders());

        $request = $this->getClient()->delete($this->buildUri($url));

        return json_decode($request->getStatusCode());
    }

}