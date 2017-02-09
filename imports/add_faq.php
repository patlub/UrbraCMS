<div class="modal fade" id="addFaqModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     style="margin-top: 5%;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Frequently Asked Question</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7">
                        <form id="add-faq-form" role="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="question">Question</label><input type="text" id="question" name="question"
                                                                     class="form-control"
                                                                     required>
                            </div>
                            <div class="form-group">
                                <label for="answer">Answer</label><textarea id="answer" name="answer"
                                                                           class="form-control"></textarea>
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