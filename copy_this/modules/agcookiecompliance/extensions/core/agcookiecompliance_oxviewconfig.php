<?php

class agcookiecompliance_oxviewconfig extends agcookiecompliance_oxviewconfig_parent
{

    public function getCookieComplianceModuleSetting($sSetting, $sDefault = '')
    {
        $oConfig = $this->getConfig();
        $sValue = $oConfig->getShopConfVar($sSetting, null, 'module:agcookiecompliance');
        return $sValue ? $sValue : $sDefault;
    }

}