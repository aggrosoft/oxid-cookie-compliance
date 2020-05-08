<?php

$sMetadataVersion = '1.1';

$icon = '<svg style="width:11px;height:11px" viewBox="0 0 24 24">
    <path fill="#804700" d="M12,3A9,9 0 0,0 3,12A9,9 0 0,0 12,21A9,9 0 0,0 21,12C21,11.5 20.96,11 20.87,10.5C20.6,10 20,10 20,10H18V9C18,8 17,8 17,8H15V7C15,6 14,6 14,6H13V4C13,3 12,3 12,3M9.5,6A1.5,1.5 0 0,1 11,7.5A1.5,1.5 0 0,1 9.5,9A1.5,1.5 0 0,1 8,7.5A1.5,1.5 0 0,1 9.5,6M6.5,10A1.5,1.5 0 0,1 8,11.5A1.5,1.5 0 0,1 6.5,13A1.5,1.5 0 0,1 5,11.5A1.5,1.5 0 0,1 6.5,10M11.5,11A1.5,1.5 0 0,1 13,12.5A1.5,1.5 0 0,1 11.5,14A1.5,1.5 0 0,1 10,12.5A1.5,1.5 0 0,1 11.5,11M16.5,13A1.5,1.5 0 0,1 18,14.5A1.5,1.5 0 0,1 16.5,16H16.5A1.5,1.5 0 0,1 15,14.5H15A1.5,1.5 0 0,1 16.5,13M11,16A1.5,1.5 0 0,1 12.5,17.5A1.5,1.5 0 0,1 11,19A1.5,1.5 0 0,1 9.5,17.5A1.5,1.5 0 0,1 11,16Z" />
</svg>';

$aModule = array(
    'id'           => 'agcookiecompliance',
    'title'        => $icon . ' Cookie Compliance',
    'description'  => 'GDPR Cookie Compliance',
    'thumbnail'    => '',
    'version'      => '1.0.10',
    'author'       => 'Aggrosoft GmbH',
    'extend'      => array(
        'oxviewconfig' => 'agcookiecompliance/extensions/core/agcookiecompliance_oxviewconfig'
    ),
    'files'       => array(
        'agcookiecompliance_installer' => 'agcookiecompliance/application/core/agcookiecompliance_installer.php',
        'cookietrainer' => 'agcookiecompliance/application/controllers/cookietrainer.php',
        'compliancecookie' => 'agcookiecompliance/application/models/compliancecookie.php',
        'compliancecookielist' => 'agcookiecompliance/application/models/compliancecookielist.php',
        'cookieparser' => 'agcookiecompliance/application/core/cookieparser.php',
        'cookiehelper' => 'agcookiecompliance/application/core/cookiehelper.php',
    ),
    'templates'   => array(
        'widget/cookiecompliance.tpl' => 'agcookiecompliance/application/views/tpl/widget/cookiecompliance.tpl',
        'widget/cookiecompliancedialog.tpl' => 'agcookiecompliance/application/views/tpl/widget/cookiecompliancedialog.tpl',
        'widget/cookieinfos.tpl' => 'agcookiecompliance/application/views/tpl/widget/cookieinfos.tpl',
    ),
    'events'       => array(
        'onActivate'   => 'agcookiecompliance_installer::onActivate',
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
        array('group' => 'agcookiecompliance_settings', 'name' => 'blTrainingMode', 'type' => 'bool', 'value' => false),
    ),
    'blocks' => array(
        array('template' => 'layout/base.tpl','block'=>'base_js','file'=>'/views/blocks/base_js.tpl'),
        array('template' => 'layout/base.tpl','block'=>'base_style','file'=>'/views/blocks/base_style.tpl'),
    )
);
