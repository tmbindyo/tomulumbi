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
                                <h3 class="mb-0">{{ __('Industries') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('industry.create') }}" class="btn btn-sm btn-primary">{{ __('Add industry') }}</a>
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
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Description') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($industries as $industry)
                                    <tr>
                                        <td>{{ $industry->name }}</td>
                                        <td>
                                            {{ $industry->description }}
                                        </td>
                                        <td>{{ $industry->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    @if ($industry->id != auth()->id())
                                                        <form action="{{ route('industry.destroy', $industry) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            
                                                            <a class="dropdown-item" href="{{ route('industry.edit', $industry) }}">{{ __('Edit') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this industry?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                            </button>
                                                        </form>    
                                                    @else
                                                        <a class="dropdown-item" href="{{ route('industry.edit', $industry->id ) }}">{{ __('Edit') }}</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $industries->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection