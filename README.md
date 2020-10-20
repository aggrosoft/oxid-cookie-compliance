# OXID cookie compliance modul for OXID 4/5

Free OXID eShop module for GDRP compliance.

Module for OXID 6: https://github.com/aggrosoft/oxid-cookie-compliance/

## Installation
- Copy module files to `shoproot/modules/agcookiecompliance/`

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
- Connection to https://cookiedatabase.org/ works only with php >= 71
- Template compatibility only for wave theme, feel free to contribute for other themes ;-)
