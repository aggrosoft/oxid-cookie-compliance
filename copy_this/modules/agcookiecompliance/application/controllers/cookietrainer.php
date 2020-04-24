<?php

class cookietrainer extends oxUBase {

    public function track () {
        $config = $this->getConfig();
        if($config->getShopConfVar('blTrainingMode', null, 'module:agcookiecompliance')) {

            $jsCookies = $config->getRequestParameter('cookies');
            $serverCookies = $_COOKIE;

            $client = Aggrosoft\CookieDatabase\Api\Client('de');
            $infos = $client->getCookieInfos(['oxid' => array_keys($serverCookies)]);

            echo json_encode($infos);
            exit();
        }
    }

}