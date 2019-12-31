<div class="modal-header btn-success">
    <h4 class="modal-title txt-color-white" id="myModalLabel">Report Entry Part III</h4>
</div>
<br>
<form id="editReportPartIII" class="form-horizontal" method="post">

    <div class="form-group">
        <label class="col-md-2 control-label">Staff ID</label>
        <div class="col-md-2">
            <input name="form[staff_id]" class="form-control" type="text" value="<?php echo $staff_id?>" id="staff_id" readonly>
        </div>

        <div class="col-md-6">
            <input name="" class="form-control" type="text" value="<?php echo $staff_name?>" id="staff_name" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Conference Title</label>
        <div class="col-md-2">
            <input name="form[conference_id]" class="form-control" type="text" value="<?php echo $refid?>" id="crRefid" readonly>
        </div>

        <div class="col-md-6">
            <input name="" class="form-control" type="text" value="<?php echo $crName?>" id="crName" readonly>
        </div>
    </div>

    <div class="alert alert-info fade in">
        <b>Part III</b>
    </div>

    <div id="alertEditReportPartIII">
        <!--<b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>-->
    </div>
    <br>

    <div class="form-group">
        <div class="col-md-2"></div>    
        <label class="col-md-6 control-label text-left">State the knowledge / understanding / experience that have been gained.</label>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-sm-8">
            <textarea name="form[conference_experience]" placeholder="Conference experience" class="form-control" type="text" rows="4" cols="50"><?php echo $scr_exp?></textarea>
        </div>
    </div>

    <div class="form-group">   
        <div class="col-md-2"></div>  
        <label class="col-md-6 control-label text-left">Have you established a networking relationship when attending Conferences / Seminars / Workshops at home or abroad? With whom? How did you create that networking relationship?</label>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-sm-8">
            <textarea name="form[conference_remark]" placeholder="Remark" class="form-control" type="text" rows="4" cols="50"><?php echo $scr_remark?></textarea>
        </div>
    </div>

    <div id="alertEditReportPartIIIFooter"></div>
    <div class="modal-footer">
        <button type="button" class="btn btn-primary edit_rep_part_iii"><i class="fa fa-save"></i> Save</button>
    </div>
</form>

<br>
<div class="alert alert-info fade in">
    <b>How will you use your new knowledge / understanding / experience gained from conferences / seminars / workshops?</b>
</div>
<br>
<div class="text-right">
    <button type="button" class="btn btn-primary btn-sm add_scrpii" data-refid="<?php echo $refid?>" data-staff-id="<?php echo $staff_id?>"><i class="fa fa-plus"></i> Add Record</button>
</div>
<br>
<div class="well">
    <div class="row table-condensed table-responsive">
        <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th class="text-left col-md-4">Plan / Activity / Follow-Up at PTj</th>
            <th class="text-center col-md-1">Date will be implemented</th>
            <th class="text-center col-md-1">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
            if (!empty($scr_partii)) {
                foreach ($scr_partii as $sp) {
                    echo '
                    <tr>
                        <td class="text-left">' . $sp->SCRP2_ACTIVITY . '</td>
                        <td class="text-center">' . $sp->SCRP2_IMPLEMENT_DATE . '</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-danger btn-xs delete_scrpii"><i class="fa fa-trash"></i> Delete</button>
                        </td>
                    </tr>
                    ';
                }
            } else {
                echo '
                    <tr>
                        <td class="text-center" colspan="6">No record found</td>
                    </tr>
                    ';
            } 
        ?>
        </tbody>
        </table>	
    </div>
</div>
</p>
<br>

<br>
<div class="alert alert-info fade in">
    <b>Please upload the relevant supporting documents (eg certificate, certificate of attendance, the front cover of the program)</b>
</div>
<br>
<div class="text-left">
    <button type="button" class="btn btn-primary btn-lg file_attach_part_iii"><i class="fa fa-upload"></i> File Attachment</button>
</div>