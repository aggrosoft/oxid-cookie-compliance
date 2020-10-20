# OXID cookie compliance modul for OXID 6

Free OXID eShop module for GDRP compliance.

Module for OXID 4/5: https://github.com/aggrosoft/oxid-cookie-compliance/tree/oxid-410

## Installation
- Get module by composer `composer require aggrosoft/oxid-cookie-compliance`

## Configuration
- See module settings
- Activate "Lern-Modus" and make an test order, after this deacticate "Lern-Modus"
- Change cookie settings in general shop data --> cookies
- Add `[{include file="widget/cookieinfos.tpl"}]` to `oxsecurityinfo` cms-page
- "Lern-Modus" will handle the oxid standard cookies (ESSENTIAL, Google Analytics)
- Add extra cookies in the backend module    
- Customize the including of the extra cookies in templates by using `[{if $oViewConf->isCookieCategoryEnabled('MARKETING') == 1}][{/if}]`
- Possible cats are ESSENTIAL,PERSONALIZATION,ANALYTICS,MARKETING,UNCATEGORIZED

## Notice
- Template compatibility only for wave theme, feel free to contribute for other themes ;-)
