<style>
    div {
        /*border: 1px solid red;*/
    }
</style>

<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     style="margin-top: 5%;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add User</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7">
                        <form id="add-user-form" role="form" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label for="first-name">First Name</label><input type="text" id="first-name"
                                                                                 name="first-name"
                                                                                 class="form-control"
                                                                                 required>
                            </div>
                            <div class="form-group">
                                <label for="last-name">Last Name</label><input type="text" id="last-name"
                                                                               name="last-name"
                                                                               class="form-control"
                                                                               required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label><input type="email" id="email" name="email"
                                                                       class="form-control"
                                                                       required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label><input type="password" id="password"
                                                                             name="password"
                                                                             class="form-control"
                                                                             required>
                            </div>
                            <div class="form-group">
                                <label for="confirm">Re-enter Password</label>
                                <input type="password" id="confirm" name="confirm"
                                       class="form-control"
                                       required>
                            </div>

                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('#check-all').change(function () {
                                        if ($(this).prop('checked')) {
                                            $('input').prop('checked', true);
                                        } else {
                                            $('input').prop('checked', false);
                                        }
                                    });
                                    $('#check-all').trigger('change');
                                });

                            </script>
                            <div class="row" style="padding-left: 1%;">
                                <div class="col-md-3" style="padding-top: 2%; color: red;"><label
                                        for="check-all">Auto Check</label></div>
                                <div class="col-md-3"><input type="checkbox" value=""
                                                             id="check-all" name="check-all"
                                                             class="form-control"></div>
                            </div>

                            <div class="">
                                <?php

                                $db_helper = new DatabaseHelper();
                                $db_helper->get_pages();

                                ?>
                            </div>


                            <div class="form-group" style="margin-top: 10%;">
                                <input type="submit" name="submit" value="SUBMIT" class="form-control btn btn-success"
                                       style="margin-top: 10%;">
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