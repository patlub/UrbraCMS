<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     style="margin-top: 5%;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit User</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7">
                        <form id="add-admin-form" role="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="edit-first-name">First Name</label><input type="text" id="edit-first-name" name="first-name"
                                                                     class="form-control"
                                                                     required>
                            </div>
                            <div class="form-group">
                                <label for="edit-last-name">Last Name</label><input type="text" id="edit-last-name" name="last-name"
                                                                           class="form-control"
                                                                           required>
                            </div>
                            <div class="form-group">
                                <label for="edit-email">Email</label><input type="email" id="edit-email" name="email"
                                                                               class="form-control"
                                                                               required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="SUBMIT" class="form-control btn btn-success">
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