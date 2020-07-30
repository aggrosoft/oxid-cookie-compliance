<?php

/**
 * Class agcookiecompliance_installer
 */
class agcookiecompliance_installer
{

    /**
     * @throws oxConnectionException
     * @throws oxSystemComponentException
     */
    public function onActivate()
    {
        $query = 'CREATE TABLE IF NOT EXISTS compliancecookies (
                    OXID CHAR(32) character set latin1 collate latin1_general_ci NOT NULL, 
                    OXSHOPID int(11) NOT NULL default 1,
                    OXCOOKIE VARCHAR(255), 
                    OXACTIVE TINYINT(1), 
                    OXTITLE VARCHAR(255), 
                    OXTITLE_1 VARCHAR(255), 
                    OXTITLE_2 VARCHAR(255), 
                    OXTITLE_3 VARCHAR(255), 
                    OXCATEGORY VARCHAR(255), 
                    OXSERVICE VARCHAR(255), 
                    OXDESCRIPTION VARCHAR(255), 
                    OXDESCRIPTION_1 VARCHAR(255), 
                    OXDESCRIPTION_2 VARCHAR(255), 
                    OXDESCRIPTION_3 VARCHAR(255), 
                    OXRETENTION VARCHAR(255),
                    PRIMARY KEY  (`OXID`)
                 ) ENGINE=InnoDB';
        oxDb::getDb()->execute($query);
        $oShop = oxNew('oxShop');
        $oShop->generateViews();
    }

}
