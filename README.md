# OXID cookie compliance modul for OXID 6

Free OXID eShop module for GDRP compliance.

## Installation
- Get module by composer `composer require aggrosoft/oxid-cookie-compliance`

## Configuration
- See module settings
- Activate "Lern-Modus" and make an test order, after this deacticate "Lern-Modus"
- Change cookie settings in general shop data --> cookies
- add `[{include file="widget/cookieinfos.tpl"}]` to `oxsecurityinfo` cms-page

## Notice
- Template compatibility only for wave theme, feel free to contribute for other themes ;-)
