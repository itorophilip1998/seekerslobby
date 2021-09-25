@extends('mails.layouts.mailstyles')
@include('mails.layouts.base')
<table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper" bgcolor="#FFFFFF">
    <tr>
        <td height="15" style="font-size:10px; line-height:10px;">&nbsp;</td>
    </tr>
    <tr>
        <td align="center" valign="top">

            <table width="500" cellpadding="0" cellspacing="0" border="0" class="container">
                <tr>
                    <td align="left" valign="top" class="desktop">
                    <h3 class="mail_header">Hello! {{$investment->user->name}}</h3>
                            <p>We are pleased to inform you that your investment in <span style="font-weight:bold">{{$package->package_name}}</span> package is completed. 
                            <span style="font-weight:bold">{{$package->package_name}}</span></p>
                            <p style="font-size:15px !important;">Your funds have been deposited into your Paddipay wallet and can be withdrawn
                                into your Bank account.</p>
                            <p style="font-size:15px !important;">Sincerely,</p>
                            <p style="font-size:15px !important;">The Paddipay Team.</p>
                        <br>
                        <div class="email_link_button" style="text-align: center">

                        </div>

                    </td>
                </tr>
            </table>
@include('mails.layouts.new_mailfooter')
