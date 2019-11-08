@extends('admin.layouts.app')

@section('title', $album->name.' Album')

@section('css')
    <link href="{{ asset('inspinia') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/css/style.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <!-- Data picker -->
    <script src="{{ asset('inspinia') }}/js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <link href="{{ asset('inspinia') }}/css/plugins/chosen/chosen.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/css/plugins/dropzone/dropzone.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/switchery/switchery.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/chosen/chosen.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/select2/select2.min.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">

@endsection


@section('content')

    <div class="wrapper wrapper-content animated fadeIn">

            {{--    Client proof images    --}}
            <div class="row m-t-lg">
                <div class="col-lg-12 col-md-12">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-3"> <i class="fa fa-image"> Album Sets</i></a></li>
                            @foreach($albumSets as $albumSet)
                                <li class=""><a data-toggle="tab" href="#{{$albumSet->id}}"><i class="fa fa-desktop"> {{$albumSet->name}}</i></a></li>
                            @endforeach
                            <li class=""><a  data-toggle="modal" data-target="#albumSetRegistration" aria-expanded="false"><i class="fa fa-plus"></i></a></li>
                        </ul>
                        <div class="row">
                            <div class="tab-content">
                                <div id="tab-3" class="tab-pane active">
                                    <div class="panel-body">
                                        <strong>Album sets</strong>

                                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of
                                            existence in this spot, which was created for the bliss of souls like mine.</p>

                                        <p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at
                                            the present moment; and yet I feel that I never was a greater artist than now. When.</p>
                                    </div>
                                </div>

                                @foreach($albumSets as $albumSet)
                                    <div id="{{$albumSet->id}}" class="tab-pane">
                                        <div class="panel-body">

                                            <div class="lightBoxGallery">

                                                @isset($albumSet->album_images)
                                                    @foreach($albumSet->album_images as $albumSetImage)
                                                        <a href="{{ asset('') }}{{ $albumSetImage->upload->large }}" title="{{ $albumSetImage->upload->name }}" data-gallery=""><img src="{{ asset('') }}{{ $albumSetImage->upload->small }}"></a>
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

                                            <form id="my-awesome-dropzone" class="dropzone" action="{{route('admin.client.proof.set.image.upload',$albumSet->id)}}">
                                                @csrf
                                                <div class="dropzone-previews"></div>
                                            </form>

                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="row">



                        </div>
                    </div>
                </div>
            </div>


            {{--    Client proof settings    --}}
            <div class="row m-t-lg">
                <div class="col-lg-12 col-md-12">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#collection_settings"> <i class="fa fa-cogs"></i> Collection Settings</a></li>
                            <li class=""><a data-toggle="tab" href="#design"><i class="fa fa-bookmark"></i> Design</a></li>
                            <li class=""><a data-toggle="tab" href="#privacy"><i class="fa fa-lock"></i> Privacy</a></li>
                            <li class=""><a data-toggle="tab" href="#download"><i class="fa fa-download"></i> Download</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="collection_settings" class="tab-pane active">
                                <div class="panel-body">
                                    <div class="col-md-10 col-md-offset-1">

                                        <form method="post" action="{{ route('admin.client.proof.update.collection.settings',$album->id) }}" autocomplete="off">
                                            @csrf

                                            @if (session('status'))
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    {{ session('status') }}
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @endif

                                            <div class="form-group">
                                                <label>Collection Name</label>
                                                <input name="name" type="text" value="{{$album->name}}" class="form-control input-lg">
                                                <i>Pick something short and sweet. Imagine choosing a title for a photo album cover.</i>
                                            </div>

                                            <div class="form-group" id="data_1">
                                                <label>Event Date</label>
                                                <div class="input-group date">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    <input type="text" name="date" class="form-control input-lg" value="{{date("m/d/Y", strtotime($album->date))}}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">Status</label>
                                                <select class="form-control m-b input-lg" name="status">
                                                    @foreach($albumStatuses as $albumStatus)
                                                        <option value="{{$albumStatus->id}}" @if($albumStatus->id === $album->status_id) selected @endif>{{$albumStatus->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i>You can take the collection online/offline quickly. Hidden collections can only be seen by you.</i>
                                            </div>

                                            <div class="form-group">
                                                <label>Tags</label>
                                                <div class="input-group">
                                                    <select name="tags[]" data-placeholder="Choose Tags:" class="chosen-select form-control-lg" multiple="multiple" style="width:450px;" tabindex="4">
                                                        @foreach($tags as $tag)
                                                            <option value="{{$tag->id}}" @foreach($albumTags as $albumTag) @if($tag->id === $albumTag->tag->id) selected @endif @endforeach >{{$tag->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group" id="data_1">
                                                <label>Expiry Date</label>
                                                <div class="input-group date">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    <input type="text" name="expiry_date" class="form-control input-lg" value="{{date("m/d/Y", strtotime($album->expiry_date))}}">
                                                </div>
                                            </div>

                                            <hr>

                                            <div>
                                                <button class="btn btn-block btn-primary btn-outline btn-lg m-t-n-xs" type="submit"><strong>Update Collection Settings</strong></button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="design" class="tab-pane">
                                <div class="panel-body">
                                    <div class="row m-t-lg">
                                        <div class="col-md-6">
                                            <h2 class="text-center">Album Images Design</h2>
                                            <hr>
                                            <form method="post" action="{{ route('admin.client.proof.update.design',$album->id) }}" autocomplete="off" enctype = "multipart/form-data">
                                                @csrf
                                                {{--  Album typography  --}}
                                                <div class="col-md-10 col-md-offset-1">
                                                    <h3 class="text-center">Typography</h3>
                                                    <div class="form-group">
                                                        <select class="form-control m-b input-lg" name="typography">
                                                            @foreach($typographies as $typography)
                                                                <option value="{{$typography->id}}" @if($typography->id === $album->typography_id) selected @endif>{{$typography->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <i>Choose between different typography styles to best compliment the proof.</i>
                                                    </div>
                                                </div>
                                                {{--  Album thumbnail size  --}}
                                                <div class="col-md-10 col-md-offset-1">
                                                    <h4 class="text-center">Thumbnail Size</h4>
                                                    <div class="form-group">
                                                        <select class="form-control m-b input-lg" name="thumbnail_size" required>
                                                            @foreach($thumbnailSizes as $thumbnailSize)
                                                                <option value="{{$thumbnailSize->id}}" @if($thumbnailSize->id === $album->thumbnail_size_id) selected @endif>{{$thumbnailSize->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <i>Adjust the display size of photos in the gallery.</i>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-lg btn-primary btn-outline btn-block">Update Album Images Design Settings</button>
                                            </form>
                                            <hr>
                                            {{--  Cover Image  --}}
                                            <div class="col-md-12">
                                                <h2 class="text-center">Cover Image</h2>
                                                <button class="btn btn-primary btn-lg btn-outline btn-block" data-toggle="modal" data-target="#albumCoverImageRegistration" aria-expanded="false">Update Cover Image</button>
                                                <br>
                                            </div>
                                            <div class="col-md-10 col-md-offset-1">

                                                <div class="center">
                                                    <img alt="image" class="img-responsive" @isset($album->cover_image) src="{{ asset('') }}{{ $album->cover_image->large_thumbnail }}" @endisset>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-md-6">
                                            <h2 class="text-center">Cover Image Design</h2>
                                            <hr>
                                            <form method="post" action="{{ route('admin.client.proof.update.cover.image.design',$album->id) }}" autocomplete="off" enctype = "multipart/form-data">
                                                @csrf
                                                {{--  Cover Image Designs  --}}
                                                <div class="col-md-10 col-md-offset-1">
                                                    <h3 class="text-center">Design</h3>
                                                    <div class="form-group">
                                                        <select class="form-control m-b input-lg" name="cover_design" required>
                                                            @foreach($coverDesigns as $coverDesign)
                                                                <option value="{{$coverDesign->id}}" @if($coverDesign->id === $album->cover_design_id) selected @endif>{{$coverDesign->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <i>Choose between different typography styles to best compliment the proof.</i>
                                                    </div>
                                                </div>
                                                {{--  Cover Image scheme  --}}
                                                <div class="col-md-10 col-md-offset-1">
                                                    <h3 class="text-center">Scheme</h3>
                                                    <div class="form-group">
                                                        <select class="form-control m-b input-lg" name="scheme" required>
                                                            @foreach($schemes as $scheme)
                                                                <option value="{{$scheme->id}}" @if($scheme->id === $album->scheme_id) selected @endif>{{$scheme->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <i>Choose between different scheme styles to best compliment the proof.</i>
                                                    </div>
                                                </div>
                                                {{--  Cover Image Color  --}}
                                                <div class="col-md-10 col-md-offset-1">
                                                    <h3 class="text-center">Color</h3>
                                                    <div class="form-group">
                                                        <select class="form-control m-b input-lg" name="color" required>
                                                            @foreach($colors as $color)
                                                                <option value="{{$color->id}}" @if($color->id === $album->color_id) selected @endif>{{$color->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <i>Choose between different color styles to best compliment the proof.</i>
                                                    </div>
                                                </div>
                                                {{--  Cover Image Orientations  --}}
                                                <div class="col-md-10 col-md-offset-1">
                                                    <h3 class="text-center">Orientation</h3>
                                                    <div class="form-group">
                                                        <select class="form-control m-b input-lg" name="orientation" required>
                                                            @foreach($orientations as $orientation)
                                                                <option value="{{$orientation->id}}" @if($orientation->id === $album->orientation_id) selected @endif>{{$orientation->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <i>Choose between different orientation styles to best compliment the proof.</i>
                                                    </div>
                                                </div>
                                                {{--  Cover Image Content alignment  --}}
                                                <div class="col-md-10 col-md-offset-1">
                                                    <h3 class="text-center">Content Alignment</h3>

                                                    <div class="form-group">
                                                        <select class="form-control m-b input-lg" name="content_align" required>
                                                            @foreach($contentAligns as $contentAlign)
                                                                <option value="{{$contentAlign->id}}" @if($contentAlign->id === $album->content_align_id) selected @endif>{{$contentAlign->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <i>Choose between different content alignment styles to best compliment the proof.</i>
                                                    </div>
                                                </div>
                                                {{--  Cover Image position  --}}
                                                <div class="col-md-10 col-md-offset-1">
                                                    <h3 class="text-center">Image Position</h3>
                                                    <div class="form-group">
                                                        <select class="form-control m-b input-lg" name="image_position" required>
                                                            @foreach($imagePositions as $imagePosition)
                                                                <option value="{{$imagePosition->id}}" @if($imagePosition->id === $album->image_position_id) selected @endif>{{$imagePosition->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <i>Choose between different content alignment styles to best compliment the proof.</i>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-lg btn-primary btn-outline btn-block">Update Design Settings</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="privacy" class="tab-pane">
                                <div class="panel-body">
                                    <form method="post" action="{{ route('admin.client.proof.update.privacy',$album->id) }}" autocomplete="off">
                                        @csrf

                                        <div class="col-md-10 col-md-offset-1">

                                            <div class="form-group">
                                                <label>Password</label>
                                                <div class="input-group m-b">
                                                    <input name="album_password" id="album_password" type="text" value="{{$album->password}}" class="form-control input-lg" required>
                                                    <div class="input-group-btn">
                                                        <button tabindex="-1" class="btn btn-lg btn-primary btn-outline generateAlbumPassword" data-fid="{{$album->id}}" type="button">Generate Password</button>
                                                    </div>
                                                </div>
                                                <i>Leave blank to make this collection public. Setting a password will require all guests to use this password in order to see the collection.</i>
                                            </div>

                                            <div class="form-group">
                                                <p>
                                                    Homepage visibility
                                                </p>
                                                <input type="checkbox" name="is_homepage_visible" class="js-switch_2" @if($album->is_homepage_visible === 1) checked @endif />
                                                <i>Show or hide your collection in the Homepage area.</i>
                                            </div>

                                            <div class="form-group">
                                                <p>
                                                    Client Exclusive Access
                                                </p>
                                                <input type="checkbox" name="is_client_exclusive_access" class="js-switch_3" @if($album->is_client_exclusive_access === 1) checked @endif />
                                                <i>Turn on to have the abilty to make selected photo sets client-only and to give your clients the ability to mark photos private. </i>
                                            </div>

                                            <div class="form-group">
                                                <label>Client Exclusive Access Password</label>
                                                <div class="input-group m-b">
                                                    <input name="client_exclusive_access_password" id="client_exclusive_access_password" type="text" value="{{$album->client_access_password}}" class="form-control input-lg" required>
                                                    <div class="input-group-btn">
                                                        <button tabindex="-1" class="btn btn-lg btn-primary btn-outline generateClientExclusiveAccessPassword" data-fid="{{$album->id}}" type="button">Generate Client Exclusive Access Password</button>
                                                    </div>
                                                </div>
                                                <i>Turn on to have the abilty to make selected photo sets client-only and to give your clients the ability to mark photos private. </i>
                                            </div>

                                            <div class="form-group">
                                                <label>Photo Sets Visibility</label>
                                            </div>

                                            @foreach($albumSets as $albumSet)

                                                <div class="form-group">
                                                    <div class="checkbox">
                                                        <input class="updateAlbumSetVisibility" data-fid="{{$albumSet->id}}" id="checkbox1" @if($albumSet->is_client_exclusive_access === 1) checked @endif type="checkbox">
                                                        <label for="checkbox1">
                                                            {{$albumSet->name}}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <i>Make selected photo sets private so only your clients have access. Regular guests can only see public sets.</i>

                                            <div class="form-group">
                                                <p>
                                                    Allow Clients to Mark Photos Private
                                                </p>
                                                <input type="checkbox" name="is_client_make_private" class="js-switch_4" @if($album->is_client_make_private === 1) checked @endif />
                                                <i>Give clients the ability to mark photos private. Private photos are not visible to public guests and only clients can see them. </i>
                                            </div>

                                            <hr>

                                            <div>
                                                <button class="btn btn-block btn-outline btn-primary btn-lg m-t-n-xs" type="submit"><strong>Update Privacy Settings</strong></button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div id="download" class="tab-pane">
                                <div class="panel-body">
                                    <form method="post" action="{{ route('admin.client.proof.update.download',$album->id) }}" autocomplete="off">
                                        @csrf
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="container-fluid">

                                                <div class="row">
                                                    <div class="form-group">
                                                        <p>
                                                            Download Status
                                                        </p>
                                                        <input type="checkbox" name="is_download" class="js-switch" @if($album->is_download === 1) checked @endif />
                                                        <br>
                                                        <i>Turn on to allow your clients to download photos from this Collection.</i>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group">
                                                        <label>Download Pin</label>
                                                        <div class="input-group m-b">
                                                            <input name="download_pin" id="download_pin" type="number" value="{{$album->download_pin}}" class="form-control input-lg" required>
                                                            <div class="input-group-btn">
                                                                <button tabindex="-1" class="btn btn-lg btn-primary btn-outline generateAlbumPin" data-fid="{{$album->id}}" type="button">Generate Pin</button>
                                                            </div>
                                                        </div>
                                                        <i>Your clients will be required to input this download pin to download photos.</i>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group">
                                                        <label>Limit Total Number of Gallery Downloads</label>
                                                        <input type="number" name="download_restriction_limit" value="{{$album->download_restriction_limit}}" class="form-control input-lg">
                                                        <i>Limit the number of times this PIN can be used for Gallery Download. This does not apply to Single Photo download. If Email Restriction is on, each email can use the PIN up to the Download Limit.</i>
                                                    </div>
                                                </div>

                                                <br>
                                                <div>
                                                    <button class="btn btn-block btn-primary btn-outline btn-lg m-t-n-xs" type="submit"><strong>Update Download Settings</strong></button>
                                                </div>
                                                <br>
                                                <hr>

                                                <div class="form-group">
                                                    <label>Restrict Download for Photo Sets</label>
                                                </div>
                                                @foreach($albumSets as $albumSet)
                                                    <div class="form-group">
                                                        <div class="checkbox">
                                                            <input class="updateAlbumSetDownload" data-fid="{{$albumSet->id}}" id="checkbox1" @if($albumSet->is_email_download_restrict === 1) checked @endif type="checkbox">
                                                            <label for="checkbox1">
                                                                {{$albumSet->name}}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <i>Disable download for specific photo sets in the collection. This applies to both Gallery Download and Single Photo Download. </i>

                                                <br>
                                                <hr>

                                                <div class="row">
                                                    <div class="form-group">
                                                        <label>Restrict To Specific Emails</label>
                                                        <div class="input-group m-b">
                                                            <input id="email_restriction" type="email" class="form-control input-lg">
                                                            <div class="input-group-btn">
                                                                <button tabindex="-1" class="btn btn-lg btn-primary btn-outline restrictToEmail" data-fid="{{$album->id}}" type="button">Restrict To Email</button>
                                                            </div>
                                                        </div>
                                                        <i>Restrict download to only emails you have entered here.</i>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="ibox-content">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                <thead>
                                                                <tr>
                                                                    <th>Email</th>
                                                                    <th class="text-right" data-sort-ignore="true">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($albumDownloadRestrictionEmails as $albumDownloadRestrictionEmail)
                                                                    <tr class="gradeX">
                                                                        <td>{{$albumDownloadRestrictionEmail->email}}</td>
                                                                        <td class="text-center">
                                                                            <div class="btn-group">
                                                                                <a href="{{route('admin.client.proof.restrict.to.specific.email.delete',$albumDownloadRestrictionEmail->id)}}" class="btn-danger btn btn-block btn-xs">Delete</a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                <tr>
                                                                    <th>Email</th>
                                                                    <th class="text-right" data-sort-ignore="true">Action</th>
                                                                </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>

                                                    </div>

                                                </div>

                                                <hr>

                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            {{--    To Do's    --}}
            <div class="row m-t-lg">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>To Do's</h5>
                            <div class="ibox-tools">
                                <a data-toggle="modal" data-target="#toDoRegistration" class="btn btn-success btn-round btn-outline"> <span class="fa fa-plus"></span> New</a>
                            </div>
                        </div>
                        <div class="">
                            <ul class="pending-to-do">
                                @foreach($pendingToDos as $pendingToDo)
                                    <li>
                                        <div>
                                            <small>{{$pendingToDo->due_date}}</small>
                                            <h4>{{$pendingToDo->name}}</h4>
                                            <p>{{$pendingToDo->notes}}.</p>
                                            @if($pendingToDo->is_album === 1)
                                                <p><span class="badge badge-primary">{{$pendingToDo->album->name}}</span></p>
                                            @endif
                                            <a href="{{route('admin.to.do.set.in.progress',$pendingToDo->id)}}"><i class="fa fa-arrow-circle-o-right "></i></a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            <ul class="in-progress-to-do">
                                @foreach($inProgressToDos as $inProgressToDo)
                                    <li>
                                        <div>
                                            <small>{{$inProgressToDo->due_date}}</small>
                                            <h4>{{$inProgressToDo->name}}</h4>
                                            <p>{{$inProgressToDo->notes}}.</p>
                                            @if($inProgressToDo->is_album === 1)
                                                <p><span class="badge badge-primary">{{$inProgressToDo->album->name}}</span></p>
                                            @endif
                                            <a href="{{route('admin.to.do.set.completed',$inProgressToDo->id)}}"><i class="fa fa-check "></i></a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <ul class="overdue-to-do">
                                @foreach($overdueToDos as $overdueToDo)
                                    <li>
                                        <div>
                                            <small>{{$overdueToDo->due_date}}</small>
                                            <h4>{{$overdueToDo->name}}</h4>
                                            <p>{{$overdueToDo->notes}}.</p>
                                            @if($overdueToDo->is_album === 1)
                                                <p><span class="badge badge-primary">{{$overdueToDo->album->name}}</span></p>
                                            @endif
                                            @if($overdueToDo->status->name === "Pending")
                                                <a href="{{route('admin.to.do.set.completed',$overdueToDo->id)}}"><i class="fa fa-check-double "></i></a>
                                            @elseif($overdueToDo->status->name === "In progress")
                                                <a href="{{route('admin.to.do.set.completed',$overdueToDo->id)}}"><i class="fa fa-check-double "></i></a>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <ul class="completed-to-do">
                                @foreach($completedToDos as $completedToDo)
                                    <li>
                                        <div>
                                            <small>{{$completedToDo->due_date}}</small>
                                            <h4>{{$completedToDo->name}}</h4>
                                            <p>{{$completedToDo->notes}}.</p>
                                            @if($completedToDo->is_album === 1)
                                                <p><span class="badge badge-primary">{{$completedToDo->album->name}}</span></p>
                                            @endif
                                            <a href="{{route('admin.to.do.delete',$completedToDo->id)}}"><i class="fa fa-trash-o "></i></a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection

@include('admin.layouts.modals.client_proof_set')
@include('admin.layouts.modals.client_proof_to_do')
@include('admin.layouts.modals.client_proof_cover_image')

@section('js')

    <!-- Mainly scripts -->
    <script src="{{ asset('inspinia') }}/js/jquery-2.1.1.js"></script>
    <script src="{{ asset('inspinia') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('inspinia') }}/js/inspinia.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/pace/pace.min.js"></script>

    <!-- Chosen -->
    <script src="{{ asset('inspinia') }}/js/plugins/chosen/chosen.jquery.js"></script>

    <!-- blueimp gallery -->
    <script src="{{ asset('inspinia') }}/js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>

    <!-- DROPZONE -->
    <script src="{{ asset('inspinia') }}/js/plugins/dropzone/dropzone.js"></script>

    <!-- Switchery -->
    <script src="{{ asset('inspinia') }}/js/plugins/switchery/switchery.js"></script>

    <!-- Image cropper -->
    <script src="{{ asset('inspinia') }}/js/plugins/cropper/cropper.min.js"></script>

    <!-- Data picker -->
    <script src="{{ asset('inspinia') }}/js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="{{ asset('inspinia') }}/js/plugins/fullcalendar/moment.min.js"></script>

    <!-- Date range picker -->
    <script src="{{ asset('inspinia') }}/js/plugins/daterangepicker/daterangepicker.js"></script>

    <script src="{{ asset('inspinia') }}/js/plugins/jeditable/jquery.jeditable.js"></script>

    <script src="{{ asset('inspinia') }}/js/plugins/dataTables/datatables.min.js"></script>

    <!-- JSKnob -->
    <script src="{{ asset('inspinia') }}/js/plugins/jsKnob/jquery.knob.js"></script>

    <!-- Input Mask-->
    <script src="{{ asset('inspinia') }}/js/plugins/jasny/jasny-bootstrap.min.js"></script>

    <!-- NouSlider -->
    <script src="{{ asset('inspinia') }}/js/plugins/nouslider/jquery.nouislider.min.js"></script>

    <!-- IonRangeSlider -->
    <script src="{{ asset('inspinia') }}/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

    <!-- iCheck -->
    <script src="{{ asset('inspinia') }}/js/plugins/iCheck/icheck.min.js"></script>

    <!-- MENU -->
    <script src="{{ asset('inspinia') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Clock picker -->
    <script src="{{ asset('inspinia') }}/js/plugins/clockpicker/clockpicker.js"></script>

    <!-- Select2 -->
    <script src="{{ asset('inspinia') }}/js/plugins/select2/select2.full.min.js"></script>

    <!-- TouchSpin -->
    <script src="{{ asset('inspinia') }}/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <!-- Masonry -->
    <script src="{{ asset('inspinia') }}/js/plugins/masonary/masonry.pkgd.min.js"></script>


    <style>

        .grid .ibox {
            margin-bottom: 0;
        }

        .grid-item {
            margin-bottom: 25px;
            width: 300px;
        }
    </style>

    <script>
        $('.updateAlbumSetVisibility').on('click',function(){
            var id = $(this).data('fid')

            //send value by ajax to server
            var xhr = new XMLHttpRequest();
            xhr.open("GET", '{{url('admin/client/proof/set/status/')}}'+'/'+id);
            xhr.setRequestHeader('Content-Type', '');
            xhr.send();
            xhr.onload = function() {
                alert(this.responseText);
            }
        });

    </script>

    <script>
        $('.updateAlbumSetDownload').on('click',function(){
            var id = $(this).data('fid')

            //send value by ajax to server
            var xhr = new XMLHttpRequest();
            xhr.open("GET", '{{url('admin/client/proof/set/download/status/')}}'+'/'+id);
            xhr.setRequestHeader('Content-Type', '');
            xhr.send();
            xhr.onload = function() {
                alert(this.responseText);
            }
        });

    </script>


    <script>
        $('.generateAlbumPassword').on('click',function(){
            var id = $(this).data('fid')

            //send value by ajax to server
            var xhr = new XMLHttpRequest();
            xhr.open("GET", '{{url('admin/client/proof/generate/password')}}'+'/'+id);
            xhr.setRequestHeader('Content-Type', '');
            xhr.send();
            xhr.onload = function() {
                document.getElementById("album_password").value = this.responseText;
                alert("Album Password Generated");
            }
        });

    </script>

    <script>
        $('.generateAlbumPin').on('click',function(){
            var id = $(this).data('fid')

            //send value by ajax to server
            var xhr = new XMLHttpRequest();
            xhr.open("GET", '{{url('admin/client/proof/generate/pin')}}'+'/'+id);
            xhr.setRequestHeader('Content-Type', '');
            xhr.send();
            xhr.onload = function() {
                document.getElementById("download_pin").value = this.responseText;
                alert("Album Pin Generated");
            }
        });

    </script>

    <script>
        $('.restrictToEmail').on('click',function(){
            var id = $(this).data('fid')
            var email = document.getElementById("email_restriction").value

            //send value by ajax to server
            var xhr = new XMLHttpRequest();
            xhr.open("GET", '{{url('admin/client/proof/restrict/to/specific')}}'+'/'+id +'/email/'+email);
            xhr.setRequestHeader('Content-Type', '');
            xhr.send();
            xhr.onload = function() {
                alert(this.responseText);
            }
            location.reload();
        });

    </script>

    <script>
        $('.generateClientExclusiveAccessPassword').on('click',function(){
            var id = $(this).data('fid')

            //send value by ajax to server
            var xhr = new XMLHttpRequest();
            xhr.open("GET", '{{url('admin/client/proof/generate/password')}}'+'/'+id);
            xhr.setRequestHeader('Content-Type', '');
            xhr.send();
            xhr.onload = function() {
                document.getElementById("client_exclusive_access_password").value = this.responseText;
                alert("Client Exclusive Access Password Generated");
            }
        });

    </script>


    <script>
        $(window).load(function() {

            $('.grid').masonry({
                // options
                itemSelector: '.grid-item',
                columnWidth: 300,
                gutter: 25
            });

        });
    </script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>

    <script>
        $(document).ready(function(){

            var $image = $(".image-crop > img")
            $($image).cropper({
                aspectRatio: 1.618,
                preview: ".img-preview",
                done: function(data) {
                    // Output the result data for cropping image.
                }
            });

            $("#zoomIn").click(function() {
                $image.cropper("zoom", 0.1);
            });

            $("#zoomOut").click(function() {
                $image.cropper("zoom", -0.1);
            });

            $("#rotateLeft").click(function() {
                $image.cropper("rotate", 45);
            });

            $("#rotateRight").click(function() {
                $image.cropper("rotate", -45);
            });

            $("#setDrag").click(function() {
                $image.cropper("setDragMode", "crop");
            });

            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $('#data_2 .input-group.date').datepicker({
                startView: 1,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                format: "dd/mm/yyyy"
            });

            $('#data_3 .input-group.date').datepicker({
                startView: 2,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            $('#data_4 .input-group.date').datepicker({
                minViewMode: 1,
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                todayHighlight: true
            });

            $('#data_5 .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            var elem = document.querySelector('.js-switch');
            var switchery = new Switchery(elem, { color: '#1AB394' });

            var elem_2 = document.querySelector('.js-switch_2');
            var switchery_2 = new Switchery(elem_2, { color: '#1AB394' });

            var elem_3 = document.querySelector('.js-switch_3');
            var switchery_3 = new Switchery(elem_3, { color: '#1AB394' });

            var elem_4 = document.querySelector('.js-switch_4');
            var switchery_4 = new Switchery(elem_4, { color: '#1AB394' });

            var elem_5 = document.querySelector('.js-switch_5');
            var switchery_5 = new Switchery(elem_5, { color: '#1AB394' });

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });

            $('.demo1').colorpicker();

            var divStyle = $('.back-change')[0].style;
            $('#demo_apidemo').colorpicker({
                color: divStyle.backgroundColor
            }).on('changeColor', function(ev) {
                divStyle.backgroundColor = ev.color.toHex();
            });

            $('.clockpicker').clockpicker();

            $('input[name="daterange"]').daterangepicker();

            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

            $('#reportrange').daterangepicker({
                format: 'MM/DD/YYYY',
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2015',
                dateLimit: { days: 60 },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'right',
                drops: 'down',
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-primary',
                cancelClass: 'btn-default',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Cancel',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            }, function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            });

            $(".select2_demo_1").select2();
            $(".select2_demo_2").select2();
            $(".select2_demo_3").select2({
                placeholder: "Select a state",
                allowClear: true
            });


            $(".touchspin1").TouchSpin({
                buttondown_class: 'btn btn-white',
                buttonup_class: 'btn btn-white'
            });

            $(".touchspin2").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%',
                buttondown_class: 'btn btn-white',
                buttonup_class: 'btn btn-white'
            });

            $(".touchspin3").TouchSpin({
                verticalbuttons: true,
                buttondown_class: 'btn btn-white',
                buttonup_class: 'btn btn-white'
            });


        });
        var config = {
            '.chosen-select'           : {},
            '.chosen-select-deselect'  : {allow_single_deselect:true},
            '.chosen-select-no-single' : {disable_search_threshold:10},
            '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
            '.chosen-select-width'     : {width:"95%"}
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }

        $("#ionrange_1").ionRangeSlider({
            min: 0,
            max: 5000,
            type: 'double',
            prefix: "$",
            maxPostfix: "+",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_2").ionRangeSlider({
            min: 0,
            max: 10,
            type: 'single',
            step: 0.1,
            postfix: " carats",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_3").ionRangeSlider({
            min: -50,
            max: 50,
            from: 0,
            postfix: "°",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_4").ionRangeSlider({
            values: [
                "January", "February", "March",
                "April", "May", "June",
                "July", "August", "September",
                "October", "November", "December"
            ],
            type: 'single',
            hasGrid: true
        });

        $("#ionrange_5").ionRangeSlider({
            min: 10000,
            max: 100000,
            step: 100,
            postfix: " km",
            from: 55000,
            hideMinMax: true,
            hideFromTo: false
        });

        $(".dial").knob();

        $("#basic_slider").noUiSlider({
            start: 40,
            behaviour: 'tap',
            connect: 'upper',
            range: {
                'min':  20,
                'max':  80
            }
        });

        $("#range_slider").noUiSlider({
            start: [ 40, 60 ],
            behaviour: 'drag',
            connect: true,
            range: {
                'min':  20,
                'max':  80
            }
        });

        $("#drag-fixed").noUiSlider({
            start: [ 40, 60 ],
            behaviour: 'drag-fixed',
            connect: true,
            range: {
                'min':  20,
                'max':  80
            }
        });


    </script>

    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>


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
                    acceptedFiles: ".jpeg,.jpg,.png,.gif",
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
