<div class="modal fade" id="addEMediaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     style="margin-top: 5%;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add External Media+</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7">
                        <form id="add-e-media-form" role="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Title</label><input type="text" id="title" name="title"
                                                                       class="form-control"
                                                                       required>
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label><input type="text" id="date" name="date"
                                                                     class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Source</label><input id="description" name="description"
                                                                              class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="link">Link</label><input id="link" name="link"
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