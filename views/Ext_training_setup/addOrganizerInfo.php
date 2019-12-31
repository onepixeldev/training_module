<form id="addOrganizer" class="form-horizontal" method="post" autocomplete="off">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Add New Organizer</h4>
    </div>
    <div class="modal-body">
        <div id="addOrganizerAlert">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Code <b><font color="red">* </font></b></label>
            <div class="col-md-2">
                <input name="form[code]" placeholder="Code" class="form-control" type="text" style="text-transform:uppercase">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Description</label>
            <div class="col-md-8">
                <input name="form[description]" placeholder="Description" class="form-control" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Address</label>
            <div class="col-md-8">
                <input name="form[address]" placeholder="Address" class="form-control" type="text" autocomplete="in-address">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Postcode</label>
            <div class="col-md-2">
                <input name="form[postcode]" placeholder="Postcode" class="form-control" type="text" autocomplete="in-postcode">
            </div>

            <label class="col-md-2 control-label">City</label>
            <div class="col-md-2">
                <input name="form[city]" placeholder="City" class="form-control" type="text" autocomplete="in-city">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">State <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[state]', $state_dd, '', 'class="form-control" style="width: 100%"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Country <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[country]', array('MYS'=>'Malaysia'), 'MYS', 'class="form-control" style="width: 100%" readonly')
                ?>
            </div>
        </div>

    </div>
    
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary ins_org"><i class="fa fa-save"></i> Save</button>
    </div>
</form>