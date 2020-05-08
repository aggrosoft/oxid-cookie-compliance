<?php

class cookietrainer extends oxUBase {

    const PURPOSE_MAP = [
        61 => "ESSENTIAL",
        62 => "ANALYTICS",
        63 => "ANALYTICS",
        64 => "MARKETING",
        1257 => "PERSONALIZATION"
    ];

    const FRONTEND_COOKIES = ['sid', 'sid_key', 'language', 'cc-set', 'cc-categories'];
    const ADMIN_COOKIES = ['admin_sid', 'oxidadminprofile', 'oxidadminlanguage', 'oxidadminhistory'];

    public function track () {
        $config = $this->getConfig();
        if($config->getShopConfVar('blTrainingMode', null, 'module:agcookiecompliance')) {

            $parser = new CookieParser();
            $jsCookies = $parser->parseCookie($config->getRequestParameter('cookies', true));
            $cookies = array_merge($_COOKIE, $jsCookies['cookies']);

            $apiCookies = array_diff(array_keys($cookies), self::ADMIN_COOKIES, self::FRONTEND_COOKIES);

            if (count($apiCookies)){
                $client = new Aggrosoft\CookieDatabase\Api\Client('en');
                $infos = $client->getCookieInfos(['oxid' => $apiCookies]);

                // Weird format from api
                $cookieInfos = $infos['en'];
            }

            $createdCookies = [];

            foreach ($cookies as $cookie => $value) {
                if (!$this->isAdminCookie($cookie)) {
                    $cc = oxNew('compliancecookie');
                    if (!$cc->loadByCookieName($cookie)){
                        $defaults = $this->getDefaultCookieInfos($cookie);
                        if ($defaults){
                            $aData = $defaults;
                        }elseif ($cookieInfos && isset($cookieInfos->$cookie)){
                            $info = $cookieInfos->$cookie;
                            $aData = [
                                'oxshopid' => $this->getShopId(),
                                'oxcookie' => $cookie,
                                'oxtitle' => $info->name,
                                'oxcategory' => $this->matchPurposeId($info->purposeID),
                                'oxservice' => $info->service,
                                'oxdescription' => $info->cookieFunction,
                                'oxretention' => $info->retention
                            ];
                        }else{
                            $aData = [
                                'oxshopid' => $this->getShopId(),
                                'oxcookie' => $cookie,
                                'oxtitle' => $cookie,
                                'oxcategory' => $this->matchPurposeId(null)
                            ];
                        }

                        array_push($createdCookies, $aData);

                        $cc->assign($aData);
                        $cc->save();
                    }
                }

            }

            header('Content-Type: application/json');
            echo json_encode($createdCookies);
            exit();
        }
    }

    public function remove() {
        $helper = oxNew('cookiehelper');
        $categories = $helper->getCookieComplianceCategories();

        foreach($categories as $category) {
            if (!$helper->isCookieCategoryEnabled($category)){
                $list = oxNew('compliancecookielist');
                $list->loadCategoryCookies($category);

                foreach($list as $cookie){
                    setcookie($cookie->compliancecookies__oxcookie->value, '', time()-3600, '/');
                    setcookie($cookie->compliancecookies__oxcookie->value, '', time()-3600, '/', '.'.$_SERVER['SERVER_NAME']);
                }
            }
        }

        exit();
    }

    protected function matchPurposeId($pid) {
        if ($pid && isset(self::PURPOSE_MAP[$pid])){
            return self::PURPOSE_MAP[$pid];
        }
        return 'UNCATEGORIZED';
    }

    protected function getDefaultCookieInfos($cookie) {
        if (in_array($cookie, self::FRONTEND_COOKIES)) {
            $oLang = \OxidEsales\Eshop\Core\Registry::getLang();
            return [
                'oxshopid' => $this->getShopId(),
                'oxcookie' => $cookie,
                'oxtitle' => $oLang->translateString('COOKIE_COMPLIANCE_COOKIE_TITLE_'.strtoupper($cookie)),
                'oxcategory' => $oLang->translateString('COOKIE_COMPLIANCE_COOKIE_CATEGORY_'.strtoupper($cookie)),
                'oxservice' => $oLang->translateString('COOKIE_COMPLIANCE_COOKIE_SERVICE_'.strtoupper($cookie)),
                'oxdescription' => $oLang->translateString('COOKIE_COMPLIANCE_COOKIE_DESCRIPTION_'.strtoupper($cookie)),
                'oxretention' => $oLang->translateString('COOKIE_COMPLIANCE_COOKIE_RETENTION_'.strtoupper($cookie)),
            ];
        }
    }

    protected function isAdminCookie($cookie) {
        return in_array($cookie, self::ADMIN_COOKIES);
    }

    protected function getShopId(){
        $oConfig = \OxidEsales\Eshop\Core\Registry::getConfig();
        $oShop = $oConfig->getActiveShop();
        return $oShop->getId();
    }

}