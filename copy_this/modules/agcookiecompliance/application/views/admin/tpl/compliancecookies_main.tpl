[{include file="headitem.tpl" title="compliancecookies_MAIN_TITLE"|oxmultilangassign}]

[{if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
    [{else}]
    [{assign var="readonly" value=""}]
    [{/if}]

<form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="cl" value="compliancecookies_main">
    <input type="hidden" name="editlanguage" value="[{$editlanguage}]">
</form>


<form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="compliancecookies_main">
    <input type="hidden" name="fnc" value="">
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="editval[compliancecookies__oxid]" value="[{$oxid}]">


    <table cellspacing="0" cellpadding="0" border="0" width="98%">
        <tr>
            <td valign="top" class="edittext">

                <table cellspacing="0" cellpadding="0" border="0">
                    [{block name="admin_compliancecookies_main_form"}]
                    <tr>
                        <td class="edittext" width="90">
                            [{oxmultilang ident="GENERAL_ACTIVE"}]
                        </td>
                        <td class="edittext" colspan="2">
                            <input type="hidden" name="editval[compliancecookies__oxactive]" value='0'>
                            <input class="edittext" type="checkbox" name="editval[compliancecookies__oxactive]" value='1' [{if $edit->compliancecookies__oxactive->value == 1}]checked[{/if}] [{$readonly}]>

                            [{oxinputhelp ident="HELP_GENERAL_ACTIVE"}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="GENERAL_IDENT"}]
                        </td>
                        <td class="edittext" colspan="2">
                            <input type="text" class="editinput" size="25" maxlength="[{$edit->compliancecookies__oxcookie->fldmax_length}]" name="editval[compliancecookies__oxcookie]" value="[{$edit->compliancecookies__oxcookie->value}]" [{$readonly}]>
                            [{oxinputhelp ident="HELP_GENERAL_IDENT"}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="GENERAL_NAME"}]
                        </td>
                        <td class="edittext" colspan="2">
                            <input type="text" class="editinput" size="25" maxlength="[{$edit->compliancecookies__oxtitle->fldmax_length}]" name="editval[compliancecookies__oxtitle]" value="[{$edit->compliancecookies__oxtitle->value}]" [{$readonly}]>
                            [{oxinputhelp ident="HELP_GENERAL_NAME"}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="GENERAL_CATEGORY"}]
                        </td>
                        <td class="edittext" colspan="2">
                            <select name="editval[compliancecookies__oxcategory]" class="editinput">
                                [{foreach from=$allCategories item=complianceCategory}]
                                    <option value="[{$complianceCategory}]">[{oxmultilang ident="COOKIE_COMPLIANCE_CATEGORY_"|cat:$complianceCategory}]</option>
                                [{/foreach}]
                            </select>
                            [{oxinputhelp ident="HELP_GENERAL_CATEGORY"}]
                        </td>
                    </tr>

                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="COOKIE_COMPLIANCE_SERVICE"}]
                        </td>
                        <td class="edittext" colspan="2">
                            <input type="text" class="editinput" size="25" maxlength="[{$edit->compliancecookies__oxservice->fldmax_length}]" name="editval[compliancecookies__oxservice]" value="[{$edit->compliancecookies__oxservice->value}]" [{$readonly}]>
                        </td>
                    </tr>

                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="GENERAL_DESCRIPTION"}]
                        </td>
                        <td class="edittext" colspan="2">
                            <input type="text" class="editinput" size="25" maxlength="[{$edit->compliancecookies__oxdescription->fldmax_length}]" name="editval[compliancecookies__oxdescription]" value="[{$edit->compliancecookies__oxdescription->value}]" [{$readonly}]>
                            [{oxinputhelp ident="HELP_GENERAL_DESCRIPTION"}]
                        </td>
                    </tr>

                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="COOKIE_COMPLIANCE_RETENTION"}]
                        </td>
                        <td class="edittext" colspan="2">
                            <input type="text" class="editinput" size="25" maxlength="[{$edit->compliancecookies__oxretention->fldmax_length}]" name="editval[compliancecookies__oxretention]" value="[{$edit->compliancecookies__oxretention->value}]" [{$readonly}]>

                        </td>
                    </tr>

                    [{/block}]
                    [{if $oxid != "-1"}]
                    <tr>
                        <td class="edittext">
                        </td>
                        <td class="edittext" colspan="2"><br>
                            [{include file="language_edit.tpl"}]
                        </td>
                    </tr>
                    [{/if}]
                    <tr>
                        <td class="edittext">
                        </td>
                        <td class="edittext" colspan="2"><br>
                            <input type="submit" class="edittext" name="save" value="[{oxmultilang ident="GENERAL_SAVE"}]" onClick="Javascript:document.myedit.fnc.value='save'" [{$readonly}]>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</form>
[{include file="bottomnaviitem.tpl"}]
[{include file="bottomitem.tpl"}]