@extends('admin.layouts.app')

@section('title', $albumSet->name.' Album')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Personal Album</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li class="active">
                    <a href="{{route('admin.personal.albums')}}">Personal Albums</a>
                </li>
                <li class="active">
                    <a href="{{route('admin.personal.album.show',$albumSet->album->id)}}">{{$albumSet->album->name}}Personal Album</a>
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
                                    <a href="{{ asset('') }}{{ $albumSetImage->upload->pixels1000 }}" title="{{ $albumSetImage->upload->name }}" data-fid="{{$albumSetImage->id}}" data-gallery="" ><img src="{{ asset('') }}{{ $albumSetImage->upload->pixels100 }}"></a>
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
