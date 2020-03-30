@extends('email_templates.layouts.app')

@section('body')

    <tr>
        <td width="100%" height="21" style="line-height:1px;"></td>
    </tr>
    <tr>
        <td width="100%" align="center" valign="middle">
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                <tbody>
                    <tr>
                        <td class="erase" width="5%"></td>
                        <td class="display-block padding" width="40%" align="center" valign="middle">
                            <table class="text-center" align="left" border="0" cellpadding="0" cellspacing="0" width="120" style="border-collapse: collapse;">
                                <tbody>
                                    <tr>
                                        <td width="100%" height="80" align="center" valign="middle" style="line-height:1px;">
                                            <img src="images/product-1.png" width="136" height="76" alt="Product" border="0" style="display:block;">
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </td>

                        <td class="display-block padding" width="40%" align="center" valign="top">
                            <table class="text-center" align="right" border="0" cellpadding="0" cellspacing="0" width="120" style="border-collapse: collapse;">
                                <tbody>

                                    <tr>
                                        <td class="text-center" width="100%" align="right" valign="middle" style="margin:0px; padding:0px; font-size:16px; color:#000000; font-family: 'Open Sans', Helvetica, Arial, Verdana, sans-serif; font-weight:bold;">Mens shoes</td>
                                    </tr>
                                    <tr>
                                        <td width="100%" height="10"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="100%" align="right" valign="middle" style="margin:0px; padding:0px; font-size:12px; color:#000000; font-family: 'Open Sans', Helvetica, Arial, Verdana, sans-serif; font-weight:normal;">$100.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="100%" align="right" valign="middle" style="margin:0px; padding:0px; padding-top:3px; font-size:12px; color:#969696; font-family: 'Open Sans', Helvetica, Arial, Verdana, sans-serif; font-weight:normal;"><s>$150.00</s></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td class="erase" width="5%"></td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td width="100%" align="center" valign="middle">
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                <tbody>
                    <tr>
                        <td width="100%" height="22" style="line-height:1px; border-bottom:1px solid #cdcdcd;"></td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>

@endsection
