<div class="cc-revoke cc-bottom cc-animate cc-theme-[{$oViewConf->getCookieComplianceModuleSetting('sBannerTheme')}] cc-[{$oViewConf->getCookieComplianceModuleSetting('sBannerPosition')}] [{if $oViewConf->getCookieComplianceModuleSetting('blStaticBanner')}]cc-static[{/if}]" style="">[{oxmultilang ident="COOKIE_COMPLIANCE_POLICY"}]</div>
<div role="dialog" aria-live="polite" aria-label="cookieconsent" aria-describedby="cookieconsent:desc"
     class="cc-window [{$oViewConf->getCookieComplianceModuleSetting('sBannerPosition') === 'top' || [{$oViewConf->getCookieComplianceModuleSetting('sBannerPosition')}] === 'bottom'}]cc-banner[{else}]cc-floating[{/if}] cc-type-[{$oViewConf->getCookieComplianceModuleSetting('sConsentType')}] cc-theme-[{$oViewConf->getCookieComplianceModuleSetting('sBannerTheme')}] cc-[{$oViewConf->getCookieComplianceModuleSetting('sBannerPosition')}] [{if $oViewConf->getCookieComplianceModuleSetting('blStaticBanner')}]cc-static[{/if}]" style="">
    <!--googleoff: all-->
    <span id="cookieconsent:desc" class="cc-message">
        [{oxifcontent ident="oxsecurityinfo" object="oCont"}]
            [{assign var=sSecurityLink value=$oCont->getLink()}]
        [{/oxifcontent}]
        [{oxmultilang ident="COOKIE_COMPLIANCE_MESSAGE"}] <a role="button" tabindex="0" class="cc-link"
                href="[{$oViewConf->getCookieComplianceModuleSetting('sInfoLink', $sSecurityLink)}]
                rel="noopener noreferrer nofollow" target="_blank">[{oxmultilang ident="COOKIE_COMPLIANCE_HEADER"}]</a>
    </span>
    <div class="form">
        [{if $oViewConf->getCookieComplianceModuleSetting('sConsentType') === 'categories'}]
        <ul class="cc-categories">
            [{foreach from=$oViewConf->getCookieComplianceCategories() item=complianceCategory}]
            <li class="cc-category">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="check[{$complianceCategory}]">
                    <label class="custom-control-label" for="check[{$complianceCategory}]">[{oxmultilang ident="COOKIE_COMPLIANCE_CATEGORY_"|cat:$complianceCategory}]</label>
                </div>
            </li>
            [{/foreach}]
        </ul>
        <button class="cc-btn cc-save">[{oxmultilang ident="COOKIE_COMPLIANCE_SAVE"}]</button>
        [{elseif $oViewConf->getCookieComplianceModuleSetting('sConsentType') === 'opt-in'}]
        <div class="btn-group">
            <button class="cc-btn cc-dismiss">[{oxmultilang ident="COOKIE_COMPLIANCE_DISMISS"}]</button>
            <button class="cc-btn cc-allow-all">[{oxmultilang ident="COOKIE_COMPLIANCE_ALLOW"}]</button>
        </div>
        [{elseif $oViewConf->getCookieComplianceModuleSetting('sConsentType') === 'opt-out'}]
        <div class="btn-group">
            <button class="cc-btn cc-dismiss">[{oxmultilang ident="COOKIE_COMPLIANCE_DISMISS"}]</button>
            <button class="cc-btn cc-disallow-all">[{oxmultilang ident="COOKIE_COMPLIANCE_DISALLOW"}]</button>
        </div>
        [{elseif $oViewConf->getCookieComplianceModuleSetting('sConsentType') === 'info'}]
        <button class="cc-btn cc-dismiss">[{oxmultilang ident="COOKIE_COMPLIANCE_DISMISS"}]</button>
        [{/if}]
    </div>
    <!--googleon: all-->
</div>