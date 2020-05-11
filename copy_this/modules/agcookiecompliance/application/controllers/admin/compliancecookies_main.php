<?php

class compliancecookies_main extends oxAdminDetails
{

    public function render()
    {
        parent::render();

        $soxId = $this->_aViewData["oxid"] = $this->getEditObjectId();
        if ($soxId != "-1" && isset($soxId)) {
            // load object
            $oCookie = oxNew("compliancecookie");
            $oCookie->loadInLang($this->_iEditLang, $soxId);

            $oOtherLang = $oCookie->getAvailableInLangs();
            if (!isset($oOtherLang[$this->_iEditLang])) {
                // echo "language entry doesn't exist! using: ".key($oOtherLang);
                $oCookie->loadInLang(key($oOtherLang), $soxId);
            }
            $this->_aViewData["edit"] = $oCookie;


            // remove already created languages
            $aLang = array_diff(oxRegistry::getLang()->getLanguageNames(), $oOtherLang);
            if (count($aLang)) {
                $this->_aViewData["posslang"] = $aLang;
            }

            foreach ($oOtherLang as $id => $language) {
                $oLang = new stdClass();
                $oLang->sLangDesc = $language;
                $oLang->selected = ($id == $this->_iEditLang);
                $this->_aViewData["otherlang"][$id] = clone $oLang;
            }
        }

        $this->_aViewData['allCategories'] = CookieHelper::getCookieComplianceCategories();


        return "compliancecookies_main.tpl";
    }

    /**
     * Saves main parameters.
     *
     * @return null
     */
    public function save()
    {
        parent::save();

        $soxId = $this->getEditObjectId();
        $aParams = oxRegistry::getConfig()->getRequestParameter("editval");

        // shopid
        $aParams['compliancecookies__oxshopid'] = oxRegistry::getSession()->getVariable("actshop");

        $oCookie = oxNew("compliancecookie");

        if ($soxId != "-1") {
            $oCookie->loadInLang($this->_iEditLang, $soxId);
        } else {
            $aParams['compliancecookies__oxid'] = null;
        }


        $oCookie->setLanguage(0);
        $oCookie->assign($aParams);
        $oCookie->setLanguage($this->_iEditLang);
        $oCookie->save();

        // set oxid if inserted
        $this->setEditObjectId($oCookie->getId());
    }

    /**
     * Saves main parameters.
     *
     * @return null
     */
    public function saveinnlang()
    {
        $soxId = $this->getEditObjectId();
        $aParams = oxRegistry::getConfig()->getRequestParameter("editval");

        // shopid
        $aParams['compliancecookies__oxshopid'] = oxRegistry::getSession()->getVariable("actshop");

        $oCookie = oxNew("compliancecookie");

        if ($soxId != "-1") {
            $oCookie->load($soxId);
        } else {
            $aParams['compliancecookies__oxid'] = null;
        }


        $oCookie->setLanguage(0);
        $oCookie->assign($aParams);
        $oCookie->setLanguage($this->_iEditLang);
        $oCookie->save();

        // set oxid if inserted
        $this->setEditObjectId($oCookie->getId());
    }
}