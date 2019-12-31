<p>
<div class="well">
	<div class="row table-condensed">
		<table class="table table-bordered table-hover" id="tbl_tr_list">
		<thead>
		<tr>
			<th class="text-center">Ref ID</th>
            <th class="text-left">Title</th>
            <th class="text-center">Date From</th>
            <th class="text-center">Date To</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($tr_list)) {
				foreach ($tr_list as $trl) {
					echo '
                    <tr>
						<td class="text-center col-md-2 refid">' . $trl->TH_REF_ID . '</td>
                        <td class="text-left title">' . $trl->TH_TRAINING_TITLE . '</td>
                        <td class="text-center col-md-1">' . $trl->TH_DATE_FROM2 . '</td>
                        <td class="text-center col-md-1">' . $trl->TH_DATE_TO2 . '</td>
                        <td class="text-center col-md-1">
                            <div class="btn-group">
                                <button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button>
                                <div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn">

                                    <button type="button" class="btn btn-primary text-left btn-block btn-xs staff_list_btn"><i class="fa fa-users"></i> Assign Staff</button>

                                    <button type="button" class="btn btn-info text-left btn-block btn-xs select_training_btn"><i class="fa fa-info-circle"></i> Details</button>

                                    <button type="button" class="btn btn-success text-left btn-block btn-xs cpd_pts_btn"><i class="fa fa fa-upload"></i> CPD Point</button>

                                    <button type="button" class="btn btn-warning text-left btn-block btn-xs svc_book_btn"><i class="fa fa-book"></i> Service Book</button>
                                    
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