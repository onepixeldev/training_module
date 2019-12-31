<form id="crCpdSetup" class="form-horizontal" method="post">
    <br>

    <div class="form-group">
        <label class="col-md-2 control-label">Conference Title</label>
        <div class="col-md-2">
            <input name="form[refid]" class="form-control" type="text" value="<?php echo $refid?>" id="refid" readonly>
        </div>

        <div class="col-md-8">
            <input name="" class="form-control" type="text" value="<?php echo $title?>" id="title" readonly>
        </div>
    </div>

    <div class="alert alert-info fade in">
        <b>Conference Setup CPD</b>
    </div>

    <div class="row">
        <div class="container col-md-12">
            <div class="panel panel-default text-left">

                <div id="crCpdSetupAlert">
                </div>

                <div class="panel-body" id="summary">
                    <div id="" class="text-left">
                        <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Competency</label>
                        <div class="col-md-2">
                            <?php echo form_dropdown('form[competency]', array(''=>'--- Please Select ---', 'KHUSUS'=>'KHUSUS', 'UMUM'=>'UMUM', 'TERAS'=>'TERAS'), $competency, 'class="form-control"'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Category</label>
                        <div class="col-md-6">
                            <?php echo form_dropdown('form[category]', $cpd_cat_list, $category, 'class="form-control"'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Mark</label>
                        <div class="col-md-2">
                            <input name="form[mark]" placeholder="Mark" value="<?php echo $mark?>" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Report Submission ?</label>
                        <div class="col-md-2">
                            <?php echo form_dropdown('form[report_submission]', array(''=>'--- Please Select ---', 'Y'=>'Yes', 'N'=>'No'), $rep_sub, 'class="form-control"'); ?>
                        </div>

                        <label class="col-md-2 control-label">Compulsory ?</label>
                        <div class="col-md-2">
                            <?php echo form_dropdown('form[compulsory]', array(''=>'--- Please Select ---', 'Y'=>'Yes', 'N'=>'No'), $com, 'class="form-control"'); ?>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger del_con_cpd hidden"><i class="fa fa-trash"></i> Delete</button>
                        <button type="submit" class="btn btn-primary save_upd_con_cpd"><i class="fa fa-save"></i> Save</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>