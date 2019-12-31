<form id="formTrainingFacilitator" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Add New Training Facilitator</h4>
    </div>
    <div class="modal-body">
        <div id="alertInsTrFi">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <input name="form[refid]" class="form-control" value="<?php echo $refid ?>" type="hidden" readonly>

        <div class="form-group">
            <label class="col-md-2 control-label">Type <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[type]', array(''=>'---Please Select---', 'STAFF'=>'STAFF', 'EXTERNAL'=>'EXTERNAL'), '', 'class="selectpicker form-control" id="typeFacilitator"')
                ?>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-2 control-label">Facilitator <b><font color="red">* </font></b></label>
            <div class="col-md-9">
                <div id="faspinner3"></div>
                <?php
                    echo form_dropdown('form[facilitator]', array(''=>'---Please Select---'), '', 'class="selectpicker select2-filter form-control" style="width: 100%" id="trFacilitator"')
                ?>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-2 control-label">Label <b><font color="red">* </font></b></label>
            <div class="col-md-9">
                <!--input type="text" name="form[label]" placeholder="Label" class="form-control"-->
                <?php
                    echo form_dropdown('form[label]', array(''=>'---Please Select---','A'=>'A','B'=>'B','C'=>'C','D'=>'D','E'=>'E','F'=>'F','G'=>'G','H'=>'H','I'=>'I','J'=>'J','K'=>'K','L'=>'L','M'=>'M','N'=>'N','O'=>'O','P'=>'P','Q'=>'Q','R'=>'R','S'=>'S','T'=>'T'), '', 'class="form-control" style="width: 50%"')
                ?>
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary ins_fi_info"><i class="fa fa-save"></i> Save</button>
    </div>
</form>

<script>
    $('.select2-filter').select2({
        dropdownParent: $('#myModalis2'),
        tags: 'true',
        placeholder: 'Select an option',
        width: 'resolve'
    });
</script>