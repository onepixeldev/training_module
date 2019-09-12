<form id="conDetails" class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Conference Details</h4>
    </div>
    <div class="modal-body">
        <div id="conDetailsAlert">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Refid</label>
            <div class="col-md-2">
                <input name="form[refid]" class="form-control" type="text" value="<?php echo $refid ?>" readonly>
            </div>
            <div class="col-md-8">
                <input placeholder="Conference Title" class="form-control" value="<?php echo $title ?>" type="text" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Address</label>
            <div class="col-md-10">
                <input placeholder="Address" class="form-control" value="<?php echo $cr_detl->CM_ADDRESS ?>" type="text" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">City</label>
            <div class="col-md-4">
                <input placeholder="City" class="form-control" value="<?php echo $cr_detl->CM_CITY ?>" type="text" readonly>
            </div>

            <label class="col-md-2 control-label">Postcode</label>
            <div class="col-md-4">
                <input placeholder="Postcode" class="form-control" value="<?php echo $cr_detl->CM_POSTCODE ?>" type="text" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">State</label>
            <div class="col-md-4">
                <input placeholder="State" class="form-control" value="<?php echo $cr_detl->SM_STATE_DESC ?>" type="text" readonly>
            </div>

            <label class="col-md-2 control-label">Country</label>
            <div class="col-md-4">
                <input placeholder="Country" class="form-control" value="<?php echo $cr_detl->CM_COUNTRY_DESC ?>" type="text" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Organizer</label>
            <div class="col-md-10">
                <input name="" placeholder="Organizer" class="form-control" value="<?php echo $cr_detl->CM_ORGANIZER_NAME ?>" type="text" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Level <b><font color="red">*</font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[level]', $lvl_list, $cr_detl->CM_LEVEL, 'class="form-control" style="width: 100%"')
                ?>
            </div>
        </div>

    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary upd_crdetl_cpd_btn"><i class="fa fa-save"></i> Save</button>
    </div>
</form>