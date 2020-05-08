[{assign var=cookies value=$oViewConf->getComplianceCookies()}]
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <td>[{oxmultilang ident="COOKIE_COMPLIANCE_LIST_NAME"}]</td>
                <td>[{oxmultilang ident="COOKIE_COMPLIANCE_LIST_SOURCE"}]</td>
                <td>[{oxmultilang ident="COOKIE_COMPLIANCE_LIST_PURPOSE"}]</td>
                <td>[{oxmultilang ident="COOKIE_COMPLIANCE_LIST_RETENTION"}]</td>
            </tr>
        </thead>
        <tbody>
            [{foreach from=$cookies item=cookie}]
            <tr>
                <td>[{$cookie->compliancecookies__oxcookie->value}]</td>
                <td>[{$cookie->compliancecookies__oxservice->value}]</td>
                <td>[{$cookie->compliancecookies__oxdescription->value}]</td>
                <td>[{$cookie->compliancecookies__oxretention->value}]</td>
            </tr>
            [{/foreach}]
        </tbody>
    </table>
</div>
