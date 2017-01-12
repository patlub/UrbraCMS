<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top: 5%;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Comment</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7">
                        <form role="form" method="post">
                            <div class="form-group">
                                <label for="name">Name</label><input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label><input type="email" id="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject</label><input type="text" id="subject" name="subject" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="content">Comment</label><textarea cols="50" rows="5" id="content" name="content" class="form-control" required=""></textarea>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="send" value="SEND" class="form-control btn btn-primary">
                            </div>

                        </form>
                    </div>
                    <div class="col-md-5 item-description"
                         style="padding-left: 5%;padding-top: 0;margin-top: 0;text-align: left; font-size: 120%;">
                        <div class="row" style="font-weight: bold;margin-bottom: 3%;">Contact Information</div>
                        <div class="row">Address: 3rd to 6th floor Plot 1 Clement hill road</div>
                        <div class="row">Po Box: 7561 Kampala, Uganda</div>
                        <div class="row">Email Address: urbra@urbra.go.ug</div>
                        <div class="row">Tel Number: 256 417 304 500</div>
                    </div>
                    <div class="col-md-6"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>