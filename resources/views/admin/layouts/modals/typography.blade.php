<div class="modal inmodal" id="typographyRegistration" tabindex="-1" role="dialog" aria-labelledby="typographyRegistrationLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-cog modal-icon"></i>
                <h4 class="modal-title">Typography Registration</h4>
            </div>
            <div class="modal-body">
                <form id="my-awesome-dropzone" class="dropzone" action="{{route('admin.typography.save')}}">
                    @csrf
                    <div class="dropzone-previews"></div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
