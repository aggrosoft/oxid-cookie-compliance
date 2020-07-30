<?php

namespace Aggrosoft\CookieDatabase\Api;

use Buzz\Browser;
use Buzz\Client\Curl;
use Nyholm\Psr7\Factory\Psr17Factory;

class Client
{
    protected const API_URL = 'https://cookiedatabase.org/wp-json/cookiedatabase/v1/';
    protected $language;
    protected $browser;

    public function __construct($language = 'en')
    {
        $this->language = $language;

        $client = new Curl(new Psr17Factory());
        $this->browser = new Browser($client, new Psr17Factory());
    }

    public function getServiceTypes()
    {
        return $this->getData('servicetypes');
    }

    public function getCookiePurposes()
    {
        return $this->getData('cookiepurposes');
    }

    public function getServices($services)
    {
        return $this->postData('services', json_encode([$this->language => $services]));
    }

    public function getCookieInfos($cookies)
    {
        return $this->postData('cookies', json_encode([$this->language => $cookies]));
    }

    public function getWebsiteCookies($url)
    {
        $browser = $this->getBrowser();
        $result = $browser->get($url);
        $cookies = $result->getHeader('Set-Cookie');
        return $cookies;
    }

    protected function getData ($method) {
        $browser = $this->getBrowser();
        $result = $browser->get($this->getMethodUrl($method));

        if (!$result || intval($result->getStatusCode()) !== 200 || !json_decode($result->getBody()->__toString())){
            throw new \Exception('Api server did not return valid json');
        }

        $parsed = json_decode($result->getBody()->__toString());

        if ($parsed && isset($parsed->status) && $parsed->status === 200){
            return (array)$parsed->data;
        }else{
            throw new \DomainException('Api call failed with status ' . $parsed->status, $parsed->status);
        }
    }

    protected function postData ($method, $data) {
        $headers = ['Content-Type' => 'application/json','Content-Length' => strlen($data)];
        $browser = $this->getBrowser();
        $result = $browser->post($this->getMethodUrl($method, false), $headers, $data);

        if (!$result || intval($result->getStatusCode()) !== 200 || !json_decode($result->getBody()->__toString())){
            throw new \Exception('Api server did not return valid json');
        }

        $parsed = json_decode($result->getBody()->__toString());

        if ($parsed && isset($parsed->status) && $parsed->status === 200){
            return (array)$parsed->data;
        }else{
            throw new \DomainException('Api call failed with status ' . $parsed->status, $parsed->status);
        }
    }

    protected function getMethodUrl($method, $addlang = true)
    {
        return self::API_URL . $method . ($addlang ? '/' . $this->getLanguage() : '');
    }

    protected function getBrowser()
    {
        return $this->browser;
    }

    protected function getLanguage()
    {
        return $this->language;
    }
}