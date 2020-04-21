[{capture assign=complianceSettings}]
[{strip}]
    [{oxifcontent ident="oxsecurityinfo" object="oCont"}]
    [{assign var=sSecurityLink value=$oCont->getLink()}]
    [{/oxifcontent}]
    var COOKIE_COMPLIANCE_SETTINGS = {
        "palette": {
            "popup": {
                "background": "[{$oViewConf->getCookieConsentModuleSetting('sBannerBackgroundColor')}]",
                "text": "[{$oViewConf->getCookieConsentModuleSetting('sBannerTextColor')}]"
            },
            "button": {
                "background": "[{$oViewConf->getCookieConsentModuleSetting('sButtonBackgroundColor')}]",
                "text": "[{$oViewConf->getCookieConsentModuleSetting('sButtonTextColor')}]"
            }
            "highlight": {
                "background": "[{$oViewConf->getCookieConsentModuleSetting('sHighlightBackgroundColor')}]",
                "text": "[{$oViewConf->getCookieConsentModuleSetting('sHighlightTextColor')}]",
                "border": "[{$oViewConf->getCookieConsentModuleSetting('sHighlightBorderColor')}]"
            },
        },
        "theme": "[{$oViewConf->getCookieConsentModuleSetting('sBannerTheme')}]",
        "position": "[{$oViewConf->getCookieConsentModuleSetting('sBannerPosition')}]",
        "static": [{if $oViewConf->getCookieConsentModuleSetting('blStaticBanner')}]true[{else}]false[{/if}],
        "type": "[{$oViewConf->getCookieConsentModuleSetting('sBannerPosition')}]",
        content: {
            header : '[{oxmultilang ident="COOKIE_COMPLIANCE_HEADER"}]',
            message: '[{oxmultilang ident="COOKIE_COMPLIANCE_MESSAGE"}]',
            dismiss: '[{oxmultilang ident="COOKIE_COMPLIANCE_DISMISS"}]',
            allow  : '[{oxmultilang ident="COOKIE_COMPLIANCE_ALLOW"}]',
            deny   : '[{oxmultilang ident="COOKIE_COMPLIANCE_DECLINE"}]',
            link   : '[{oxmultilang ident="COOKIE_COMPLIANCE_HEADER"}]',
            href   : '[{$oViewConf->getCookieConsentModuleSetting('sInfoLink', $sSecurityLink)}]',
            policy : '[{oxmultilang ident="COOKIE_COMPLIANCE_POLICY"}]'
        },
    };
[{/strip}]
[{/capture}]
[{oxscript add=$complianceSettings}]
[{oxscript include=$oViewConf->getModuleUrl('agcookiecompliance')|cat:'out/js/cookieconsent.min.js'}]
[{oxscript include=$oViewConf->getModuleUrl('agcookiecompliance')|cat:'out/js/agcookiecompliance.js'}]
[{oxstyle include=$oViewConf->getModuleUrl('agcookiecompliance')|cat:'out/css/cookieconsent.min.css'}]

