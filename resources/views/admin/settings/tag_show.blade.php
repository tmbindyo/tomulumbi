@extends('admin.components.main')

@section('title', $tag->name.' Tag')

@section('content')

    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                        </i>
                    </div>
                    <div>
                        <a href="#">
                            Tags
                        </a>
                    </div>
                </div>
                <div class="page-title-actions">
                    <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
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
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-inbox"></i>
                                        <span>
                                            Inbox
                                        </span>
                                        <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-book"></i>
                                        <span>
                                            Book
                                        </span>
                                        <div class="ml-auto badge badge-pill badge-danger">5</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-picture"></i>
                                        <span>
                                            Picture
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a disabled href="javascript:void(0);" class="nav-link disabled">
                                        <i class="nav-link-icon lnr-file-empty"></i>
                                        <span>
                                            File Disabled
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        {{-- tags --}}
        <div class="row">
            <div class="col-md-6">

                <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                    <li class="nav-item">
                        <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tag-update-form">
                            <span>Tag Update Form</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                            <span>Tag Image Form</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane tabs-animation fade show active" id="tag-update-form" role="tabpanel">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Tag</h5>
                                <form method="post" action="{{ route('admin.tag.update',$tag->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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

                                    <div class="position-relative form-group">
                                        <label for="name" class="">Name</label>
                                        <input name="name" id="name" value="{{$tag->name}}" type="text" class="form-control">
                                        <i>name</i>
                                    </div>

                                    <div class="position-relative form-group">
                                        <label for="thumbnail_size" class="">
                                            Thumbnail size
                                        </label>
                                        <select required="required" style="width: 100%" name="thumbnail_size" class="thumbnail-size-select form-control input-lg">
                                            <option>Select Thumbnail Size</option>
                                            @foreach($thumbnailSizes as $thumbnailSize)
                                                <option @if($tag->thumbnail_size_id == $thumbnailSize->id) selected @endif value="{{$thumbnailSize->id}}">{{$thumbnailSize->name}}</option>
                                            @endforeach
                                        </select>
                                        <i>Size of the thumbnails on the tag page</i>
                                    </div>


                                    <hr>
                                    <button type="submit" class="mt-1 btn btn-success btn-lg btn-block">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <div id="cover-image" class="tab-pane">
                                    <div class="panel-body">
                                        <div class="row m-t-lg">
                                            <div class="col-md-6 col-md-offset-3">
                                                <form method="post" action="{{ route('admin.tag.cover.image',$tag->id) }}" autocomplete="off" enctype = "multipart/form-data">
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

                                                    <div class="position-relative form-group">
                                                        <label for="name" class="">Name</label>
                                                        <input type="file" name="cover_image" class="form-control">
                                                        <i>name</i>
                                                    </div>
                                                    <hr>
                                                    <button type="submit" class="mt-1 btn btn-success btn-lg btn-block">Submit</button>
                                                </form>
                                            </div>

                                            <div class="col-md-6 col-md-offset-3">

                                                <div class="center">
                                                    <img alt="image" width="400em" class="img-responsive" @isset($tag->cover_image) src="{{ asset('') }}{{ $tag->cover_image->large_thumbnail }}" @endisset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 col-xl-6">
                        <div class="card mb-3 widget-content bg-midnight-bloom">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Creator</div>
                                    <div class="widget-subheading">{{$tag->user->name}}</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-white"><span><i class="fa fa-user fa-3x"></i></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-6">
                        <div class="card mb-3 widget-content bg-arielle-smile">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Status</div>
                                    <div class="widget-subheading">{{$tag->status->name}}</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-white"><span><i class="fa fa-ellipsis-v fa-3x"></i></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-6">
                        <div class="card mb-3 widget-content bg-grow-early">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Created</div>
                                    <div class="widget-subheading">{{$tag->created_at}}</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-white"><span><i class="fa fa-plus-square fa-3x"></i></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-6">
                        <div class="card mb-3 widget-content bg-premium-dark">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Last Updated</div>
                                    <div class="widget-subheading">{{$tag->updated_at}}</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-warning"><span><i class="fa fa-edit fa-3x"></i></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">

                    <div class="card-header">
                        <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                        Albums ({{$tag->album_tags->count()}})
                        <div class="btn-actions-pane-right">
                            <a href="{{route('admin.personal.album.create')}}" type="button" class="btn btn-primary btn-lg" ><i class="fa fa-plus"></i> Personal Album</a>
                            <a href="{{route('admin.client.proof.create')}}" type="button" class="btn btn-primary btn-lg" ><i class="fa fa-plus"></i> Client Proof </a>
                        </div>
                    </div>

                        <div class="card-body"><h5 class="card-title">Albums</h5>
                            <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Views</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th width="13em">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tagAlbums as $tagAlbum)
                                        <tr>
                                            <td>{{$tagAlbum->date}}</td>
                                            <td>{{$tagAlbum->name}}</td>
                                            <td>{{$tagAlbum->views}}</td>
                                            <td>{{$tagAlbum->user->name}}</td>

                                            <td>
                                                <span class="label {{$tagAlbum->status->label}}">{{$tagAlbum->status->name}}</span>
                                            </td>

                                            <td class="text-right">
                                                <div class="btn-group">
                                                    @if($tagAlbum->album_type_id == "ca64a5e0-d39b-4f2c-a136-9c523d935ea4")
                                                        <a href="{{ route('admin.client.proof.show', $tagAlbum->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                    @elseif($tagAlbum->album_type_id == "6fdf4858-01ce-43ff-bbe6-827f09fa1cef")
                                                        <a href="{{ route('admin.personal.album.show', $tagAlbum->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Views</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th width="13em">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    <div class="card-footer">Footer</div>
                </div>
            </div>
        </div>
        {{-- action types --}}

    </div>

@endsection
