<form id="editConAllow" class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Add Record</h4>
    </div>
    <div class="modal-body">
        <div id="editConAllowAlert">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Code</label>
            <div class="col-md-4">
                <input name="form[code]" placeholder="Code" class="form-control" type="text" value="<?php echo $ca_detl->CA_CODE?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Description <b><font color="red">* </font></b></label>
            <div class="col-md-8">
                <input name="form[description]" placeholder="Description" class="form-control" type="text" value="<?php echo $ca_detl->CA_DESC?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Max amount (RM)</label>
            <div class="col-md-4">
                <input name="form[max_amount]" placeholder="Max amount" class="form-control" type="text" value="<?php echo /*number_format(*/$ca_detl->CA_RM_MAX_AMOUNT/*, 2)*/?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Budget Origin (Local)</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[budget_origin_local]', array(''=>'---Please Select---', 'CONFERENCE'=>'CONFERENCE', 'DEPARTMENT'=>'DEPARTMENT', 'PTNCA'=>'PTNCA', 'OTHERS'=>'OTHERS'), $ca_detl->CA_BUDGET_ORIGIN_LOCAL, 'class="form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Budget Origin (oversea)</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[budget_origin_oversea]', array(''=>'---Please Select---', 'CONFERENCE'=>'CONFERENCE', 'DEPARTMENT'=>'DEPARTMENT', 'PTNCA'=>'PTNCA', 'OTHERS'=>'OTHERS'), $ca_detl->CA_BUDGET_ORIGIN_OVERSEAS, 'class="form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Status</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[status]', array(''=>'---Please Select---', 'ACTIVE'=>'ACTIVE', 'INACTIVE'=>'INACTIVE'), $ca_detl->CA_STATUS, 'class="form-control width-50"')
                ?>
            </div>
        </div>

    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary upd_ca"><i class="fa fa-save"></i> Save</button>
    </div>
</form>