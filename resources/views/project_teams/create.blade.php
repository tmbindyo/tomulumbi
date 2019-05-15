@extends('layouts.app', ['title' => __('Project team Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add Project team')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Project team Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('project.project_team.index', $project->id) }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('project.project_team.store', $project->id) }}" autocomplete="off">
                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">{{ __('Project team information') }}</h6>
                            <div class="pl-lg-4">
                                
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ $project->total_budget }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('position') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-position">{{ __('Position') }}</label>
                                    <input type="text" name="position" id="input-position" class="form-control form-control-alternative{{ $errors->has('position') ? ' is-invalid' : '' }}" placeholder="{{ __('Position') }}" value="{{ $project->position }}" required autofocus>

                                    @if ($errors->has('position'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('position') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-description">{{ __('Description') }}</label>
                                        <input type="text" name="description" id="input-description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" value="{{ $project->description }}" required autofocus>
    
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                
                                    <div class="dropzone dropzone-single" data-toggle="dropzone" data-dropzone-url="http://">
                                        <div class="fallback">
                                            <div class="custom-file">
                                                <input name = "image" type="file" class="custom-file-input" id="dropzoneBasicUpload">
                                                <label class="custom-file-label" for="dropzoneBasicUpload">Choose file</label>
                                            </div>
                                        </div>

                                        <div class="dz-preview dz-preview-single">
                                            <div class="dz-preview-cover">
                                                <img class="dz-preview-img" src="..." alt="..." data-dz-thumbnail>
                                            </div>
                                        </div>
                                    </div>
                                    

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection