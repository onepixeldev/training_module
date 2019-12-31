<form id="addConCountry" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Add New Country</h4>
    </div>
    <div class="modal-body">
        <div id="addConCountryAlert">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Country Code <b><font color="red">* </font></b></label>
            <div class="col-md-8">
                <?php
                    echo form_dropdown('form[country_code]', $country_list, '', 'class="select2-filter form-control" style="width: 100%"')
                ?>
            </div>
        </div>

    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary ins_ccs"><i class="fa fa-save"></i> Save</button>
    </div>
</form>

<script>
    $('.select2-filter').select2({
        dropdownParent: $('#myModalis2'),
        tags: 'true',
        // placeholder: 'Select an option',
        width: 'resolve'
    });
</script>