<?php

namespace App\Libraries;

use GuzzleHttp\Client;

class API
{

    private $client;
    private $base_uri = 'https://soporte.dvs360.com/api/v1/';
    private $key = '0QdtI9wmUAf3AtpIE97R/';
    private $timeout = 2.0;

    public function __construct()
    {
        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $this->base_uri . $this->key,
            // You can set any number of default request options.
            'timeout' => $this->timeout,
        ]);
    }

    /**
     * Obtener Recursos por GET
     *
     * @param [type] $resource
     * @return void
     */
    public function get($resource = null)
    {

        $response = $this->client->request('GET', $resource);
        $respuestaFinal = json_decode($response->getBody()->getContents());

        return $respuestaFinal;
    }

}
