<?php

class compliancecookie extends oxI18n {

    /**
     * Current class name.
     *
     * @var string
     */
    protected $_sClassName = 'compliancecookie';

    /**
     * Class constructor, initiates parent constructor (parent::oxI18n()).
     */
    public function __construct()
    {
        parent::__construct();
        $this->init('compliancecookies');
    }

    public function loadByCookieName($sLoadId)
    {
        $sTable = $this->getViewName();
        $sShopId = $this->getShopId();
        $aParams = [$sTable . '.oxcookie' => $sLoadId, $sTable . '.oxshopid' => $sShopId];

        $sSelect = $this->buildSelectString($aParams);

        $aData = \OxidEsales\Eshop\Core\DatabaseProvider::getDb(\OxidEsales\Eshop\Core\DatabaseProvider::FETCH_MODE_ASSOC)->getRow($sSelect);

        if ($aData) {
            $this->assign($aData);
            return true;
        }

        return false;
    }

}