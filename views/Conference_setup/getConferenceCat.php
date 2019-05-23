<p>
<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm add_cc_btn"><i class="fa fa-plus"></i> Add new Conference Category</button>
</div>
<br>
<div class="well table-responsive">
	<div class="row table-condensed">
		<table class="table table-bordered table-hover" id="tbl_cc_list">
		<thead>
		<tr>
			<th class="text-center">Code</th>
            <th class="text-left">Category</th>
			<th class="text-center">From (RM)</th>
            <th class="text-center">To (RM)</th>
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
						<td class="text-center col-md-1 cc_code">' . $cc->CC_CODE . '</td>
						<td class="text-left col-md-3 cc_desc">' . $cc->CC_DESC . '</td>
                        <td class="text-center col-md-2 cc_from">' . number_format($cc->CC_RM_AMOUNT_FROM,2) . '</td>
                        <td class="text-center col-md-2 cc_to">' . number_format($cc->CC_RM_AMOUNT_TO,2) . '</td>
                        <td class="text-center col-md-1 cc_head_rec">' . $cc->CC_HEAD_RECOMMEND . '</td>
                        <td class="text-center col-md-1 cc_tnca_app">'.$cc->CC_TNCA_APPROVE.'</td>
                        <td class="text-center col-md-1 cc_vc_app">'.$cc->CC_VC_APPROVE.'</td>
                        <td class="text-center col-md-1 cc_sts">'.$cc->CC_STATUS.'</td>
						<td class="text-center col-md-2">
							<div class="btn-group">
								<button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button>
									<div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn">
										<button type="button" class="btn btn-success text-left btn-block btn-xs edit_cc_btn"><i class="fa fa-pencil-square-o"></i> Edit</button>
										<button type="button" class="btn btn-danger text-left btn-block btn-xs del_cc_btn"><i class="fa fa-trash"></i> Delete</button>
									</div>
								</div>
							</div>
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