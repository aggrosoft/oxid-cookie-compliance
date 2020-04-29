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

}