<?php

class CookieHelper {

    public static function getCookieComplianceCategories()
    {
        return [
            'ESSENTIAL',
            'PERSONALIZATION',
            'ANALYTICS',
            'MARKETING',
            'UNCATEGORIZED'
        ];
    }

    public static function hasCookieConsented()
    {
        return $_COOKIE['cc-set'] == 1;
    }

    public static function isCookieCategoryEnabled($sCategory)
    {

        if (self::isCookieCategoryMandatory($sCategory)){
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

    public static function isCookieCategoryMandatory($sCategory)
    {
        if ($sCategory === 'ESSENTIAL'){
            return true;
        }
    }

    public static function isCookieCategoryUsed($sCategory) {
        $oDb = oxDb::getDb();
        $sSelect = "SELECT COUNT(*) FROM compliancecookies WHERE OXACTIVE = 1 AND OXCATEGORY = " . $oDb->quote($sCategory);
        return $oDb->getOne($sSelect) > 0;
    }

}