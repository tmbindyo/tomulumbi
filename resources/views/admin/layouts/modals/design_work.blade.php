<div class="modal inmodal" id="designWorkRegistration" tabindex="-1" role="dialog" aria-labelledby="albumRegistrationLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-paint-brush modal-icon"></i>
                <h4 class="modal-title">Design Work Registration</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.design.work.store', $design->id) }}" autocomplete="off" class="form-horizontal form-label-left" enctype = "multipart/form-data">
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
                        <div class="">
                            <div class="has-success">
                                <input type="text" placeholder="Set Name" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12 input-lg" required="required">
                                <i>Give your design work a name</i>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="">
                            <div class="has-success">
                                <textarea class="form-control col-md-7 col-xs-12 input-lg" placeholder="Set Name" id="description" name="description" rows="5"></textarea>
                                <i>Give your design work a description</i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group">
                            <input type="file" name="design_work" class="form-control col-md-12 col-xs-12 input-lg">
                        </div>
                    </div>


                    <br />

                    <div class="ln_solid"></div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-block btn-outline btn-lg btn-success mt-4">{{ __('SAVE') }}</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
