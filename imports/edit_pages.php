<div class="modal fade" id="addPagesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     style="margin-top: 5%;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit User</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7">
                        <form id="add-user-form" role="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-md-3" style="padding-top: 2%;"><label for="trustees">Trustees</label></div>
                                <div class="col-md-3"><input type="checkbox" id="trustees" name="trustees"
                                                             class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3" style="padding-top: 2%;"><label for="schemes">Schemes</label></div>
                                <div class="col-md-3"><input type="checkbox" id="schemes" name="schemes"
                                                                                     class="form-control"</div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3" style="padding-top: 2%;"><label for="administrators">Administrators</label></div>
                                <div class="col-md-3"><input type="checkbox" id="administrators" name="administrators"
                                                             class="form-control"</div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3" style="padding-top: 2%;"><label for="custodians">Custodians</label></div>
                                <div class="col-md-3"><input type="checkbox" id="custodians" name="custodians"
                                                             class="form-control"</div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-3" style="padding-top: 2%;"><label for="vacancies">Vacancies</label></div>
                                <div class="col-md-3"><input type="checkbox" id="vacancies" name="vacancies"
                                                             class="form-control"</div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3" style="padding-top: 2%;"><label for="tenders">Tenders</label></div>
                                <div class="col-md-3"><input type="checkbox" id="tenders" name="tenders"
                                                             class="form-control"</div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3" style="padding-top: 2%;"><label for="resources">Resources</label></div>
                                <div class="col-md-3"><input type="checkbox" id="resources" name="resources"
                                                             class="form-control"</div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3" style="padding-top: 2%;"><label for="articles">Articles</label></div>
                                <div class="col-md-3"><input type="checkbox" id="articles" name="articles"
                                                             class="form-control"</div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3" style="padding-top: 2%;"><label for="departments">Departments</label></div>
                                <div class="col-md-3"><input type="checkbox" id="departments" name="departments"
                                                             class="form-control"</div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3" style="padding-top: 2%;"><label for="users">Users</label></div>
                                <div class="col-md-3"><input type="checkbox" id="users" name="users"
                                                             class="form-control"</div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3" style="padding-top: 2%;"><label for="fund_managers">Fund Managers</label></div>
                                <div class="col-md-3"><input type="checkbox" id="fund_managers" name="fund_managers"
                                                             class="form-control"</div>
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