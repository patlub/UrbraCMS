<div class="modal fade" id="addBoDModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     style="margin-top: 5%;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Board of Director</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7">
                        <form id="add-BoD-form" role="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="image">Image</label><input type="file" id="image" name="image"
                                                                       class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label><input type="text" id="name" name="name"
                                                                     class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="details">Details</label><input type="text" id="details" name="details"
                                                                     class="form-control" required>
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