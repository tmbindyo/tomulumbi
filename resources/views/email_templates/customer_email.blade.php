@extends('email_templates.layouts.app')

@section('title', 'Email Notification')

@section('body')
    <tr>
        <td width="100%" align="center" valign="middle" style="margin:0px; padding:0px; font-size:12px; color:#000000; font-family: 'Open Sans', Helvetica, Arial, Verdana, sans-serif; font-weight:normal; line-height:24px;">You have received an email from <br>{{$email->email}} <br> titled: {{$email->subject}}</td>
    </tr>
    <tr>
        <td width="100%" height="18" style="line-height:1px;"></td>
    </tr>
    <tr>
        <td width="100%" align="center" valign="middle" style="margin:0px; padding:0px; font-size:14px; color:#000000; font-family: 'Open Sans', Helvetica, Arial, Verdana, sans-serif; font-weight:bold;">{{$email->created_at}}</td>
    </tr>
    <tr>
        <td class="display-block padding" width="100%" height="24" style="line-height:1px;"></td>
    </tr>
    <tr>
        <td width="100%" align="center" valign="middle">
            <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; -webkit-border-radius:30px; border-radius:30px;" bgcolor="#ffce00">
                <tbody>
                    <tr>
                        <td align="center" style="margin:0px; padding:6px 25px; font-size: 16px; color:#FFFFFF; font-family: 'Open Sans', Helvetica, Arial, Verdana, sans-serif; font-weight:bold; text-transform:uppercase;">
                            <a href="https://www.tomulumbi.com/admin/email/show/{{$email->id}}" target="_blank" style="width:100%; color:#FFFFFF; font-family: 'Open Sans', Helvetica, Arial, Verdana, sans-serif; text-decoration:none; display:block;">View Now</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
@endsection
