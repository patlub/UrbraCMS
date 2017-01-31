<div class="modal fade" id="editDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     style="margin-top: 5%;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Department</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7">
                        <form id="edit-department-form" role="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" id="id" name="id">
                                <label for="edit-name">Title</label><input type="text" id="edit-name" name="name"
                                                                       class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label for="edit-head">Head of Department</label><input type="text" id="edit-head" name="head"
                                                                       class="form-control" required="">
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" value="UPDATE" class="form-control btn btn-success">
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