<?php

class cookietrainer extends oxUBase {

    public function track () {
        $config = $this->getConfig();
        if($config->getShopConfVar('blTrainingMode', null, 'module:agcookiecompliance')) {

            $parser = new CookieParser();
            $jsCookies = $parser->parseCookie($config->getRequestParameter('cookies'));
            $serverCookies = $_COOKIE;

            $client = new Aggrosoft\CookieDatabase\Api\Client('en');
            $infos = $client->getCookieInfos(['oxid' => array_keys($serverCookies)]);

            echo json_encode($infos);
            exit();
        }
    }

}