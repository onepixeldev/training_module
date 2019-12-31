<form id="sendMemoEvaluator" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Send Memo to Evaluator</h4>
    </div>
    <div class="modal-body">
        <div id="alertSendMemoEvaluator">
        </div>

        <input name="form[refid]" class="form-control" value="" type="hidden" readonly>

        <div class="form-group">
            <label class="col-md-2 control-label">From :</label>
            <div class="col-md-2">
                <input name="form[from]" placeholder="From" class="form-control" value="<?php echo $sendFrom->SM_STAFF_ID?>" type="text" id="staffIDFrom" readonly>
            </div>
            <div class="col-md-7">
                <input name="form[from_name]" class="form-control" value="<?php echo $sendFrom->SM_STAFF_NAME?>" type="text" id="staffNameFrom" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">To :</label>
            <div class="col-md-2">
                <input name="form[to]" placeholder="To" class="form-control" value="<?php echo $eva_id?>" type="text" id="staffIDTo" readonly>
            </div>
            <div class="col-md-7">
                <input name="form[to_name]" class="form-control" value="<?php echo $eva_name?>" type="text" id="staffNameTo" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">CC :</label>
            <div class="col-md-9">
                <input name="form[memo_cc]" placeholder="CC" value="<?php echo $staffID?>" class="form-control" type="text" id="staffIDCC" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Seq Send Memo :</label>
            <div class="col-md-9">
                <input name="form[seq_send_memo]" placeholder="Seq Send Memo" value="<?php echo $teh_seq_val?>" class="form-control" type="text" id="seqSendMemo" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Training Ref ID :</label>
            <div class="col-md-2">
                <input name="form[training_ref_id]" placeholder="Training Ref ID" class="form-control" value="<?php echo $refid?>" type="text" id="trRefid" readonly>
            </div>
            <div class="col-md-7">
                <input name="form[tr_name]" class="form-control" value="<?php echo $tr_title?>" type="text" id="trName" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Title</label>
            <div class="col-md-9">
                <input name="form[title]" placeholder="Title" class="form-control" type="text" value="<?php echo $title?>" id="trTitle" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Content</label>
            <div class="col-md-9">
                <textarea name="form[content]" placeholder="Content" class="form-control" type="text" rows="18" id="memContent" readonly><?php echo $content?></textarea>
            </div>
        </div>
        <div id="alertSendMemoEvaluatorFooter">
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary send_memo"><i class="fa fa-paper-plane"></i> Send Memo</button>
    </div>
</form>