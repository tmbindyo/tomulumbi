{{-- add action type modal --}}
<div class="modal fade addDesign" tabindex="-1" role="dialog" aria-labelledby="addDesign" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDesign">Add Design</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.design.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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

                    <div class="row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="date" class="">
                                    Date
                                </label>
                                <input required name="date" id="design_date" type="text" class="form-control" data-toggle="datepicker"/>
                                <i>date.</i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="expiry_date" class="">
                                    Expiry Date
                                </label>
                                <input required name="expiry_date" id="design_expiry_date" type="text" class="form-control" data-toggle="datepicker"/>
                                <i>expiry date.</i>
                            </div>
                        </div>
                    </div>

                    <div class="position-relative form-group">
                        <label for="category" class="">
                            Categories
                        </label>
                        <select required="required" multiple="multiple" style="width: 100%" {{ $errors->has('categories') ? ' is-invalid' : '' }} name="categories[]" id="category" class="category-select form-control input-lg">
                            <option>Select Categories</option>
                            @foreach($categories as $category)
                                <option @isset($categoryExists) @if($categoryExists->id == $category->id) selected @endif @endisset value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <i>categories</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="tag" class="">
                            Contact
                        </label>
                        <select required="required" multiple="multiple" style="width: 100%" {{ $errors->has('tag') ? ' is-invalid' : '' }} name="contacts[]" id="contact" class="contact-select form-control input-lg">
                            <option>Select Contact</option>
                            @foreach($contacts as $contact)
                                <option @isset($contactExists) @if($contactExists->id == $contact->id) selected @endif @endisset value="{{$contact->id}}">{{$contact->first_name}} {{$contact->last_name}} @if($contact->organization)[{{$contact->organization->name}}]@endif</option>
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
