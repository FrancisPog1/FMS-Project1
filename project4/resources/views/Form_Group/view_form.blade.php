<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">View</h4>
            <button type="button" class="close" data-dismiss="modal" id="View_closeModalButton" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" style="height: 400px;">
            <div class="card-body">

                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="required-input">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" tabindex="1" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description" tabindex="1" readonly>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-danger" id="View_cancelButton" data-dismiss="modal">Close</button>
    
        </div>
    </div>
    <!-- /.modal-content -->
</div>