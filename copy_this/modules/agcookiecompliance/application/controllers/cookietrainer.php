<?php

class cookietrainer extends oxUBase {

    public function track () {
        $config = $this->getConfig();
        if($config->getShopConfVar('blTrainingMode', null, 'module:agcookiecompliance')) {

            $cookies = $config->getRequestParameter('cookies');

        }
    }

}