<form id="editConInfo" class="form-horizontal" method="post">
    <div class="modal-header btn-success">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Edit Conference</h4>
    </div>
    <div class="modal-body">
        <div id="editConInfoAlert">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>
            <div style="text-indent: 43px;">( <b><font color="blue">*</font></b> ) <b><font color="red">to disable this function, put 0 as the value</font></b></div>
            &nbsp; <span id="note"></span>
        </div>

        <input name="form[refid]" class="form-control" type="hidden" value="<?php echo $detl->CM_REFID?>">

        <div class="form-group">
            <label class="col-md-3 control-label">Title <b><font color="red">* </font></b></label>
            <div class="col-md-8">
                <input name="form[title]" placeholder="Title" class="form-control" type="text" value="<?php echo $detl->CM_NAME?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Date From</label>
            <div class="col-md-4">
                <input name="form[date_from]" placeholder="Date From" class="datepicker form-control" type="text" id="datepicker" value="<?php echo $detl->CM_DATE_FROM?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Date To</label>
            <div class="col-md-4">
                <input name="form[date_to]" placeholder="Date To" class="datepicker form-control" type="text" id="datepicker" value="<?php echo $detl->CM_DATE_TO?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Description</label>
            <div class="col-md-8">
                <textarea name="form[description]" placeholder="Description" class="form-control" type="text" rows="4" cols="50"><?php echo $detl->CM_DESC?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Address <b><font color="red">* </font></b></label>
            <div class="col-md-8">
                <textarea name="form[address]" placeholder="Address" class="form-control" type="text" rows="4" cols="50"><?php echo $detl->CM_ADDRESS?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">City </label>
            <div class="col-md-6">
                <input name="form[city]" placeholder="City" class="form-control" type="text" value="<?php echo $detl->CM_CITY?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Postcode </label>
            <div class="col-md-6">
                <input name="form[postcode]" placeholder="Postcode" class="form-control" type="text" value="<?php echo $detl->CM_POSTCODE?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">State <b><font color="red">* </font></b></label>
            <div class="col-md-8">
                <?php
                    echo form_dropdown('form[state]', $state_list, $detl->CM_STATE, 'class="form-control" style="width: 100%"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Country <b><font color="red">* </font></b></label>
            <div class="col-md-8">
                <?php
                    echo form_dropdown('form[country]', $country_list, $detl->CM_COUNTRY_CODE, 'class="form-control" style="width: 100%"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Organizer Name <b><font color="red">* </font></b></label>
            <div class="col-md-8">
                <input name="form[organizer_name]" placeholder="Organizer Name" class="form-control" type="text" value="<?php echo $detl->CM_ORGANIZER_NAME?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Level <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[level]', $lvl_list, $detl->CM_LEVEL, 'class="form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Temporary Open</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[temporary_open]', array(''=>'---Please Select---', 'Y'=>'Yes', 'N'=>'No'), $detl->CM_TEMP_OPEN, 'class="form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Total Participant <b><font color="blue">* </font></b></label>
            <div class="col-md-8">
                <input name="form[total_participant]" placeholder="Total Participant" class="form-control" type="text" value="<?php echo $detl->CM_PARTICIPANT?>">
            </div>
        </div>

        <div id="editConInfoAlertFoot"></div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary edit_con_info"><i class="fa fa-save"></i> Save</button>
    </div>
</form>