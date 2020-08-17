# OXID cookie compliance modul for OXID 4/5

Free OXID eShop module for GDRP compliance.

## Installation
- Copy module files to `shoproot/modules/agcookiecompliance/`

## Configuration
- See module settings
- Activate "Lern-Modus" and make an test order, after this deacticate "Lern-Modus"
- Change cookie settings in general shop data --> cookies
- add `[{include file="widget/cookieinfos.tpl"}]` to `oxsecurityinfo` cms-page

## Notice
- Connection to https://cookiedatabase.org/ works only with php >= 71
- Template compatibility only for wave theme, feel free to contribute for other themes ;-)