@extends('email_templates.layouts.app')

@section('title', $tomorrow."'s To Dos")


@section('body')
    <tr>
        <td width="100%" height="21" style="line-height:1px;"></td>
    </tr>
    {{--  starting to dos  --}}
    <tr>
        <td width="100%" align="center" valign="middle" style="margin:0px; padding:0px; font-size:18px; color:#000000; font-family: 'Open Sans', Helvetica, Arial, Verdana, sans-serif; font-weight:italics; text-transform:uppercase;">Starting To Dos</td>
    </tr>
    <tr>
        <td width="100%" align="center" valign="middle">
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                <tbody>
                    <br>
                    @foreach($startingToDos as $startingToDo)
                        <tr>
                            <td class="erase" width="5%"></td>
                            <tr>
                                <td width="100%" align="left" valign="middle" style="margin:0px; padding:0px; font-size:18px; color:#000000; font-family: 'Open Sans', Helvetica, Arial, Verdana, sans-serif; font-weight:bold;">{{$startingToDo->name}}</td>
                            </tr>

                             <tr>
                                <td width="100%" height="17" style="line-height:1px;"></td>
                            </tr>
                           <tr>
                                <td width="100%" align="left" valign="middle"  style="margin:0px; padding:0px; font-size:12px; color:#000000; font-family: 'Open Sans', Helvetica, Arial, Verdana, sans-serif; font-weight:normal; line-height:24px;">{{$startingToDo->notes}}.</td>
                            </tr>
                            <td class="erase" width="5%"></td>
                        </tr>
                    <br>
                    @endforeach
                </tbody>
            </table>
        </td>
    </tr>
    {{$ongoingToDos}}
    @if($ongoingToDos)
        <tr>
            <td class="display-block padding" width="100%" height="31" style="line-height:1px;"></td>
        </tr>
        {{--  ongoing to dos  --}}
        <tr>
            <td width="100%" height="22" style="line-height:1px; border-bottom:1px solid #cdcdcd;"></td>
        </tr>
        <tr>
            <td width="100%" align="center" valign="middle" style="margin:0px; padding:0px; font-size:18px; color:#000000; font-family: 'Open Sans', Helvetica, Arial, Verdana, sans-serif; font-weight:italics; text-transform:uppercase;">Ongoing To Dos</td>
        </tr>
        <tr>
            <td width="100%" align="center" valign="middle">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                    <tbody>
                        <br>
                        @foreach($ongoingToDos as $startingToDo)
                            <tr>
                                <td class="erase" width="5%"></td>
                                <tr>
                                    <td width="100%" align="left" valign="middle" style="margin:0px; padding:0px; font-size:18px; color:#000000; font-family: 'Open Sans', Helvetica, Arial, Verdana, sans-serif; font-weight:bold;">{{$startingToDo->name}}</td>
                                </tr>

                                <tr>
                                    <td width="100%" height="17" style="line-height:1px;"></td>
                                </tr>
                            <tr>
                                    <td width="100%" align="left" valign="middle"  style="margin:0px; padding:0px; font-size:12px; color:#000000; font-family: 'Open Sans', Helvetica, Arial, Verdana, sans-serif; font-weight:normal; line-height:24px;">{{$startingToDo->notes}}.</td>
                                </tr>
                                <td class="erase" width="5%"></td>
                            </tr>
                        <br>
                        @endforeach
                    </tbody>
                </table>
            </td>
        </tr>
    @endif


    @if($endingToDos)
        <tr>
            <td class="display-block padding" width="100%" height="31" style="line-height:1px;"></td>
        </tr>
        {{--  ending to dos  --}}
        <tr>
            <td width="100%" height="22" style="line-height:1px; border-bottom:1px solid #cdcdcd;"></td>
        </tr>
        <tr>
            <td width="100%" align="center" valign="middle" style="margin:0px; padding:0px; font-size:18px; color:#000000; font-family: 'Open Sans', Helvetica, Arial, Verdana, sans-serif; font-weight:italics; text-transform:uppercase;">Ending To Dos</td>
        </tr>
        <tr>
            <td width="100%" align="center" valign="middle">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                    <tbody>
                        <br>
                        @foreach($endingToDos as $startingToDo)
                            <tr>
                                <td class="erase" width="5%"></td>
                                <tr>
                                    <td width="100%" align="center" valign="middle" style="margin:0px; padding:0px; font-size:16px; color:#000000; font-family: 'Open Sans', Helvetica, Arial, Verdana, sans-serif; font-weight:bold; text-transform:uppercase;">18 July 2018</td>
                                </tr>
                                <tr>
                                    <td width="100%" align="left" valign="middle" style="margin:0px; padding:0px; font-size:18px; color:#000000; font-family: 'Open Sans', Helvetica, Arial, Verdana, sans-serif; font-weight:bold;">{{$startingToDo->name}}</td>
                                </tr>

                                <tr>
                                    <td width="100%" height="17" style="line-height:1px;"></td>
                                </tr>
                            <tr>
                                    <td width="100%" align="left" valign="middle"  style="margin:0px; padding:0px; font-size:12px; color:#000000; font-family: 'Open Sans', Helvetica, Arial, Verdana, sans-serif; font-weight:normal; line-height:24px;">{{$startingToDo->notes}}.</td>
                                </tr>
                                <td class="erase" width="5%"></td>
                            </tr>
                        <br>
                        @endforeach
                    </tbody>
                </table>
            </td>
        </tr>
    @endif

@endsection
