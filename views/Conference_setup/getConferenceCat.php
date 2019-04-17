<p>
<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm assign_stf_btn" id="assignStf" value=""><i class="fa fa-plus"></i> Add new Conference Category</button>
</div>
<br>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_cc_list">
		<thead>
		<tr>
			<th class="text-center">Code</th>
            <th class="text-left">Category</th>
			<th class="text-center">From</th>
            <th class="text-center">To</th>
            <th class="text-center">Head Recommend?</th>
            <th class="text-center">TNC (A&A) Approve?</th>
            <th class="text-center">VC Approve?</th>
            <th class="text-center">Active ?</th>
			<th class="text-center col-md-1">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($conference_cat)) {
				foreach ($conference_cat as $cc) {
					echo '
                    <tr>
						<td class="text-center col-md-1">' . $cc->CC_CODE . '</td>
						<td class="text-left col-md-3">' . $cc->CC_DESC . '</td>
                        <td class="text-center col-md-2">' . $cc->CC_RM_AMOUNT_FROM . '</td>
                        <td class="text-center col-md-2">' . $cc->CC_RM_AMOUNT_TO . '</td>
                        <td class="text-center col-md-1">' . $cc->CC_HEAD_RECOMMEND . '</td>
                        <td class="text-center col-md-1">'.$cc->CC_TNCA_APPROVE.'</td>
                        <td class="text-center col-md-1">'.$cc->CC_VC_APPROVE.'</td>
                        <td class="text-center col-md-1">'.$cc->CC_STATUS.'</td>
						<td class="text-center col-md-2">
							<button type="button" class="btn btn-success btn-xs sta_edit_btn"><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs sta_del_btn"><i class="fa fa-times-circle"></i> Delete</button>
						</td>
					</tr>
                    ';
				}
			}
		?>
		</tbody>
		</table>	
	</div>
</div>
</p>