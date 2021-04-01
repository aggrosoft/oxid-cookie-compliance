[{capture assign=complianceSettings}]
[{strip}]
    [{oxifcontent ident="oxsecurityinfo" object="oCont"}]
    [{assign var=sSecurityLink value=$oCont->getLink()}]
    [{/oxifcontent}]
    var COOKIE_COMPLIANCE_SETTINGS = {
        "palette": {
            "popup": {
                "background": "[{$oViewConf->getCookieComplianceModuleSetting('sBannerBackgroundColor')}]",
                "text": "[{$oViewConf->getCookieComplianceModuleSetting('sBannerTextColor')}]"
            },
            "button": {
                "background": "[{$oViewConf->getCookieComplianceModuleSetting('sButtonBackgroundColor')}]",
                "text": "[{$oViewConf->getCookieComplianceModuleSetting('sButtonTextColor')}]"
            },
            "highlight": {
                "background": "[{$oViewConf->getCookieComplianceModuleSetting('sHighlightBackgroundColor')}]",
                "text": "[{$oViewConf->getCookieComplianceModuleSetting('sHighlightTextColor')}]",
                "border": "[{$oViewConf->getCookieComplianceModuleSetting('sHighlightBorderColor')}]"
            }
        },
        "theme": "[{$oViewConf->getCookieComplianceModuleSetting('sBannerTheme')}]",
        "position": "[{$oViewConf->getCookieComplianceModuleSetting('sBannerPosition')}]",
        "static": [{if $oViewConf->getCookieComplianceModuleSetting('blStaticBanner')}]true[{else}]false[{/if}],
        "type": "[{$oViewConf->getCookieComplianceModuleSetting('sConsentType')}]",
        "content": {
            "header" : '[{oxmultilang ident="COOKIE_COMPLIANCE_HEADER"}]',
            "message": '[{oxmultilang ident="COOKIE_COMPLIANCE_MESSAGE"}]',
            "dismiss": '[{oxmultilang ident="COOKIE_COMPLIANCE_DISMISS"}]',
            "allow"  : '[{oxmultilang ident="COOKIE_COMPLIANCE_ALLOW"}]',
            "deny"   : '[{oxmultilang ident="COOKIE_COMPLIANCE_DECLINE"}]',
            "link"   : '[{oxmultilang ident="COOKIE_COMPLIANCE_HEADER"}]',
            "href"   : '[{$oViewConf->getCookieComplianceModuleSetting('sInfoLink', $sSecurityLink)}]',
            "policy" : '[{oxmultilang ident="COOKIE_COMPLIANCE_POLICY"}]'
        },
    };
[{/strip}]
[{/capture}]
[{oxscript add=$complianceSettings}]
[{if $oViewConf->getCookieComplianceModuleSetting('blJqueryMode')}]
    [{oxscript include=$oViewConf->getModuleUrl('agcookiecompliance', 'out/js/agcookiecompliance.min.js')}]
    [{else}]
    [{oxscript include=$oViewConf->getModuleUrl('agcookiecompliance', 'out/js/agcookiecompliance-vanilla.min.js')}]
[{/if}]
[{oxid_include_dynamic file="widget/cookiecompliancedialog.tpl"}]

[{capture assign=ccScript}]
[{strip}]
    window.COOKIE_COMPLIANCE_URL = '[{$oViewConf->getSelfActionLink()}]';

    [{if $oViewConf->getCookieComplianceModuleSetting('blTrainingMode')}]
        [{if $oViewConf->getCookieComplianceModuleSetting('blJqueryMode')}]
        $(function(){
            $.ajax({
                url: '[{$oViewConf->getSelfActionLink()}]',
                method: 'POST',
                data: {
                cl: 'cookietrainer',
                fnc: 'track',
                cookies: document.cookie
                }
            });
        });
        [{else}]
        document.addEventListener('DOMContentLoaded', function () {
            fetch(
                "[{$oViewConf->getSelfActionLink()}]",
                {
                    method: 'POST',
                    body: {
                    cl: 'cookietrainer',
                    fnc: 'track',
                    cookies: document.cookie
                }
            }).catch(function (err) {console.warn('Something went wrong.', err);});
        });
        [{/if}]
    [{/if}]
[{/strip}]
[{/capture}]
[{oxscript add=$ccScript}]
