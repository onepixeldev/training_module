<form id="insCpdSetup" class="form-horizontal" method="post">
    <div class="modal-header btn-primary">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Add New CPD</h4>
    </div>
    <div class="modal-body">
        <div id="alertInsCpd">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <input name="form[refid]" class="form-control" value="<?php echo $refid ?>" type="hidden" readonly>

        <div class="form-group">
            <label class="col-md-4 control-label">Competency <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[competency]', array(''=>'---Please Select---', 'KHUSUS'=>'KHUSUS', 'UMUM'=>'UMUM', 'TERAS'=>'TERAS'), '', 'class="selectpicker form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Category <b><font color="red">* </font></b></label>
            <div class="col-md-8">
                <?php
                    echo form_dropdown('form[category]', $category_list, '', 'class="selectpicker form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Mark</label>
            <div class="col-md-2">
                <input name="form[mark]" placeholder="Mark" class="form-control" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Report Submission <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[report_submission]', array(''=>'---Please Select---', 'Y'=>'YES', 'N'=>'NO'), '', 'class="selectpicker form-control width-50"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Compulsory? <b><font color="red">* </font></b></label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[compulsory]', array(''=>'---Please Select---', 'Y'=>'YES', 'N'=>'NO'), '', 'class="selectpicker form-control width-50"')
                ?>
            </div>
        </div>
        
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="submit" class="btn btn-primary ins_cpd"><i class="fa fa-save"></i> Save</button>
    </div>
</form>