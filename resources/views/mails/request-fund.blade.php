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
                        <h3 class="mail_header" style="font-size:16px !important;">Hello! {{$requestfund->user->name}}</h3>
                            <p style="font-size:15px !important;">We are notifying you to let you know that you just requested 
                            for funds from your recent investment that has just been due.</p>
                            <p style="font-size:15px !important;">Our admins will review your request and upon approval, you will be paid as soon as possible</p>
                            <p style="font-size:15px !important;">Sincerely,</p>
                            <p style="font-size:15px !important;">The Paddipay Team.</p>
                        <br>
                        <div class="email_link_button" style="text-align: center">

                        </div>

                    </td>
                </tr>
            </table>
@include('mails.layouts.new_mailfooter')
