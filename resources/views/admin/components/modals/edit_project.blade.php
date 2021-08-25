{{-- edit action type modal --}}
<div class="modal fade editProject" tabindex="-1" role="dialog" aria-labelledby="editProject" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProject">Add Project</h5>
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
                        <input name="name" id="name" value="{{$project->name}}" type="text" class="mb-2 form-control" {{ $errors->has('name') ? ' is-invalid' : '' }} required="required">
                        <i>name</i>
                    </div>


                    <div class="position-relative form-group">
                        <label for="date" class="">
                            Date
                        </label>
                        <input required name="date" id="project_date" type="text" class="form-control" data-toggle="datepicker"/>
                        <i>date.</i>
                    </div>



                    <div class="position-relative form-group">
                        <label for="status" class="">
                            Status
                        </label>
                        <select required="required" multiple="multiple" style="width: 100%" {{ $errors->has('status') ? ' is-invalid' : '' }} name="status" id="status" class="status-select form-control input-lg">
                            <option>Select status</option>
                            @foreach($projectStatuses as $projectStatus)
                                <option value="{{$projectStatus->id}}" @if($projectStatus->id === $project->status_id) selected @endif>{{$projectStatus->name}}</option>
                            @endforeach
                        </select>
                        <i>status</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="category" class="">
                            Project Type
                        </label>
                        <select required="required" multiple="multiple" style="width: 100%" {{ $errors->has('categories') ? ' is-invalid' : '' }} name="project_type" id="project_type" class="project-type-select form-control input-lg">
                            <option>Select Project Type</option>
                            @foreach($projectTypes as $projectType)
                                <option @if($project->project_type_id == $projectType->id) selected @endif value="{{$projectType->id}}">{{$projectType->name}}</option>
                            @endforeach
                        </select>
                        <i>project type</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="tag" class="">
                            Contact
                        </label>
                        <select required="required" multiple="multiple" style="width: 100%" {{ $errors->has('tag') ? ' is-invalid' : '' }} name="contacts[]" id="edit_contact" class="contact-select form-control input-lg">
                            <option>Select Contact</option>
                            @foreach($contacts as $contact)
                                <option value="{{$contact->id}}" @foreach ($projectContacts as $projectContact)  @if($contact->id == $projectContact->contact_id) selected @endif @endforeach >{{$contact->first_name}} {{$contact->last_name}}</option>
                            @endforeach
                        </select>
                        <i>tag</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="description" class="">
                            Description
                        </label>
                        <textarea id="description" name="description" class="mb-2 form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">{{$project->description}}</textarea>
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
