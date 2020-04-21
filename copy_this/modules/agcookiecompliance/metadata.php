<?php

$sMetadataVersion = '1.1';

$aModule = array(
    'id'           => 'agcookiecompliance',
    'title'        => '<img src="' . oxRegistry::getConfig()->getShopUrl() . 'modules/agcookiecompliance/out/img/logo.png" height="15" alt="Cookie Compliance" title="Cookie Compliance"> Cookie Compliance',
    'description'  => 'GDPR Cookie Compliance',
    'thumbnail'    => '',
    'version'      => '1.0.3',
    'author'       => 'Aggrosoft GmbH',
    'extend'      => array(
        'oxviewconfig' => 'agcookiecompliance/extensions/core/agcookiecompliance_oxviewconfig'
    ),
    'files'       => array(

    ),
    'templates'   => array(
        'widget/cookiecompliance.tpl' => 'agcookiecompliance/application/views/tpl/widget/cookiecompliance.tpl',
    ),
    'events'       => array(

    ),
    'settings' => array(
        array('group' => 'agcookiecompliance_layout', 'name' => 'sBannerPosition', 'type' => 'select', 'value' => 'bottom', 'constraints' => 'bottom|top|bottom-left|bottom-right'),
        array('group' => 'agcookiecompliance_layout', 'name' => 'blStaticBanner', 'type' => 'bool', 'value' => false),
        array('group' => 'agcookiecompliance_layout', 'name' => 'sBannerTheme', 'type' => 'select', 'value' => 'block', 'constraints' => 'block|edgeless|classic|wire|custom'),
        array('group' => 'agcookiecompliance_colors', 'name' => 'sBannerBackgroundColor', 'type' => 'string', 'value' => '#eaf7f7'),
        array('group' => 'agcookiecompliance_colors', 'name' => 'sBannerTextColor', 'type' => 'string', 'value' => '#5c7291'),
        array('group' => 'agcookiecompliance_colors', 'name' => 'sButtonBackgroundColor', 'type' => 'string', 'value' => '#56cbdb'),
        array('group' => 'agcookiecompliance_colors', 'name' => 'sButtonTextColor', 'type' => 'string', 'value' => '#ffffff'),
        array('group' => 'agcookiecompliance_colors', 'name' => 'sHighlightBackgroundColor', 'type' => 'string', 'value' => '#f8e71c'),
        array('group' => 'agcookiecompliance_colors', 'name' => 'sHighlightTextColor', 'type' => 'string', 'value' => '#f8e71c'),
        array('group' => 'agcookiecompliance_colors', 'name' => 'sHighlightBorderColor', 'type' => 'string', 'value' => '#000000'),
        array('group' => 'agcookiecompliance_settings', 'name' => 'sConsentType', 'type' => 'select', 'value' => 'opt-in', 'constraints' => 'opt-in|opt-out|info'),
        array('group' => 'agcookiecompliance_settings', 'name' => 'sInfoLink', 'type' => 'string', 'value' => ''),
    ),
    'blocks' => array(
        array('template' => 'layout/base.tpl','block'=>'base_style','file'=>'/views/blocks/base_style.tpl'),
    )
);
