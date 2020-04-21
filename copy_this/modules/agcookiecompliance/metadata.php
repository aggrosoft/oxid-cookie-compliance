<?php

$sMetadataVersion = '1.1';

$aModule = array(
    'id'           => 'agcookiecompliance',
    'title'        => '<img src="' . oxRegistry::getConfig()->getShopUrl() . 'modules/agcookiecompliance/out/img/logo.png" height="15" alt="Cookie Compliance" title="Cookie Compliance"> Cookie Compliance',
    'description'  => 'GDPR Cookie Compliance',
    'thumbnail'    => '',
    'version'      => '1.0.1',
    'author'       => 'Aggrosoft GmbH',
    'extend'      => array(

    ),
    'files'       => array(

    ),
    'templates'   => array(
        'widget/cookiecompliance.tpl' => 'agcookiecompliance/application/views/tpl/widget/cookiecompliance.tpl',
    ),
    'events'       => array(

    ),
    'settings' => array(

    ),
    'blocks' => array(
        array('template' => 'layout/base.tpl','block'=>'base_style','file'=>'/views/blocks/base_style.tpl'),
    )
);
