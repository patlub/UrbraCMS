<div class="modal fade" id="addReportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     style="margin-top: 5%;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Report</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7">
                        <form id="add-report-form" role="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Title</label><input type="text" id="title" name="title"
                                                                     class="form-control"
                                                                     required>
                            </div>
                            <div class="form-group">
                                <label for="date">Date Realesed</label><input type="text" id="date" name="date"
                                                                           class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label><textarea id="description" name="description"
                                                                           class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="attachment">Attachment</label><input type="file" id="attachment" name="attachment"
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
            </div>
        </div>
    </div>
    <div class="loader"><!-- Place at bottom of page --></div>
</div>