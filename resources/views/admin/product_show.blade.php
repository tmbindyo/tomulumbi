@extends('admin.layouts.app')

@section('title', $product->name)

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Products</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.products')}}">Products</a></strong>
                </li>
                <li class="active">
                    <strong>Product</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeIn">

        {{--  view graphy  --}}
        <div class="row">
            <div class="">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>
                            Views
                        </h5>
                    </div>
                    <div class="ibox-content">
                        <div>
                            <canvas id="lineChart" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--    Client proof images    --}}
        <div class="row m-t-lg">
            <div class="col-lg-12 col-md-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-3"> <i class="fa fa-image"> Album Sets</i></a></li>
                        <li class=""><a data-toggle="tab" href="#{{$product->id}}"><i class="fa fa-desktop"> Product Gallery</i></a></li>
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

                            <div id="{{$product->id}}" class="tab-pane">
                                <div class="panel-body">

                                    <div class="lightBoxGallery">

                                        @isset($productGallery)
                                            @foreach($productGallery as $productGalleryImage)
                                                <a href="{{ asset('') }}{{ $productGalleryImage->upload->pixels500 }}" title="{{ $productGalleryImage->upload->name }}" data-gallery=""><img src="{{ asset('') }}{{ $productGalleryImage->upload->pixels100 }}"></a>
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

                                    <br>
                                    <form id="my-awesome-dropzone" class="dropzone" action="{{route('admin.product.gallery.image.upload',$product->id)}}">
                                        @csrf
                                        <div class="dropzone-previews"></div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">



                    </div>
                </div>
            </div>
        </div>


        <br>
        {{--    Client proof settings    --}}
        <div class="row m-t-lg">
            <div class="col-lg-12 col-md-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#collection_settings"> <i class="fa fa-cogs"></i>Product Settings</a></li>
                        <li class=""><a data-toggle="tab" href="#design"><i class="fa fa-bookmark"></i>Product</a></li>
                        <li class=""><a data-toggle="tab" href="#priceList"><i class="fa fa-money"></i>Price List</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="collection_settings" class="tab-pane active">
                            <div class="panel-body">
                                <div class="col-md-10 col-md-offset-1">

                                    <form method="post" action="{{ route('admin.product.update',$product->id) }}" autocomplete="off">
                                        @csrf

                                        @if (session('status'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ session('status') }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif

                                        <div class="has-warning">
                                            <div class="form-group">
                                                <label>Product Name</label>
                                                <input name="name" type="text" value="{{$product->name}}" class="form-control input-lg">
                                                <i>Pick something short and sweet. Imagine choosing a title for a photo product cover.</i>
                                            </div>
                                        </div>

                                        <div class="has-warning">
                                            <label class="control-label">Status</label>
                                            <select class="form-control m-b input-lg" name="status">
                                                @foreach($productStatuses as $productStatus)
                                                    <option value="{{$productStatus->id}}" @if($productStatus->id == $product->status_id) selected @endif>{{$productStatus->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>You can take the collection online/offline quickly. Hidden collections can only be seen by you.</i>
                                        </div>
                                        <br>
                                        <div class="has-warning">
                                            <select required="required" name="type" class="select2_demo_type form-control input-lg">
                                                <option></option>
                                                @foreach($types as $type)
                                                    <option @if($product->type_id == $type->id) selected @endif value="{{$type->id}}">{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>Type: What kind of collection is this? Separate your tags with a comma. e.g. wedding, outdoor, summer</i>
                                        </div>
                                        <br>
                                        <div class="has-warning">
                                            <div class="form-group">
                                                <textarea rows="5" id="description" name="description" required="required" class="form-control input-lg">{{$product->description}}</textarea>
                                                <i>Give a brief description on what the product is about</i>
                                            </div>
                                        </div>

                                        <br>

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
                                        {{--  Cover Image  --}}
                                        <div class="col-md-12">
                                            <h2 class="text-center">Cover Image</h2>
                                            <button class="btn btn-primary btn-lg btn-outline btn-block" data-toggle="modal" data-target="#productCoverImageRegistration" aria-expanded="false">Update Cover Image</button>
                                            <hr>
                                        </div>
                                        <div class="col-md-12">

                                            <div class="center">
                                                <img alt="image" width="470em" class="img-responsive" @isset($product->cover_image) src="{{ asset('') }}{{ $product->cover_image->pixels750 }}" @endisset>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        {{--  Cover Image  --}}
                                        <div class="col-md-12">
                                            <h2 class="text-center">Cover Image</h2>
                                            <button class="btn btn-primary btn-lg btn-outline btn-block" data-toggle="modal" data-target="#secondaryProductCoverImageRegistration" aria-expanded="false">Update Second Cover Image</button>
                                            <hr>
                                        </div>
                                        <div class="col-md-12">

                                            <div class="center">
                                                <img alt="image" width="470em" class="img-responsive" @isset($product->second_cover_image) src="{{ asset('') }}{{ $product->second_cover_image->pixels750 }}" @endisset>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div id="priceList" class="tab-pane">
                            <div class="panel-body">
                                <div class="">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <button data-toggle="modal" data-target="#priceListRegistration" aria-expanded="false" class="btn btn-primary pull-right btn-outline"><i class="fa fa-plus"></i> New</button>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="ibox-content">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover dataTables-example" >
                                                        <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Description</th>
                                                            <th>Price</th>
                                                            <th>Sub Type</th>
                                                            <th>Size</th>
                                                            <th class="text-right" data-sort-ignore="true">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($priceLists as $priceList)
                                                            <tr class="gradeX">
                                                                <td>{{$priceList->name}}</td>
                                                                <td>{{$priceList->description}}</td>
                                                                <td>{{$priceList->price}}</td>
                                                                <td>{{$priceList->sub_type->name}}[{{$priceList->sub_type->type->name}}]</td>
                                                                <td>{{$priceList->size->size}}</td>
                                                                <td class="text-center">
                                                                    <div class="btn-group">
                                                                        <a href="{{route('admin.price.list.show',$priceList->id)}}" class="btn-info btn btn-block btn-xs">View</a>
                                                                        @if($priceList->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                            <a href="{{route('admin.price.list.restore',$priceList->id)}}" class="btn-warning btn btn-block btn-xs">Restore</a>
                                                                        @else
                                                                            <a href="{{route('admin.price.list.delete',$priceList->id)}}" class="btn-danger btn btn-block btn-xs">Delete</a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Description</th>
                                                            <th>Price</th>
                                                            <th>Sub Type</th>
                                                            <th>Size</th>
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
                </div>
            </div>
        </div>

        <br>
        {{--  to do Counts  --}}
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-warning m-r-sm">{{$productArray['pendingToDos']}}</button>
                            Pending
                        </td>
                        <td>
                            <button type="button" class="btn btn-info m-r-sm">{{$productArray['inProgressToDos']}}</button>
                            In progress
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary m-r-sm">{{$productArray['completedToDos']}}</button>
                            Completed
                        </td>
                        <td>
                            <button type="button" class="btn btn-success m-r-sm">{{$productArray['overdueToDos']}}</button>
                            Overdue
                        </td>
                    </tr>
                    </tbody>
                </table>
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
                                        @if($pendingToDo->is_product === 1)
                                            <p><span class="badge badge-primary">{{$pendingToDo->product->name}}</span></p>
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
                                        @if($inProgressToDo->is_product === 1)
                                            <p><span class="badge badge-primary">{{$inProgressToDo->product->name}}</span></p>
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
                                        @if($overdueToDo->is_product === 1)
                                            <p><span class="badge badge-primary">{{$overdueToDo->product->name}}</span></p>
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
                                        @if($completedToDo->is_product === 1)
                                            <p><span class="badge badge-primary">{{$completedToDo->product->name}}</span></p>
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

@include('admin.layouts.modals.product_to_do')
@include('admin.layouts.modals.product_price_list')
@include('admin.layouts.modals.product_cover_image')
@include('admin.layouts.modals.product_second_cover_image')

@section('js')

    {{-- download x views line chart  --}}
    <script>
        $(function () {
            var lineData = {
                labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
                datasets: [
                    {
                        label: "Example dataset",
                        fillColor: "rgba(220,220,220,0.5)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [
                            {{$productViews['views']['1']}},
                            {{$productViews['views']['2']}},
                            {{$productViews['views']['3']}},
                            {{$productViews['views']['4']}},
                            {{$productViews['views']['5']}},
                            {{$productViews['views']['6']}},
                            {{$productViews['views']['7']}},
                            {{$productViews['views']['8']}},
                            {{$productViews['views']['9']}},
                            {{$productViews['views']['10']}},
                            {{$productViews['views']['11']}},
                            {{$productViews['views']['12']}}
                        ]
                    }
                ]
            };

            var lineOptions = {
                scaleShowGridLines: true,
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleGridLineWidth: 1,
                bezierCurve: true,
                bezierCurveTension: 0.4,
                pointDot: true,
                pointDotRadius: 4,
                pointDotStrokeWidth: 1,
                pointHitDetectionRadius: 20,
                datasetStroke: true,
                datasetStrokeWidth: 2,
                datasetFill: true,
                responsive: true,
            };


            var ctx = document.getElementById("lineChart").getContext("2d");
            var myNewChart = new Chart(ctx).Line(lineData, lineOptions);
        });
    </script>

@endsection
