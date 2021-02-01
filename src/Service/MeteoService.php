<?php


namespace App\Service;


use Symfony\Contracts\HttpClient\HttpClientInterface;

class MeteoService
{

    private string $key;
    private HttpClientInterface  $client;
    private string $url;
    public function __construct( string $key ,HttpClientInterface $httpClient,string $url)
    {     $this->url=$url;
         $this->key=$key;
         $this->client=$httpClient;
    }
    public function ApiCall($ville)
    {


        $reponse = $this->client->request("GET", "{$this->url}={$ville}&units=etric&lang=fr&appid={$this->key}");
        return  $reponse->getContent();


    }
}
