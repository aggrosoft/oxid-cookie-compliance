[{oxstyle include=$oViewConf->getModuleUrl('agcookiecompliance')|cat:'out/css/agcookiecompliance.min.css'}]
<style>
    .cc-window {
        background-color: "[{$oViewConf->getCookieComplianceModuleSetting('sBannerBackgroundColor')}]";
        color: "[{$oViewConf->getCookieComplianceModuleSetting('sBannerTextColor')}]"
    }
</style>
[{$smarty.block.parent}]