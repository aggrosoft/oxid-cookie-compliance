<?php

class compliancecookielist extends oxList {

    /**
     * Class constructor, initiates parent constructor (parent::oxList()).
     *
     * @return null
     */
    public function __construct()
    {
        parent::__construct('compliancecookie');
    }

    public function loadAllCookies()
    {
        $sFields = $this->getBaseObject()->getSelectFields();
        $sShopId = $this->getShopId();
        $sTable    = getViewName('compliancecookies');
        $db = \OxidEsales\Eshop\Core\DatabaseProvider::getDb();

        $sQ = "SELECT $sFields FROM $sTable WHERE $sTable.oxactive = 1 AND $sTable.oxshopid = $sShopId ORDER BY OXCATEGORY DESC, OXCOOKIE ASC ";
        $this->selectString($sQ);
    }

    public function loadCategoryCookies($sCategory)
    {
        $sFields = $this->getBaseObject()->getSelectFields();
        $sShopId = $this->getShopId();
        $sTable    = getViewName('compliancecookies');
        $db = \OxidEsales\Eshop\Core\DatabaseProvider::getDb();

        $sQ = "SELECT $sFields FROM $sTable WHERE $sTable.oxshopid = $sShopId AND $sTable.oxcategory = " . $db->quote($sCategory).' ORDER BY OXCOOKIE ASC';
        $this->selectString($sQ);
    }

    protected function getShopId(){
        $oConfig = \OxidEsales\Eshop\Core\Registry::getConfig();
        $oShop = $oConfig->getActiveShop();
        return $oShop->getId();
    }

}