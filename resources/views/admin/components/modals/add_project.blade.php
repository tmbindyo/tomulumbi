{{-- add action type modal --}}
<div class="modal fade addProject" tabindex="-1" role="dialog" aria-labelledby="addProject" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProject">Add Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.project.store') }}" autocomplete="off" class="form-horizontal form-label-left">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="position-relative form-group">
                        <label for="name" class="">
                            Name
                        </label>
                        <input name="name" id="name" placeholder="name" type="text" class="mb-2 form-control" {{ $errors->has('name') ? ' is-invalid' : '' }} required="required">
                        <i>name</i>
                    </div>


                    <div class="position-relative form-group">
                        <label for="date" class="">
                            Date
                        </label>
                        <input required name="date" id="date" type="text" class="form-control" data-toggle="datepicker"/>
                        <i>date.</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="project_type" class="">
                            Project Type
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('project_type') ? ' is-invalid' : '' }} name="project_type" id="project_type" class="project-type-select form-control input-lg">
                            <option>Select Project Type</option>
                            @foreach($projectTypes as $projectType)
                                <option value="{{$projectType->id}}">{{$projectType->name}}</option>
                            @endforeach
                        </select>
                        <i>project type</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="tag" class="">
                            Contact
                        </label>
                        <select required="required" multiple="multiple" style="width: 100%" {{ $errors->has('contact') ? ' is-invalid' : '' }} name="contacts[]" id="contact" class="contact-select form-control input-lg">
                            <option>Select Contact</option>
                            @foreach($contacts as $contact)
                                <option value="{{$contact->id}}">{{$contact->first_name}} {{$contact->last_name}} @if($contact->organization)[{{$contact->organization->name}}]@endif</option>
                            @endforeach
                        </select>
                        <i>tag</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="description" class="">
                            Description
                        </label>
                        <textarea id="description" name="description" class="mb-2 form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"></textarea>
                        <i>description</i>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-block btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-outline btn-block btn-success">{{ __('SAVE') }}</button>
                        </div>
                    </div>


                </form>
            </div>

            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>
