<form id="editOrganizer" class="form-horizontal" method="post" autocomplete="off">
    <div class="modal-header btn-success">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Edit Record</h4>
    </div>
    <div class="modal-body">
        <div id="editOrganizerAlert">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Code</label>
            <div class="col-md-2">
                <input name="form[code]" placeholder="Code" class="form-control" type="text" value="<?php echo $org_detl->TOH_ORG_CODE?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Description</label>
            <div class="col-md-8">
                <input name="form[description]" placeholder="Description" class="form-control" type="text" value="<?php echo $org_detl->TOH_ORG_DESC?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Address</label>
            <div class="col-md-8">
                <input name="form[address]" placeholder="Address" class="form-control" type="text" value="<?php echo $org_detl->TOH_ADDRESS?>" autocomplete="in-address">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Postcode</label>
            <div class="col-md-2">
                <input name="form[postcode]" placeholder="Postcode" class="form-control" type="text" value="<?php echo $org_detl->TOH_POSTCODE?>" autocomplete="in-postcode">
            </div>

            <label class="col-md-2 control-label">City</label>
            <div class="col-md-2">
                <input name="form[city]" placeholder="City" class="form-control" type="text" value="<?php echo $org_detl->TOH_CITY?>" autocomplete="in-city">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">State <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[state]', $state_dd, $org_detl->TOH_STATE, 'class="form-control" style="width: 100%"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Country <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[country]', array('MYS'=>'Malaysia'), $org_detl->TOH_COUNTRY, 'class="form-control" style="width: 100%" readonly')
                ?>
            </div>
        </div>

    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary upd_org"><i class="fa fa-save"></i> Save</button>
    </div>
</form>
