<?php

class ComplianceCookie extends oxBase {

    /**
     * Current class name.
     *
     * @var string
     */
    protected $_sClassName = 'ComplianceCookie';

    /**
     * Class constructor, initiates parent constructor (parent::oxI18n()).
     */
    public function __construct()
    {
        parent::__construct();
        $this->init('compliancecookies');
    }

}