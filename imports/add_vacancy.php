
<div class="modal fade" id="addVacancyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     style="margin-top: 5%;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Vacancy</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7">
                        <form id="add-vacancy-form" role="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Title</label><input type="text" id="title" name="title"
                                                                     class="form-control"
                                                                     required>
                            </div>
                            <div class="form-group">
                                <label for="start_date">Start Date</label><input type="text" id="start_date" name="start_date"
                                                                           class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="s-hour">Hours</label>
                                <select id="s-hour" name="s-hour" class="form-control">
                                    <?php
                                    $dbh = new DatabaseHelper();
                                    $dbh->load_hours();
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="s-minute">Minutes</label>
                                <select id="s-minute" name="s-minute" class="form-control">
                                    <?php
                                    $dbh = new DatabaseHelper();
                                    $dbh->load_minutes();
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="end_date">End Date</label><input type="text" id="end_date" name="end_date"
                                                                                 class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="e-hour">Hours</label>
                                <select id="e-hour" name="e-hour" class="form-control">
                                    <?php
                                    $dbh = new DatabaseHelper();
                                    $dbh->load_hours();
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="e-minute">Minutes</label>
                                <select id="e-minute" name="e-minute" class="form-control">
                                    <?php
                                    $dbh = new DatabaseHelper();
                                    $dbh->load_minutes();
                                    ?>
                                </select>
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
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
    <div class="loader"><!-- Place at bottom of page --></div>
</div>