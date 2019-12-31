<form id="sendMemo" class="form-horizontal" method="post">
    <div class="modal-header btn-danger">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Send Email</h4>
    </div>
    <div class="modal-body">
        <div id="alertSendMemo">
        </div>

        <input name="form[refid]" class="form-control" value="<?php echo $refid?>" type="hidden" readonly>

        <div class="form-group">
            <label class="col-md-2 control-label">From</label>
            <div class="col-md-9">
                <input name="form[from]" placeholder="From" class="form-control" value="<?php echo $memo_from?>" type="text" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">To (Staff ID)</label>
            <div class="col-md-9">
                <input name="form[to_staff_id]" placeholder="To (Staff ID)" value="<?php echo $staff_app->SM_STAFF_ID?>" class="form-control" type="text" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">To (Name)</label>
            <div class="col-md-9">
                <input name="form[to_name]" placeholder="To (Name)" value="<?php echo $staff_app->SM_STAFF_NAME?>" class="form-control" type="text" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">To (Email)</label>
            <div class="col-md-9">
                <input name="form[to_email]" placeholder="To (Email)" value="<?php echo $staff_app->SM_EMAIL_ADDR?>" class="form-control" type="text" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">CC (Staff ID)</label>
            <div class="col-md-9">
                <input name="form[cc_staff_id]" placeholder="CC (Staff ID)" value="<?php echo $eva_id?>" class="form-control" type="text" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">CC (Name)</label>
            <div class="col-md-9">
                <input name="form[cc_name]" placeholder="CC (Name)" value="<?php echo $eva_name?>" class="form-control" type="text" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">CC (Email)</label>
            <div class="col-md-9">
                <input name="form[cc_email]" placeholder="CC (Email)" value="<?php echo $email_cc?>" class="form-control" type="text" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Title</label>
            <div class="col-md-9">
                <input name="form[title]" placeholder="Title" class="form-control" type="text" value="<?php echo $msg_title?>" id="trTitle">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Content</label>
            <div class="col-md-9">
                <textarea name="form[content]" placeholder="Content" class="form-control" type="text" rows="5"><?php echo $msg_content?></textarea>
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-danger send_memo"><i class="fa fa-save"></i> Send Email</button>
    </div>
</form>