@extends('admin.layouts.app')

@section('title', $albumSet->name.' Album')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Personal Album</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.personal.albums')}}">Personal Albums</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.personal.album.show',$albumSet->album->id)}}">{{$albumSet->album->name}}Personal Album</a></strong>
                </li>
                <li class="active">
                    <strong>{{$albumSet->name}}</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeIn">
        {{--    Client proof set download restrictions    --}}
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="ibox">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <br>
                                        <div class="input-group m-b">
                                            <input id="email_restriction" type="email" class="form-control input-lg">
                                            <div class="input-group-btn">
                                                <button tabindex="-1" class="btn btn-lg btn-primary btn-outline restrictToEmail" data-fid="{{$albumSet->id}}" type="button">Restrict To Email</button>
                                            </div>
                                        </div>
                                        <i>Restrict view of album set to only emails you have entered here.</i>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                                            <thead>
                                            <tr>
                                                <th>Email</th>
                                                <th width="90em" >Expiry</th>
                                                <th width="20em" class="text-right" data-sort-ignore="true">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($albumSetViewRestrictionEmails as $albumSetViewRestrictionEmail)
                                                <tr class="gradeX">
                                                    <td>{{$albumSetViewRestrictionEmail->email}}</td>
                                                    <td>{{$albumSetViewRestrictionEmail->expiry}}</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a href="{{route('admin.client.proof.set.restrict.to.specific.email.delete',$albumSetViewRestrictionEmail->id)}}" class="btn-danger btn btn-block btn-xs">Delete</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Email</th>
                                                <th>Expiry</th>
                                                <th class="text-right" data-sort-ignore="true">Action</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--    Client proof set images    --}}
        <div class="row">
            <div class="ibox">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="lightBoxGallery">
                            @isset($albumSet->album_images)
                                                @foreach($albumSet->album_images as $albumSetImage)
                                                    <a data-toggle="modal" data-target="#{{$albumSetImage->upload->id}}"><img src="{{ asset('') }}{{ $albumSetImage->upload->pixels100 }}"></a>
                                                    <div class="modal inmodal" id="{{$albumSetImage->upload->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content animated bounceInRight">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                    <h4 class="modal-title">{{$albumSetImage->upload->file_name}} Print <i class="fa fa-cogs"></i></h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="post" action="{{ route('admin.personal.album.image.update.print.status',$albumSetImage->id) }}" autocomplete="off" class="form-horizontal form-label-left">
                                                                        @csrf

                                                                        @if ($errors->any())
                                                                            <div class="alert alert-danger">
                                                                                <ul>
                                                                                    @foreach ($errors->all() as $error)
                                                                                        <li>{{ $error }}</li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </div>
                                                                        @endif
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="has-warning">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                        <input type="checkbox" name="is_download" class="js-switch_12" @if($albumSetImage->is_print === 1) checked @endif />
                                                                                        {{--  <input name="is_print" type="checkbox" class="js-switch_16" @if($albumSetImage->is_print==1) checked @endif />  --}}
                                                                                        <br>
                                                                                        <i>whether or not the image can be downloaded.</i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6">
                                                                                <div class="has-warning">
                                                                                    <div class="form-group">
                                                                                        <input name="limit" type="text" value="{{$albumSetImage->limit}}" class="form-control input-lg">
                                                                                        <i>download limit.</i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <img width="530em" src="{{ asset('') }}{{ $albumSetImage->upload->pixels500 }}">
                                                                            </div>
                                                                        </div>

                                                                        <hr>

                                                                        <div>
                                                                            <button class="btn btn-block btn-primary btn-outline btn-lg m-t-n-xs" type="submit"><strong>Update Download Settings</strong></button>
                                                                        </div>

                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endisset
                            <!-- The Gallery as lightbox dialog, should be a child element of the document body -->
                            <div id="blueimp-gallery" class="blueimp-gallery">
                                <div class="slides"></div>
                                <h3 class="title"></h3>
                                <a class="prev">‹</a>
                                <a class="next">›</a>
                                <a class="close">×</a>
                                <a class="play-pause"></a>
                                <ol class="indicator"></ol>
                            </div>
                        </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('js')
<script>
    $('.restrictToEmail').on('click',function(){
        var id = $(this).data('fid')
        var email = document.getElementById("email_restriction").value

        //send value by ajax to server
        var xhr = new XMLHttpRequest();
        xhr.open("GET", '{{url('admin/client/proof/set/restrict/to/specific')}}'+'/'+id +'/email/'+email);
        xhr.setRequestHeader('Content-Type', '');
        xhr.send();
        xhr.onload = function() {
            alert(this.responseText);
        }
        location.reload();
    });

</script>
@endsection
