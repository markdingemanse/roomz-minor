<?php namespace App\Models\src\Providers\Ftp;

use App\Models\AbstractModel;
use Psr\Log\InvalidArgumentException;

class FtpModel extends AbstractModel
{
    /**
     * FtpModel constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $data
     * @return \Illuminate\Http\JsonResponse|string
     * Store function
     * Url/save
     * HTTP Method: POST = $requestType
     */
    public function save($data)
    {
        if ((!is_array($data)) || (empty($data)))
        {
            throw new InvalidArgumentException('Input is not an array.');
        }
        $requestType = 'POST';
        $url = $this->url . '/save';
        $this->setDefaultHeader($requestType);
        $headers = $this->setHeaders($this->getDefaultHeaders());

        $this->setRequest($requestType, $this->buildUri($url), $headers, $data);
        $response = $this->sendRequest($this->getRequest());

        $statusMessage = $this->buildResponse($response, $requestType);

        return $statusMessage;
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse|string
     * (Show)Find function by id
     * Url/find/id
     * HTTP Method: GET = $requestType
     */
    public function find($id)
    {
        if ((!is_int($id)) || (empty($id)))
        {
            throw new InvalidArgumentException('Input is not an id.');
        }
        $requestType = 'GET';
        $url = $this->url . '/find/' . $id;

        $this->setDefaultHeader($requestType);
        $headers = $this->setHeaders($this->getDefaultHeaders());

        $this->setRequest($requestType, $this->buildUri($url), $headers, $id);
        $response = $this->sendRequest($this->getRequest());

        $statusMessage = $this->buildResponse($response, $requestType);

        return $statusMessage;
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse|string
     * Update function
     * Url/update/id
     * * HTTP Method: PUT = $requestType
     */
    public function update($id)
    {
        if ((!is_int($id)) || (empty($id)))
        {
            throw new InvalidArgumentException('Input is not an id.');
        }
        $requestType = 'PUT';
        $url = $this->url . '/update/' . $id;

        $this->setDefaultHeader($requestType);
        $headers = $this->setHeaders($this->getDefaultHeaders());

        $this->setRequest($requestType, $this->buildUri($url), $headers, $id);
        $response = $this->sendRequest($this->getRequest());

        $statusMessage = $this->buildResponse($response, $requestType);

        return $statusMessage;
    }

    /**
     * @param string $id Id of file to delete.
     * @return \Illuminate\Http\JsonResponse|string
     * Delete functie
     * Url: www.google.nl/delete/id
     * HTTP Method: DELETE = $requestType
     */
    public function delete($id)
    {
        $id = intval($id);
        if ((!is_int($id)) || (empty($id)))
        {
            throw new InvalidArgumentException('Input is not an id.');
        }
        $requestType = 'DELETE';
        $url = $this->url . '/delete/' . $id;
        $this->setDefaultHeader($requestType);
        $headers = $this->setHeaders($this->getDefaultHeaders());

        $this->setRequest($requestType, $this->buildUri($url), $headers, $id);
        $response = $this->sendRequest($this->getRequest());

        $statusMessage = $this->buildResponse($response, $requestType);


        return $statusMessage;

    }
}
