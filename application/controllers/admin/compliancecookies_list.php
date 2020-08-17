<?php

class compliancecookies_list extends oxAdminList
{

    /**
     * Name of chosen object class (default null).
     *
     * @var string
     */
    protected $_sListClass = 'compliancecookie';

    /**
     * Default SQL sorting parameter (default null).
     *
     * @var string
     */
    protected $_sDefSortField = 'oxcookie';

    /**
     * Executes parent method parent::render() and returns name of template
     * file "user_list.tpl".
     *
     * @return string
     */
    public function render()
    {

        parent::render();

        return "compliancecookies_list.tpl";
    }
}