@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('This is your profile page. You can see the progress you\'ve made with your work and manage your projects or assigned milestones'),
        'class' => 'col-lg-7'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Connect') }}</a>
                            <a href="#" class="btn btn-sm btn-default float-right">{{ __('Message') }}</a>
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <div>
                                        <span class="heading">22</span>
                                        <span class="description">{{ __('Friends') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">10</span>
                                        <span class="description">{{ __('Photos') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">89</span>
                                        <span class="description">{{ __('Comments') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                {{ auth()->user()->name }}<span class="font-weight-light">, 27</span>
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ __('Bucharest, Romania') }}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ __('Solution Manager - Creative Tim Officer') }}
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>{{ __('University of Computer Science') }}
                            </div>
                            <hr class="my-4" />
                            <p>{{ __('Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.') }}</p>
                            <a href="#">{{ __('Show more') }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Edit Profile') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update') }}" autocomplete="off" enctype = "multipart/form-data">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                            
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                        <hr class="my-4" />
                        <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6>

                            @if (session('password_status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('password_status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-current-password">{{ __('Current Password') }}</label>
                                    <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>
                                    
                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>
                                    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm New Password') }}" value="" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Change password') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
        @if (Auth::user()->user_type_id == 3)
        <br>
            <div class = "row">
                <div class="col-xl-8 col-xs-offset-1 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <h3 class="mb-0">{{ __('Investor Profile') }}</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                                @csrf
                                @method('put')

                                <h6 class="heading-small text-muted mb-4">{{ __('Investor information') }}</h6>
                                
                                @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <div class="pl-lg-4">

                                    <div class="form-group{{ $errors->has('phone_number') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-phone_number">{{ __('Phone number') }}</label>
                                        <input type="text" name="phone_number" id="input-phone_number" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Phone number') }}" value="{{ old('phone_number', auth()->user()->phone_number) }}" required autofocus>

                                        @if ($errors->has('phone_number'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone_number') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('date_of_birth') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-date_of_birth">{{ __('Date of birth') }}</label>
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input class="form-control datepicker" name="date_of_birth" placeholder="Date of birth" type="text" value="{{ date('d/m/Y', strtotime(now())) }}">
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('address_line_1') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-address_line_1">{{ __('Address line 1') }}</label>
                                        <input type="text" name="address_line_1" id="input-address_line_1" class="form-control form-control-alternative{{ $errors->has('address_line_1') ? ' is-invalid' : '' }}" placeholder="{{ __('Address line 1') }}" value="{{ old('address_line_1', auth()->user()->address_line_1) }}" required>

                                        @if ($errors->has('address_line_1'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('address_line_1') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('address_line_2') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-address_line_2">{{ __('Address line 2') }}</label>
                                        <input type="text" name="address_line_2" id="input-address_line_2" class="form-control form-control-alternative{{ $errors->has('address_line_2') ? ' is-invalid' : '' }}" placeholder="{{ __('Address line 2') }}" value="{{ old('address_line_2', auth()->user()->address_line_2) }}" required>

                                        @if ($errors->has('address_line_2'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('address_line_2') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class = "row">
                                        <div class = "col-md-4">
                                            
                                            <div class="form-group{{ $errors->has('city') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-city">{{ __('City') }}</label>
                                                <input type="text" name="city" id="input-city" class="form-control form-control-alternative{{ $errors->has('city') ? ' is-invalid' : '' }}" placeholder="{{ __('City') }}" value="{{ old('city', auth()->user()->city) }}" required autofocus>

                                                @if ($errors->has('city'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('city') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                        </div>

                                        <div class = "col-md-4">
                                            
                                            <div class="form-group{{ $errors->has('region') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-region">{{ __('Region') }}</label>
                                                <input type="text" name="region" id="input-region" class="form-control form-control-alternative{{ $errors->has('region') ? ' is-invalid' : '' }}" placeholder="{{ __('Region') }}" value="{{ old('region', auth()->user()->region) }}" required autofocus>

                                                @if ($errors->has('region'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('region') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                        </div>
                                        <div class = "col-md-4">
                                            
                                            <div class="form-group{{ $errors->has('postal_code') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-postal_code">{{ __('Postal code') }}</label>
                                                <input type="text" name="postal_code" id="input-postal_code" class="form-control form-control-alternative{{ $errors->has('postal_code') ? ' is-invalid' : '' }}" placeholder="{{ __('Postal code') }}" value="{{ old('postal_code', auth()->user()->postal_code) }}" required autofocus>

                                                @if ($errors->has('postal_code'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                        </div>
                                        
                                    </div>

                                    <div class = "row">
                                        <div class = "col-md-4">
                                        <label class="form-control-label" for="input-postal_code">{{ __('International Identification*') }}</label>
                                        </div>
                                        <div class = "col-md-8">
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
                                        </div>
                                    </div>

                                    <div class = "row">
                                        <div class = "col-md-4">
                                        <label class="form-control-label" for="input-postal_code">{{ __('Passport Identification*') }}</label>
                                        </div>
                                        <div class = "col-md-8">
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
        @endif
        
        
        @include('layouts.footers.auth')
    </div>
@endsection