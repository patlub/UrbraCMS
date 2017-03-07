<div class="modal fade" id="addTrusteeItemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     style="margin-top: 5%;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Item</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="add-trustee-item-form" role="form" enctype="multipart/form-data" method="post" action="php/add_trustee_law_item.php">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="title">Title</label><input type="text" id="title" name="title"
                                                                       class="form-control"
                                                                       required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label><textarea id="description"
                                                                                      name="description"
                                                                                      class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" name="submit" value="SUBMIT" class="form-control btn btn-primary">
                            </div>
                        </div>
                        <script>
                            CKEDITOR.replace('description');
                        </script>
                    </form>
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