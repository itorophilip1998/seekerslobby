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
                                        <td align="center" valign="top" class="desktop">
                                        <tr>
                                            <td style="text-align:left; font-weight:600">
                                                <h3>Hi {{$device->user->first_name}}</h3>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td colspan="6">Your account has just been signed in another device </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Device Details
                                            </td>
                                        </tr>
                                        <tr style="font-size: .9em; color: grey; ">
                                            <td style="padding: 10px 0">Device </td>
                                            <td>{{$device->name.' '.$device->model}}</td>
                                        </tr>
                                        <tr style="font-size: .9em; color: grey;">
                                            <td>Time</td>
                                            <td>{{$device->created_at->format('l, F D, Y h:i a')}}</td>
                                        </tr>
                                        <tr>
                                        </tr>

                                        </td>
                                    </tr>
                                </table>
@include('mails.layouts.new_mailfooter')