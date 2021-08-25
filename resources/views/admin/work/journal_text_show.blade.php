@extends('admin.layouts.app')

@section('title', $journal->name)

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-6">
            <h2>Journals</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li>
                    <strong><a href="{{route('admin.journals')}}">Journals</a></strong>
                </li>
                <li class="active">
                    <strong>Journal</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-6">
            <div class="title-action">
                <a href="{{route('admin.journal.show',$journal->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Journal </a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeIn">

        {{--    To Dos    --}}
        <div class="row m-t-lg">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Journal Text</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" action="{{ route('admin.journal.text.update',$journal->id) }}" autocomplete="off">
                            @csrf

                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <textarea name="body"  class="summernote">
                                @if($journal->body)
                                    {{$journal->body}}
                                @else
                                    <h3>Lorem Ipsum is simply</h3>
                                    dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the industrys</strong> standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                    typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
                                    <br/>
                                    <br/>
                                    <ul>
                                        <li>Remaining essentially unchanged</li>
                                        <li>Make a type specimen book</li>
                                        <li>Unknown printer</li>
                                    </ul>
                                @endif
                            </textarea>

                            <br>

                            <hr>

                            <div>
                                <button class="btn btn-block btn-primary btn-outline btn-lg m-t-n-xs" type="submit"><strong>Update Journal Text</strong></button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection

