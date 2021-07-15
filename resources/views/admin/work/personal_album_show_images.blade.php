@extends('admin.components.main')

@section('title', 'Personal Album '.$album->name.' Images')

@section('css')
    <link href="{{ asset('inspinia') }}/css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/css/plugins/dropzone/dropzone.css" rel="stylesheet">
    <!-- lightgallery -->
    <link type="text/css" rel="stylesheet" href="{{ asset('inspinia') }}/lightgallery/dist/css/lightgallery.css" />
    <!-- lightgallery plugins -->
    <link type="text/css" rel="stylesheet" href="{{ asset('inspinia') }}/lightgallery/dist/css/lg-zoom.css" />
    <link type="text/css" rel="stylesheet" href="{{ asset('inspinia') }}/lightgallery/dist/css/lg-thumbnail.css" />
    <link type="text/css" rel="stylesheet" href="{{ asset('inspinia') }}/lightgallery/dist/css/lg-fullscreen.css" />
@endsection

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-graph icon-gradient bg-ripe-malin"></i>
                </div>
                <div>Personal Album {{$album->name}} Images
                    {{-- <div class="page-title-subheading">Examples of just how powerful ArchitectUI really is!</div> --}}
                </div>
            </div>
            <div class="page-title-actions">
                <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"
                    class="btn-shadow mr-3 btn btn-dark">
                    <i class="fa fa-star"></i>
                </button>
                <div class="d-inline-block dropdown">
                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-business-time fa-w-20"></i>
                        </span>
                        Buttons
                    </button>
                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link">
                                    <i class="nav-link-icon lnr-inbox"></i>
                                    <span> Inbox</span>
                                    <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    <i class="nav-link-icon lnr-book"></i>
                                    <span> Book</span>
                                    <div class="ml-auto badge badge-pill badge-danger">5</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    <i class="nav-link-icon lnr-picture"></i>
                                    <span> Picture</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a disabled class="nav-link disabled">
                                    <i class="nav-link-icon lnr-file-empty"></i>
                                    <span> File Disabled</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <a href="{{ route('admin.personal.album.show', $album->id) }}" class="btn btn-lg btn-primary">View</a>
                </div>
            </div>
        </div>
    </div>

    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Album Images</h5>
            <ul class="nav nav-pills">
                @foreach($albumSets as $albumSet)
                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg13-{{$loop->index}}" class="@if($loop->iteration == 1) active @endif nav-link">{{$albumSet->name}} ({{$albumSet->album_images->count()}})</a></li>
                @endforeach
            </ul>
            <div class="tab-content">
                @foreach($albumSets as $albumSet)
                    <div class="tab-pane @if($loop->iteration == 1) active @endif" id="tab-eg13-{{$loop->index}}" role="tabpanel">
                        <form id="my-awesome-dropzone-{{$loop->index}}" class="dropzone" action="{{route('admin.personal.album.set.image.upload',$albumSet->id)}}">
                            @csrf
                            <div class="dropzone-previews"></div>
                        </form>

                        <br>

                        @isset($albumSet->album_images)
                            <div id="lightgallery">
                                @foreach($albumSet->album_images as $albumSetImage)
                                    {{-- {{$albumSetImage}} --}}
                                    <a href="{{Minio::getAdminFileUrl( $albumSetImage->upload->pixels1500 )}}" data-lg-size="1600-2400">
                                        <img alt="{{ $albumSetImage->upload->name }}" src="{{Minio::getAdminFileUrl( $albumSetImage->upload->pixels100 )}}" />
                                    </a>
                                @endforeach
                            </div>
                        @endisset

                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>


@endsection


@section('js')
    <script src="{{ asset('inspinia') }}/lightgallery/dist/lightgallery.umd.js"></script>
    <!-- Or use the minified version -->
    {{-- <script src="{{ asset('inspinia') }}/lightgallery/dist/lightgallery.min.js"></script> --}}

    <!-- lightgallery plugins -->
    <script src="{{ asset('inspinia') }}/lightgallery/dist/plugins/thumbnail/lg-thumbnail.umd.js"></script>
    <script src="{{ asset('inspinia') }}/lightgallery/dist/plugins/zoom/lg-zoom.umd.js"></script>
    <script src="{{ asset('inspinia') }}/lightgallery/dist/plugins/fullscreen/lg-fullscreen.umd.js"></script>
    <script type="text/javascript">
        lightGallery(document.getElementById('lightgallery'), {
            plugins: [lgZoom, lgThumbnail, lgFullscreen],
            speed: 500,
        });
    </script>

    <!-- DROPZONE -->
    <script src="{{ asset('inspinia') }}/js/plugins/dropzone/dropzone.js"></script>
    {{--  dropzone  --}}
    <script>
        $(document).ready(function(){

            Dropzone.options.dropzone =
                {
                    maxFilesize: 12,
                    renameFile: function(file) {
                        var dt = new Date();
                        var time = dt.getTime();
                        return time+file.name;
                    },
                    addRemoveLinks: true,
                    timeout: 50000,
                    removedfile: function(file)
                    {
                        var name = file.upload.filename;
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                            type: 'POST',
                            url: '{{ url("image/delete") }}',
                            data: {filename: name},
                            success: function (data){
                                console.log("File has been successfully removed!!");
                            },
                            error: function(e) {
                                console.log(e);
                            }});
                        var fileRef;
                        return (fileRef = file.previewElement) != null ?
                            fileRef.parentNode.removeChild(file.previewElement) : void 0;
                    },

                    success: function(file, response)
                    {
                        console.log(response);
                    },
                    error: function(file, response)
                    {
                        return false;
                    }
                };
        });
    </script>
@endsection
