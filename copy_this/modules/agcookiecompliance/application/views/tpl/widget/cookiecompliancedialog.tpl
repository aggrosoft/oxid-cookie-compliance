[{assign var=blHasConsented value=$oViewConf->hasCookieConsented()}]
<a href="#" class="[{if !$blHasConsented}]cc-invisible[{/if}] cc-revoke cc-animate cc-bottom cc-theme-[{$oViewConf->getCookieComplianceModuleSetting('sBannerTheme')}] cc-[{$oViewConf->getCookieComplianceModuleSetting('sBannerPosition')}] [{if $oViewConf->getCookieComplianceModuleSetting('blStaticBanner')}]cc-static[{/if}]" style="[{if !$blHasConsented}]display:none;[{/if}]">[{oxmultilang ident="COOKIE_COMPLIANCE_POLICY"}]</a>
<div role="dialog" aria-live="polite" aria-label="cookieconsent" aria-describedby="cookieconsent:desc"
     class="cc-window cc-animate [{if $oViewConf->getCookieComplianceModuleSetting('sBannerPosition') === 'top' || $oViewConf->getCookieComplianceModuleSetting('sBannerPosition') === 'bottom'}]cc-banner[{else}]cc-floating[{/if}] cc-type-[{$oViewConf->getCookieComplianceModuleSetting('sConsentType')}] cc-theme-[{$oViewConf->getCookieComplianceModuleSetting('sBannerTheme')}] cc-[{$oViewConf->getCookieComplianceModuleSetting('sBannerPosition')}] [{if $oViewConf->getCookieComplianceModuleSetting('blStaticBanner')}]cc-static[{/if}]" style="[{if $blHasConsented}]display:none;[{/if}]">
    <!--googleoff: all-->
    <span id="cookieconsent:desc" class="cc-message">
        [{oxifcontent ident="oxsecurityinfo" object="oCont"}]
            [{assign var=sSecurityLink value=$oCont->getLink()}]
        [{/oxifcontent}]
        [{oxmultilang ident="COOKIE_COMPLIANCE_MESSAGE"}]
        <a role="button" tabindex="0" class="cc-link"
                href="[{$oViewConf->getCookieComplianceModuleSetting('sInfoLink', $sSecurityLink)}]"
                rel="noopener noreferrer nofollow" target="_blank">[{oxmultilang ident="COOKIE_COMPLIANCE_HEADER"}]
        </a>
    </span>
    <div class="form">
        [{if $oViewConf->getCookieComplianceModuleSetting('sConsentType') === 'categories'}]
        <ul class="cc-categories">
            [{foreach from=$oViewConf->getCookieComplianceCategories() item=complianceCategory}]
            <li class="cc-category">
                <div class="custom-control custom-checkbox">
                    <input value="[{$complianceCategory}]" type="checkbox" class="cc-category custom-control-input" id="cc-check[{$complianceCategory}]" [{if $oViewConf->isCookieCategoryEnabled($complianceCategory)}]checked="checked"[{/if}] [{if $oViewConf->isCookieCategoryMandatory($complianceCategory)}]disabled[{/if}]>
                    <label class="custom-control-label" for="cc-check[{$complianceCategory}]">[{oxmultilang ident="COOKIE_COMPLIANCE_CATEGORY_"|cat:$complianceCategory}]</label>
                </div>
            </li>
            [{/foreach}]
        </ul>
        <div class="cc-btn-group btn-group d-flex">
            <button class="cc-btn cc-allow-all w-100">[{oxmultilang ident="COOKIE_COMPLIANCE_ALLOW_ALL"}]</button>
            <button class="cc-btn cc-save w-100">[{oxmultilang ident="COOKIE_COMPLIANCE_SAVE"}]</button>
        </div>
        [{elseif $oViewConf->getCookieComplianceModuleSetting('sConsentType') === 'opt-in'}]
        <div class="cc-btn-group btn-group d-flex">
            <button class="cc-btn cc-dismiss w-100">[{oxmultilang ident="COOKIE_COMPLIANCE_DISMISS"}]</button>
            <button class="cc-btn cc-allow-all w-100">[{oxmultilang ident="COOKIE_COMPLIANCE_ALLOW"}]</button>
        </div>
        [{elseif $oViewConf->getCookieComplianceModuleSetting('sConsentType') === 'opt-out'}]
        <div class="cc-btn-group btn-group d-flex">
            <button class="cc-btn cc-dismiss w-100">[{oxmultilang ident="COOKIE_COMPLIANCE_DISMISS"}]</button>
            <button class="cc-btn cc-disallow-all w-100">[{oxmultilang ident="COOKIE_COMPLIANCE_DISALLOW"}]</button>
        </div>
        [{elseif $oViewConf->getCookieComplianceModuleSetting('sConsentType') === 'info'}]
        <button class="cc-btn cc-dismiss w-100">[{oxmultilang ident="COOKIE_COMPLIANCE_DISMISS"}]</button>
        [{/if}]
    </div>
    <!--googleon: all-->
</div>