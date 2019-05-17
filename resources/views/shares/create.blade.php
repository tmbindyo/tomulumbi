@extends('layouts.app', ['title' => __('Industry Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add Shares Listing')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Shares Listing Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('industry.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('shares.store') }}" autocomplete="off">
                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">{{ __('Shares Listing Information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('institution') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-institution">{{ __('Institution:') }}</label>
                                    <select name="institution" class="form-control form-control-alternative {{ $errors->has('institution') ? ' is-invalid' : '' }}" value="{{ old('institution') }}" required>

                                        @foreach($institutions as $institution)
                                            <option value="{{ $institution->id }}">{{ $institution->name }}</option>
                                        @endforeach

                                    </select>
                                    @if ($errors->has('institution'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('institution') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('share_type') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="share_type">{{ __('Type of Shares:') }}</label>
                                    <select name="share_type" class="form-control form-control-alternative {{ $errors->has('share_type') ? ' is-invalid' : '' }}" value="{{ old('share_type') }}" required>

                                        <option value="Ordinary Shares">Ordinary Shares</option>
                                        <option value="Preference Shares">Preference Shares</option>
                                        <option value="Partly-Paid Shares">Partly-Paid Shares</option>
                                        
                                    </select>
                                    @if ($errors->has('share_type'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('share-type') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('share_price') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="share_price">{{ __('Value per Share') }}</label>
                                    <input type="number" name="share_price" id="share_price" class="form-control form-control-alternative{{ $errors->has('share_price') ? ' is-invalid' : '' }}" placeholder="{{ __('Value per Share') }}" value="{{ old('share_price') }}" required autofocus>

                                    @if ($errors->has('share_price'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('share_price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="form-group{{ $errors->has('no_of_shares') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="no_of_shares">{{ __('Number of Shares') }}</label>
                                    <input type="number" name="no_of_shares" id="no_of_shares" class="form-control form-control-alternative{{ $errors->has('no_of_shares') ? ' is-invalid' : '' }}" placeholder="{{ __('Number of Shares') }}" value="{{ old('no_of_shares') }}" required autofocus>

                                    @if ($errors->has('no_of_shares'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('no_of_shares') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('min_shares') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="min_shares">{{ __('Minimum No. of Shares') }}</label>
                                    <input type="number" name="min_shares" id="min_shares" class="form-control form-control-alternative{{ $errors->has('min_shares') ? ' is-invalid' : '' }}" placeholder="{{ __('Minimum No. of Shares') }}" value="{{ old('min_shares') }}" required autofocus>

                                    @if ($errors->has('min_shares'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('min_shares') }}</strong>
                                        </span>
                                    @endif
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