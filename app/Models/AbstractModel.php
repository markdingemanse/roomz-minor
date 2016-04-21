<?php namespace App\Models;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Log\InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;

class AbstractModel
{
    /**
     * @var Client
     */
    protected $client;
    /**
     * @var mixed
     */
    protected $url;
    /**
     * @var array
     */
    protected $headers = [];
    /**
     * @var array
     */
    protected $defaultHeader = [];
    /**
     * @var Request
     */
    protected $request;

    /**
     * AbstractModel constructor.
     */

    //TODO: URL edit to link API -> MIRROR_API_URL is now www.google.nl
    public function __construct( )
    {
        $this->url = env('MIRROR_API_URL');
        $this->client = new Client();
    }

    /**
     * @param null|string $url
     * @param array|null $config
     * @return mixed|null
     */
    protected function buildUri($url = null, array $config = [])
    {
        if (is_null($url))
        {
            return $this->url;
        }
        return $url;
    }

    //
    /**
     * @param array $headers
     * @return array
     */
    protected function setHeaders(array $headers =[])
    {
        if (is_array($headers))
        {
            return $headers;
        }
        else
        {
            throw new InvalidArgumentException('Input is not array.');
        }

    }

    /**
     * @param $typeOfRequest = GET,POST,PUT en DELETE
     */
    public function setDefaultHeader($typeOfRequest)
    {
        $this->defaultHeader = array(
            'headers' => array(
                'Accept' => 'Application/json',
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Credentials' => 'true',
                'Access-Control-Allow-Headers' => 'Origin, X-Requested-With, Content-Type, Accept, Authorization',
                'Allow-Methods' => ''
            ),
        );

        if((is_string($typeOfRequest)) && (!is_null($typeOfRequest)))
        {
            $this->defaultHeader["headers"]['Allow-Methods'] = $typeOfRequest;
        }

        else
        {
            throw new InvalidArgumentException('Input is not a string.');
        }

    }

    /**
     * @param $requestType
     * @param $url = url (www.google.nl -> edit to url Call API )
     * @param $headers = headers request
     * @param array $body = Body of request
     */
    public function setRequest($requestType,$url, $headers, $body = [] )
    {
        if((is_null($requestType)) || (is_null($url)) || (is_null($headers)))
        {
            throw new InvalidArgumentException('Input can not be empty.');
        }
        elseif((!is_string($requestType)) || (!is_string($url)) || (!is_array($headers)))
        {
            throw new InvalidArgumentException('Incorrect parameter value.');
        }
        else
        {
            if(empty($body))
            {
                $this->request = new Request($requestType, $url, $headers);
            }
            else
            {
                $this->request = new Request(questType, $url, $headers, $body);
            }
        }
    }

    /**
     * @param Request $requestObject
     * @return mixed|ResponseInterface
     */
    protected function sendRequest(Request $requestObject)
    {
        $response = $this->getClient()->send($requestObject);

        return $response;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @return array
     */
    public function getDefaultHeaders()
    {
        return $this->defaultHeader;
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @param ResponseInterface $response
     * @param $requestType
     * @return \Illuminate\Http\JsonResponse|string
     */
    protected function buildResponse(ResponseInterface $response, $requestType)
    {
        if($requestType !== 'GET')
        {
            $responseCodes[] = array(
                //TODO: Add more custum response coedes
                '200'=> 'Het verzoek is succesvol behandeld',
                '404'=> 'De gevraagde bron kan niet worden gevonden',
                '401'=> 'Authenticatie is nodig om de gevraagde reactie te krijgen'
            );

            foreach($responseCodes as $key => $value)
            {
                if($key === $response->getStatusCode())
                {
                    return response()->json([$key=> $value]);
                }
                else
                {
                    return response()->json ($response->getStatusCode());
                }
            }

        }
        else
        {
            return $response->getBody()->getContents();
        }
    }

}