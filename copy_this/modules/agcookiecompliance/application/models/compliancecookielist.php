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

    public function loadCategoryCookies($sCategory)
    {
        $sFields = $this->getBaseObject()->getSelectFields();
        $sTable    = getViewName('compliancecookies');
        $db = \OxidEsales\Eshop\Core\DatabaseProvider::getDb();

        $sQ = "SELECT $sFields FROM $sTable WHERE $sTable.oxcategory = " . $db->quote($sCategory);
        $this->selectString($sQ);
    }

}