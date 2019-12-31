<form id="resendEmailForm" class="form-horizontal" method="post">
    <div class="modal-header btn-danger">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Resend Email</h4>
    </div>
    <div class="modal-body">
        <div id="resendEmailAlert">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Refid</label>
            <div class="col-md-9">
                <input name="form[refid]" class="form-control" type="text" value="" id="refid" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">From</label>
            <div class="col-md-9">
                <input name="form[from]" class="form-control" type="text" value="" id="from" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Staff ID To</label>
            <div class="col-md-9">
            <?php ?>
                <input name="form[staff_id_to]" class="form-control" type="text" value="" id="sit" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Name To</label>
            <div class="col-md-9">
                <input name="form[name_to]" class="form-control" type="text" value="" id="nameTo" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Email To</label>
            <div class="col-md-9">
                <input name="form[email_to]" class="form-control" type="text" value="" id="emailTo">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Staff ID CC</label>
            <div class="col-md-9">
                <input name="form[staff_id_cc]" class="form-control" type="text" value="" id="staffIDcc" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Name CC</label>
            <div class="col-md-9">
                <input name="form[staff_id_cc]" class="form-control" type="text" value="" id="staffNamecc" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Email CC</label>
            <div class="col-md-9">
                <input name="form[email_cc]" class="form-control" type="text" value="" id="emailCC">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Title <b><font color="red">*</font></b></label>
            <div class="col-md-9">
                <input name="form[title]" class="form-control" type="text" value="" id="emailTitle">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Content <b><font color="red">*</font></b></label>
            <div class="col-md-9">
                <textarea name="form[content]" placeholder="Content" class="form-control" type="text" rows="14" id="emailContent"></textarea>
            </div>
        </div>

        <div id="resendEmailAlertFooter">
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="button" class="btn btn-danger resend_email_btn_mdl"><i class="fa fa-envelope"></i> Send Email</button>
    </div>
</form>