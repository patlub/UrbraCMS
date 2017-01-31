<div class="modal fade" id="addResourceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     style="margin-top: 5%;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Resource</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7">
                        <form id="add-resource-form" role="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Title</label><input type="text" id="title" name="title"
                                                                       class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label for="edit-expiry">Expiry</label><input type="text" id="edit-expiry" name="date"
                                                                           class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label for="edit-category">Category</label>
                                <select id="edit-category" name="category" class="form-control">
                                    <option value="act">Act</option>
                                    <option value="regulation">Regulation</option>
                                    <option value="compliance">Compliance</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="resource">Resource</label><input type="file" id="resource" name="resource"
                                                                             class="form-control">
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