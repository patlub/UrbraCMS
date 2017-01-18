<div class="modal fade" id="addFundManagerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     style="margin-top: 5%;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Fund Manager</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7">
                        <form id="add-fund-manager-form" role="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Name</label><input type="text" id="name" name="name"
                                                                     class="form-control"
                                                                     required>
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select id="category" name="category" class="form-control">
                                    <option value="corporate">Corporate</option>
                                    <option value="individual">Individual</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label><input type="text" id="address" name="address"
                                                                           class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="link">Web Link</label><input type="text" id="link" name="link"
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