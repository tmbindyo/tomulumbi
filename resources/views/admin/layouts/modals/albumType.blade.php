
<div class="modal fade" id="userRegistration" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">	
                <div class="card bg-secondary border-0 mb-0">
                    <div class="card-header bg-transparent pb-5">
                        <div class="text-muted text-center mt-2 mb-3"><h3>Member Registration</h3></div>
                    </div>
                    <div class="card-body px-lg-5 py-lg-5">
                        

                        <form method="post" action="{{ route('ira.user.save', $institution->id) }}" autocomplete="off">
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

                            <div class="row">
                                <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                            </div>
                                            <input name="email" class="form-control" placeholder="Email" type="email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                            </div>
                                            <input name="phone_number" class="form-control" placeholder="+254" type="text" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                            </div>
                                            <input name="name" class="form-control" placeholder="Name" type="text" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                                
                                    
                                    
                                    
                                    

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
