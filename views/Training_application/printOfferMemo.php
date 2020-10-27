<form id="printOfferMemo" class="form-horizontal" method="post">
    <div class="modal-header btn-danger">
        <h4 class="modal-title txt-color-white" id="myModalLabel">Print Offer Memo</h4>
    </div>
    <div class="modal-body">
        <div id="printOfferMemoAlert">
            <b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Month</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[month]', $month_list, '', 'class="selectpicker form-control width-50 monYerFilter" id="monthFil"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Year</label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[year]', $year_list, '', 'class="selectpicker form-control width-50 monYerFilter" id="yearFil"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <div id="loaderMdl"></div>
            <label class="col-md-3 control-label">Course Title <b><font color="red">*</font></b> </label>
            <div class="col-md-2">
                <input name="form[refid]" class="form-control" type="text" value="" id="courseRefID" readonly>
            </div>
            <div class="col-md-7">
                <?php
                    echo form_dropdown('form[course_title]', array(''=>'--- Please select month or year ---'), '', 'class="selectpicker select2-filter form-control" style="width: 100%" id="courseTitle"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <div id="loaderMdl2"></div>
            <label class="col-md-3 control-label">Date of sending email </label>
            <div class="col-md-4">
                <?php
                    echo form_dropdown('form[date_of_sending_email]', array(''=>'--- Please select Course Title ---'), '', 'class="selectpicker form-control width-50" id="sendDate"')
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Reference No. <b><font color="red">*</font></b></label>
            <div class="col-md-4">
                <input name="form[reference_no]" class="form-control" type="text" value="<?php echo $ref_no?>" id="refNo">
            </div>
        </div>


    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Cancel</button>
        <button type="button" class="btn btn-danger print_mem_btn"><i class="fa fa-print"></i> Print Memo</button>
    </div>
</form>

<script>
    $('.select2-filter').select2({
        tags: true,
        dropdownParent: $("#myModalis"),
        placeholder: 'Select an option',
        width: 'resolve'
    });
</script>