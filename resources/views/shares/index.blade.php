@extends('layouts.app', ['title' => __('Industry Management')])

@section('content')
    @if (Auth::user()->user_type_id == 1)
        @include('layouts.headers.admin_cards')
    @elseif (Auth::user()->user_type_id == 3)
        @include('layouts.headers.investor_cards')
    @elseif (Auth::user()->user_type_id == 4)
        @include('layouts.headers.project_manager_cards')
    @endif


    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Shares Listings') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('shares.create') }}" class="btn btn-sm btn-primary">{{ __('Add Shares Listing') }}</a>
                            </div>
                        </div>
                    </div>
                    
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
                                    <th scope="col">{{ __('Institution') }}</th>
                                    <th scope="col">{{ __('Shares Type') }}</th>
                                    <th scope="col">{{ __('No of Shares') }}</th>
                                    <th scope="col">{{ __('Value per Share') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shares as $share)
                                    <tr>
                                        <td>{{ App\Institution::where("id", $share->institution_id)->first()->name }}</td>
                                        <td>{{ $share->share_type }}</td>
                                        <td>{{ $share->no_of_shares }}</td>
                                        <td>${{ $share->share_price }}</td>
                                        <td>{{ $share->created_at->format('d/m/Y H:i') }}</td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $shares->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection