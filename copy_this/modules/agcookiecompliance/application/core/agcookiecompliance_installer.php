<?php

class agcookiecompliance_installer {

    public function onActivate () {
        $query = 'CREATE TABLE IF NOT EXISTS compliancecookies (
                    OXID CHAR(32) character set latin1 collate latin1_general_ci NOT NULL, 
                    OXSHOPID int(11) NOT NULL default 1,
                    OXCOOKIE VARCHAR(255), 
                    OXTITLE VARCHAR(255), 
                    OXCATEGORY VARCHAR(255), 
                    OXSERVICE VARCHAR(255), 
                    OXDESCRIPTION VARCHAR(255), 
                    OXRETENTION VARCHAR(255),
                    PRIMARY KEY  (`OXID`)
                 ) ENGINE=InnoDB';
        \OxidEsales\Eshop\Core\DatabaseProvider::getDb()->execute($query);
    }

}