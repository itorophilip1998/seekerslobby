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
                        <h3 class="mail_header" style="font-size:16px !important;">Hello! {{$approve_fund->user->name}}</h3>
                            <p style="font-size:15px !important;">Congratulations! Your recent fund request has been approved with your ROI(returns on investment) being <span style="font-weight:bold;">&#8358;{{ number_format($user_profit, 2) }}.</span>
                            Your new wallet balance is: <span style="font-weight:bold;">&#8358;{{ number_format($approve_fund->user->accounts->balance, 2) }}.</span></p>
                            <p style="font-size:15px !important;">Thank you for choosing us.</p>
                            <p style="font-size:15px !important;">The Paddipay Team.</p>
                        <br>
                        <div class="email_link_button" style="text-align: center">

                        </div>

                    </td>
                </tr>
            </table>
@include('mails.layouts.new_mailfooter')
