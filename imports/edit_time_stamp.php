<div class="modal fade" id="editTimeStampModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     style="margin-top: 5%;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Time Stamp</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7">
                        <form id="edit-time-stamp-form" role="form" enctype="multipart/form-data">
                            <div class="form-group">
                            <div class="form-group">
                                <input type="hidden" id="id" name="id">
                                <label for="edit-stamp">Date</label><input type="text" id="edit-stamp"
                                                                                 name="edit-stamp"
                                                                                 class="form-control" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="hour">Hours</label>
                                <select id="edit-hour" name="hour" class="form-control">
                                    <?php
                                    $dbh = new DatabaseHelper();
                                    $dbh->load_hours();
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="minutes">Minutes</label>
                                <select id="edit-minutes" name="minute" class="form-control">
                                    <?php
                                    $dbh = new DatabaseHelper();
                                    $dbh->load_minutes();
                                    ?>
                                </select>
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