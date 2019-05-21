@extends('layouts.app', ['title' => __('Institution Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add Institution')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Institution') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('institution.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('institution.store') }}" autocomplete="off">
                            @csrf
                            
                            <!-- Institution information addition -->
                            <h6 class="heading-small text-muted mb-4">{{ __('Institution information') }}</h6>
                            <div class="pl-lg-4">

                                <div class = row>
                                    <div class = col-md-6>
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('industry') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-industry">{{ __('Industry:') }}</label>
                                            <select name="industry" class="form-control form-control-alternative {{ $errors->has('industry') ? ' is-invalid' : '' }}" value="{{ old('industry') }}" required>

                                                @foreach($industries as $industry)
                                                    <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                                                @endforeach

                                            </select>
                                            @if ($errors->has('industry'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('industry') }}</strong>
                                                </span>
                                            @endif
                                        </div> 

                                    </div>
                                    <div class = col-md-6>
                                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-description">{{ __('Description') }}</label>
                                            <textarea class="form-control" name="description" id="input-description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" value="{{ old('description') }}" required rows="5" placeholder="Institution description ..."></textarea>

                                            @if ($errors->has('description'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <!-- Institution user information -->
                            <h6 class="heading-small text-muted mb-4">{{ __('Institution user information') }}</h6>
                            <div class="pl-lg-4">

                                <div class = row>
                                    <div class = col-md-6>
                                        <div class="form-group{{ $errors->has('user_name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-user_name">{{ __('User Name') }}</label>
                                            <input type="text" name="user_name" id="input-user_name" class="form-control form-control-alternative{{ $errors->has('user_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('user_name') }}" required autofocus>

                                            @if ($errors->has('user_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('user_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
                                            <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value="" required>
                                            
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('user_type') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-user_type">{{ __('User type:') }}</label>
                                            <select name="user_type" class="form-control form-control-alternative {{ $errors->has('user_type') ? ' is-invalid' : '' }}" value="{{ old('user_type') }}" required>

                                                @foreach($user_types as $user_type)
                                                    <option value="{{ $user_type->id }}">{{ $user_type->name }}</option>
                                                @endforeach

                                            </select>
                                            @if ($errors->has('user_type'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('user_type') }}</strong>
                                                </span>
                                            @endif
                                        </div> 

                                        

                                    </div>
                                    <div class = col-md-6>
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                            <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                                            <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm Password') }}" value="" required>
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
        <br>
        <div class="row">
            <div class="col-xl-6 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Project bids') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    @if (Auth::user()->user_type_id == 3)
                                        <a href="{{ route('project.project_bid.create', $project->id ) }}" class="btn btn-sm btn-primary">{{ __('Create project bids') }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('project.project_bid.update', [$project->id,'1']) }}" autocomplete="off">
                                @csrf
                                @method('put')
    
                                <h6 class="heading-small text-muted mb-4">{{ __('Project bids') }}</h6>
                                <div class="pl-lg-4">
                                    <div class="col-12">
                                            @if (session('status'))
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    {{ session('status') }}
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                    
                                        <div class="table-responsive">
                                            <table class="table align-items-center table-flush">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col">{{ __('Name') }}</th>
                                                        <th scope="col">{{ __('Amount') }}</th>
                                                        <th scope="col">{{ __('Creation Date') }}</th>
                                                        <th scope="col">{{ __('Status') }}</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($projectBids as $projectBid)
                                                        <tr>
                                                            <td>{{ Auth::user()->name }}</td>
                                                            <td>{{ $projectBid->bid_amount }}</td>
                                                            <td><span class="badge badge-pill badge-warning">Under review</span></td>
                                                            <td>{{ $projectBid->created_at }}</td>
                                                            <td></td>
                                                            @if (Auth::user()->user_type_id == 4)
                                                            <td class="text-right">
                                                                <div class="dropdown">
                                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                        @if (Auth::user()->user_type_id == 3)
                                                                            <a class="dropdown-item" href="{{ route('project.project_bid.edit', [$project->id,$projectBid->id]) }}">{{ __('Edit') }}</a>
                                                                        @endif
                                                                        @if (Auth::user()->user_type_id == 4)

                                                                            <a class="dropdown-item" href="{{ route('project.bid', [$project->id,$projectBid->id]) }}">{{ __('Approve') }}</a>  
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        {{-- <div class="card-footer py-4">
                                            <nav class="d-flex justify-content-end" aria-label="...">
                                                {{ $projects->links() }}
                                            </nav>
                                        </div> --}}
    
    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <div class="col-xl-6 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Project investment') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('project.project_investment.update', [$project->id,'1']) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Project investment') }}</h6>
                            <div class="pl-lg-4">
                                <div class="col-12">
                                        @if (session('status'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ session('status') }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-flush">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">{{ __('Amount') }}</th>
                                                    <th scope="col">{{ __('Investor') }}</th>
                                                    <th scope="col">{{ __('Creation Date') }}</th>
                                                    <th scope="col">{{ __('Status') }}</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($projectInvestments as $projectInvestment)
                                                    <tr>
                                                        <td>{{ $projectInvestment->amount }}</td>
                                                        <td>{{ Auth::user()->name }}</td>
                                                        <td>{{ $projectInvestment->created_at }}</td>
                                                        <td><span class="badge badge-pill badge-success">Approved</span></td>
                                                        @if (Auth::user()->user_type_id == 4)
                                                        <td class="text-right">
                                                            <div class="dropdown">
                                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fas fa-ellipsis-v"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                    @if ($project->id != auth()->id())
                                                                        <form action="{{ route('project.project_investment.destroy', [$project->id,$projectInvestment->id]) }}" method="post">
                                                                            @csrf
                                                                            @method('delete')
                                                                            
                                                                            <a class="dropdown-item" href="{{ route('project.project_investment.edit', [$project->id,$projectInvestment->id]) }}">{{ __('Edit') }}</a>
                                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this project?") }}') ? this.parentElement.submit() : ''">
                                                                                {{ __('Delete') }}
                                                                            </button>
                                                                        </form>    
                                                                    @else
                                                                        <a class="dropdown-item" href="{{ route('project.project_investment.edit', [$project->id,$projectInvestment->id] ) }}">{{ __('Edit') }}</a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- <div class="card-footer py-4">
                                        <nav class="d-flex justify-content-end" aria-label="...">
                                            {{ $projects->links() }}
                                        </nav>
                                    </div> --}}



                            </div>


                    
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection