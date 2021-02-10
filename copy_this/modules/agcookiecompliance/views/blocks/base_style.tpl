[{oxstyle include=$oViewConf->getModuleUrl('agcookiecompliance', 'out/css/agcookiecompliance.min.css')}]
<style>
    .cc-window {
        background-color: [{$oViewConf->getCookieComplianceModuleSetting('sBannerBackgroundColor')}];
        color: [{$oViewConf->getCookieComplianceModuleSetting('sBannerTextColor')}];
    }
    .cc-window .cc-btn {
        background-color: [{$oViewConf->getCookieComplianceModuleSetting('sButtonBackgroundColor')}];
        color: [{$oViewConf->getCookieComplianceModuleSetting('sButtonTextColor')}];
    }
</style>
[{$smarty.block.parent}]
