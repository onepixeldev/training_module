<div class="modal-header btn-success">
    <h4 class="modal-title txt-color-white" id="myModalLabel">Report Entry Part II</h4>
</div>
<br>
<form id="editReportPartII" class="form-horizontal" method="post">

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
        <b>Part II</b>
    </div>

    <div id="alertEditReportPartII">
        <!--<b>Note : </b> ( <b><font color="red">*</font></b> ) <b><font color="red">compulsory fields</font></b><br>&nbsp; <span id="note"></span>-->
    </div>
    <br>

    <div class="form-group">  
        <div class="col-sm-2"></div>  
        <label class="col-md-6 control-label text-left">State the content of Conferences / Seminars / Workshops relevant to your field of expertise</label>
    </div>

    <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <textarea name="form[conference_content]" placeholder="Conference content" class="form-control" type="text" rows="4" cols="50"><?php echo $scr_content?></textarea>
        </div>
    </div>

    <!--<div id="alertEditReportPartIIFooter"></div>-->
    
    <div class="modal-footer">
        <button type="button" class="btn btn-primary edit_rep_part_ii"><i class="fa fa-save"></i> Save</button>
    </div>
</form>

<br>
<p>
<div class="alert alert-info fade in">
    <b>Established networks and relationships (at least (3) people)</b>
</div>
<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm add_rec_net_relay" data-refid="<?php echo $refid?>" data-staff-id="<?php echo $staff_id?>"><i class="fa fa-plus"></i> Add Record</button>
</div>
<br>
<div class="well">
    <div class="row table-condensed table-responsive">
        <table class="table table-bordered table-hover" id="con_sr_list">
        <thead>
        <tr>
            <th class="text-left col-md-4">Name</th>
            <th class="text-center col-md-1">Expertise</th>
            <th class="text-center col-md-1">Institution</th>
            <th class="text-center col-md-2">Tel No.</th>
            <th class="text-center col-md-2">Email</th>
            <th class="text-center col-md-1">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
            if (!empty($scr_parti)) {
                foreach ($scr_parti as $si) {
                    echo '
                    <tr>
                        <td class="text-left">' . $si->SCRP1_NAME . '</td>
                        <td class="text-center">' . $si->SCRP1_FIELD . '</td>
                        <td class="text-center">' . $si->SCRP1_INSTITUITION . '</td>
                        <td class="text-center">' . $si->SCRP1_TELNO . '</td>
                        <td class="text-center">' . $si->SCRP1_EMAIL . '</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-danger btn-xs delete_scrpi"><i class="fa fa-trash"></i> Delete</button>
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