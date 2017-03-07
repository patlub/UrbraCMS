<div class="modal fade" id="editAdminModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     style="margin-top: 5%;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Administrator</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7">
                        <form id="edit-admin-form" role="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" id="id" name="id">
                                <label for="edit_name">Name</label><input type="text" id="edit_name" name="edit-name"
                                                                          class="form-control"
                                                                          required>
                            </div>
                            <div class="form-group">
                                <label for="edit_address">Address</label><input type="text" id="edit_address"
                                                                                name="edit-address"
                                                                                class="form-control">
                            </div>
                            <script>
                                // Replace the <textarea id="content"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace( 'edit_address' );
                            </script>
                            <div class="form-group">
                                <label for="edit_tel">Tel</label><input type="text" id="edit_tel" name="edit-tel"
                                                                   class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="edit-link">Web Link</label><input type="text" id="edit-link"
                                                                              name="edit-link"
                                                                              class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="update" value="UPDATE" class="form-control btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
    <div class="loader"><!-- Place at bottom of page --></div>
</div>