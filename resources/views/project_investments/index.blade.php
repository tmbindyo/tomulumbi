@extends('layouts.app', ['title' => __('Project milestone Management')])

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
                                <h3 class="mb-0">{{ __('Project milestones') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('project_milestone.create') }}" class="btn btn-sm btn-primary">{{ __('Add project milestone') }}</a>
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
                                    <th scope="col">{{ __('Priority') }}</th>
                                    <th scope="col">{{ __('Total budget') }}</th>
                                    <th scope="col">{{ __('Used budget') }}</th>
                                    <th scope="col">{{ __('Remaining budget') }}</th>
                                    <th scope="col">{{ __('Start date') }}</th>
                                    <th scope="col">{{ __('End date') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(is_array($projectMilestones)){
                                    @foreach ($projectMilestones as $project_milestone)
                                        <tr>
                                            <td>{{ $project_milestone->name }}</td>
                                            <td>{{ $project_milestone->description }}</td>
                                            <td>{{ $project_milestone->priority }}</td>
                                            <td>{{ $project_milestone->total_budget }}</td>
                                            <td>{{ $project_milestone->used_budget }}</td>
                                            <td>{{ $project_milestone->remaining_budget }}</td>
                                            <td>{{ $project_milestone->start_date }}</td>
                                            <td>{{ $project_milestone->end_date }}</td>
                                            <td>{{ $project_milestone->created_at->format('d/m/Y H:i') }}</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        @if ($project_milestone->id != auth()->id())
                                                            <form action="{{ route('project_milestone.destroy', $project_milestone) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                
                                                                <a class="dropdown-item" href="{{ route('project_milestone.edit', $project_milestone) }}">{{ __('Edit') }}</a>
                                                                <button milestone="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this project milestone?") }}') ? this.parentElement.submit() : ''">
                                                                    {{ __('Delete') }}
                                                                </button>
                                                            </form>    
                                                        @else
                                                            <a class="dropdown-item" href="{{ route('project_milestone.edit', $project_milestone->id ) }}">{{ __('Edit') }}</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        {{-- <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $project_milestones->links() }}
                        </nav> --}}
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection