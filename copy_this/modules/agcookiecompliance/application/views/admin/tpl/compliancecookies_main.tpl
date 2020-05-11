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
                        <input class="edittext" type="checkbox" name="editval[compliancecookies__oxactive]" value='1' [{if $edit->compliancecookies__oxactive->value == 1}]checked[{/if}] [{$readonly}]>
                        <td class="edittext" colspan="2">
                            [{oxinputhelp ident="HELP_GENERAL_ACTIVE"}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="GENERAL_NAME"}]
                        </td>
                        <td class="edittext" colspan="2">
                            <input type="text" class="editinput" size="25" maxlength="[{$edit->compliancecookies__oxname->fldmax_length}]" name="editval[compliancecookies__oxname]" value="[{$edit->compliancecookies__oxname->value}]" [{$readonly}]>
                            [{oxinputhelp ident="HELP_GENERAL_NAME"}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="GENERAL_CATEGORY"}]
                        </td>
                        <td class="edittext" colspan="2">
                            <input type="text" class="editinput" size="10" maxlength="[{$edit->compliancecookies__oxcategory->fldmax_length}]" name="editval[compliancecookies__oxcategory]" value="[{$edit->compliancecookies__oxcategory->value}]" [{$readonly}]>
                            [{oxinputhelp ident="HELP_GENERAL_CATEGORY"}]
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