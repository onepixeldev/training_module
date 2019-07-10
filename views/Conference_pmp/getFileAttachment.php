<form id="getFileAttachment" class="form-horizontal" method="post">
    <br>
    <div class="form-group">
        <label class="col-md-2 control-label">Staff ID</label>
        <div class="col-md-2">
            <input name="form[staff_id]" class="form-control" type="text" value="<?php echo $staff_id?>" id="staff_id" readonly>
        </div>

        <div class="col-md-8">
            <input name="form[staff_name]" class="form-control" type="text" value="<?php echo $staff_name?>" id="staff_name" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Conference Title</label>
        <div class="col-md-2">
            <input name="form[refid]" class="form-control" type="text" value="<?php echo $refid?>" id="cr_refid" readonly>
        </div>

        <div class="col-md-8">
            <input name="form[conference_name]" class="form-control" type="text" value="<?php echo $con_name?>" id="cr_name" readonly>
        </div>
    </div>
</form>
<p>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_ca_list">
		<thead>
		<tr>
            <th class="text-center">Attachment ID</th>
			<th class="text-left">File Name</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($file_att)) {
				foreach ($file_att as $fa) {
					echo '
                    <tr>
                        <td class="text-center staff_id col-md-2">' . $fa->SAA_ATTACH_REFID . '</td>
						<td class="text-left staff_id">' . $fa->SAA_FILENAME . '</td>
						<td class="text-center col-md-1">
							<button type="button" class="btn btn-primary btn-xs download_file"><i class="fa fa-download"></i> View File Attachment</button>
						</td>
					</tr>
					';
				}
			} else {
                echo '
                    <tr>
						<td class="text-center" colspan="3">No record found</td>
					</tr>
					';
            }
		?>
		</tbody>
		</table>	
	</div>
</div>
</p>