<div class="modal fade" id="addTenderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     style="margin-top: 5%;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Tender</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7">
                        <form id="add-tender-form" role="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="ref_no">Ref No.</label><input type="text" id="ref_no" name="ref_no"
                                                                          class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="desc">Description</label><textarea id="desc" name="desc"
                                                                               class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select id="category" name="category" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="deadline">Deadline</label><input type="text" id="deadline" name="deadline"
                                                                             class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="date_awarded">Date Awarded</label><input type="text" id="date_awarded"
                                                                                     name="date_awarded"
                                                                                     class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="dop">Dead of Publication</label><input type="text" id="dop" name="dop"
                                                                                   class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="attachment">Attachment</label><input type="file" id="attachment"
                                                                                 name="attachment"
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