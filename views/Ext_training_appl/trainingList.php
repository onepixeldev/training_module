<p>
<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm add_tr"><i class="fa fa-plus"></i> Add New Training</button>
</div>
<br>
<div id="loader"></div>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_list_tl">
		<thead>
		<tr>
			<th class="text-center">Ref ID</th>
			<th class="text-left">Training</th>
            <th class="text-center">Date From</th>
            <th class="text-center">Date To</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($tr_list)) {
				foreach ($tr_list as $tl) {
					echo '
                    <tr>
						<td class="text-center col-md-2 refid">' . $tl->TH_REF_ID . '</td>
                        <td class="text-left title">' . $tl->TH_TRAINING_TITLE . '</td>
                        <td class="text-center col-md-1">' . $tl->TH_DATE_FROM2 . '</td>
                        <td class="text-center col-md-1">' . $tl->TH_DATE_TO2 . '</td>
                        <td class="text-center col-md-1">
                            <div class="btn-group">
                                <button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button>
                                <div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn">
                                    <button type="button" class="btn btn-success text-left btn-block btn-xs upd_tr" value=""><i class="fa fa-edit"></i> Edit</button>
                                    <button type="button" class="btn btn-danger text-left btn-block btn-xs del_tr" value=""><i class="fa fa-trash"></i> Delete</button>
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