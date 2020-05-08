<?php

class agcookiecompliance_oxviewconfig extends agcookiecompliance_oxviewconfig_parent
{

    public function getCookieComplianceCategories()
    {
        return [
            'ESSENTIAL',
            'PERSONALIZATION',
            'ANALYTICS',
            'MARKETING',
            'UNCATEGORIZED'
        ];
    }

    public function getCookieComplianceModuleSetting($sSetting, $sDefault = '')
    {
        $oConfig = $this->getConfig();
        $sValue = $oConfig->getShopConfVar($sSetting, null, 'module:agcookiecompliance');
        return $sValue ? $sValue : $sDefault;
    }

    public function hasCookieConsented()
    {
        return $_COOKIE['cc-set'] == 1;
    }

    public function isCookieCategoryEnabled($sCategory)
    {

        if ($this->isCookieCategoryMandatory($sCategory)){
            return true;
        }

        $cookie = $_COOKIE['cc-categories'];

        if ($cookie) {

            if ($cookie == 'ALL') {
                return true;
            }elseif ($cookie == 'NONE') {
                return false;
            }else{
                $categories = json_decode($cookie);
                return in_array($sCategory, $categories);
            }
        }

        return false;
    }

    public function isCookieCategoryMandatory($sCategory)
    {
        if ($sCategory === 'ESSENTIAL'){
            return true;
        }
    }

    public function isCookieCategoryUsed($sCategory) {
        $oDb = \OxidEsales\Eshop\Core\DatabaseProvider::getDb();
        $sSelect = "SELECT COUNT(*) FROM compliancecookies WHERE OXCATEGORY = " . $oDb->quote($sCategory);
        return $oDb->getOne($sSelect) > 0;
    }

}