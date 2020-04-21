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
        array('group' => 'agcookiecompliance_layout', 'name' => 'sBannerTheme', 'type' => 'select', 'value' => 'block', 'constraints' => 'block|edgeless|classic|custom'),
        array('group' => 'agcookiecompliance_colors', 'name' => 'sBannerBackgroundColor', 'type' => 'str', 'value' => '#eaf7f7'),
        array('group' => 'agcookiecompliance_colors', 'name' => 'sBannerTextColor', 'type' => 'str', 'value' => '#5c7291'),
        array('group' => 'agcookiecompliance_colors', 'name' => 'sButtonBackgroundColor', 'type' => 'str', 'value' => '#56cbdb'),
        array('group' => 'agcookiecompliance_colors', 'name' => 'sButtonTextColor', 'type' => 'str', 'value' => '#ffffff'),
        array('group' => 'agcookiecompliance_colors', 'name' => 'sHighlightBackgroundColor', 'type' => 'str', 'value' => '#d65959'),
        array('group' => 'agcookiecompliance_colors', 'name' => 'sHighlightTextColor', 'type' => 'str', 'value' => '#ffffff'),
        array('group' => 'agcookiecompliance_colors', 'name' => 'sHighlightBorderColor', 'type' => 'str', 'value' => '#d65959'),
        array('group' => 'agcookiecompliance_settings', 'name' => 'sConsentType', 'type' => 'select', 'value' => 'categories', 'constraints' => 'categories|opt-in|opt-out|info'),
        array('group' => 'agcookiecompliance_settings', 'name' => 'sInfoLink', 'type' => 'str', 'value' => ''),
    ),
    'blocks' => array(
        array('template' => 'layout/base.tpl','block'=>'base_style','file'=>'/views/blocks/base_style.tpl'),
    )
);
