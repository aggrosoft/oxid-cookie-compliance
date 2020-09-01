<?php

class agcookiecompliance_oxviewconfig extends agcookiecompliance_oxviewconfig_parent
{

    public function getCookieComplianceModuleSetting($sSetting, $sDefault = '')
    {
        $oConfig = $this->getConfig();
        $sValue = $oConfig->getShopConfVar($sSetting, null, 'module:agcookiecompliance');
        return $sValue ? $sValue : $sDefault;
    }

    public function getCookieComplianceCategories()
    {
        return CookieHelper::getCookieComplianceCategories();
    }

    public function hasCookieConsented()
    {
        return CookieHelper::hasCookieConsented();
    }

    public function isCookieCategoryEnabled($sCategory)
    {
        return CookieHelper::isCookieCategoryEnabled($sCategory);
    }

    public function isCookieCategoryMandatory($sCategory)
    {
        return CookieHelper::isCookieCategoryMandatory($sCategory);
    }

    public function isCookieCategoryUsed($sCategory) {
        return CookieHelper::isCookieCategoryUsed($sCategory);
    }

    public function getViewThemeParam($sParam){
        if (($sParam === 'sGoogleMapsAddr' || $sParam === 'sGATrackingId') && !self::isCookieCategoryEnabled('ANALYTICS')){
            return false;
        }
        return parent::getViewThemeParam($sParam);
    }

    public function getComplianceCookies () {
        $list = oxNew('compliancecookielist');
        $list->loadAllCookies();
        return $list;
    }

    public function getComplianceCookiesByCategory () {
        $list = oxNew('compliancecookielist');
        $list->loadAllCookies();

        $types=[];

        foreach ($list as $item){
            $cat=$item->compliancecookies__oxcategory->value;
            if($cat){
                if(!$types[$cat]) $types[$cat]=[];
                $types[$cat][]=$item;
            }
        }

        return $types;
    }

}