<p>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_tr_list">
		<thead>
		<tr>
            <th class="text-center">Select</th>
			<th class="text-center">Ref ID</th>
            <th class="text-center">Code</th>
            <th class="text-left">Title</th>
            <th class="text-center">Date From</th>
            <th class="text-center">Date To</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($conference_inf_list)) {
				foreach ($conference_inf_list as $cil) {
					echo '
                    <tr>
                        <td class="text-center col-md-1">
							<div class="form-check text-center">
								<input class="form-check-input position-static chkRefid" type="checkbox" name="chkRefid" id="chkRefid" value="' . $cil->TH_REF_ID  . '" aria-label="...">
							</div>
						</td>
                        <td class="text-center col-md-2 refid">' . $cil->TH_REF_ID . '</td>
                        <td class="text-center col-md-2 code">' . $cil->TH_TRAINING_CODE . '</td>
                        <td class="text-left title">' . $cil->TH_TRAINING_TITLE . '</td>
                        <td class="text-center col-md-1">' . $cil->TH_DATE_FROM2 . '</td>
                        <td class="text-center col-md-1">' . $cil->TH_DATE_TO2 . '</td>
						<td class="text-center col-md-1">
                            <div class="btn-group">
                                <button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button>
                                <div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn">
									<button type="button" class="btn btn-primary text-left btn-block btn-xs staff_list_btn" value=""><i class="fa fa-chevron-right"></i> Staff List</button>
									<button type="button" class="btn btn-info text-left btn-block btn-xs tr_detl_btn" value=""><i class="fa fa-info-circle"></i> Detail</button>
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

    <br>
    <div class="row">
        <div class="text-left">
            <button type="button" class="btn btn-info btn-sm select_all_btn"><i class="fa fa-check-square-o"></i> Select All</button>
            <button type="button" class="btn btn-info btn-sm unselect_all_btn"><i class="fa fa-square-o"></i> Unselect All</button>
            <button type="button" class="btn btn-primary btn-sm approve_by_training"><i class="fa fa-check-square"></i> Approve</button>
        </div>
    </div>
</div>
</p>
<br>
<br>
<div id="tr_detl">
	<div class="hidden" id="tr_detl_in">
		<div class="alert alert-success fade in">
			<b>Details</b>
		</div>

		<ul id="myTabdhq" class="nav nav-tabs bordered">
			<li class="active">
				<a style="color:#000 !important" href="#s1a" data-toggle="tab" aria-expanded="true">Training Info</a>
			</li>
			<li class="">
				<a style="color:#000 !important" href="#s2a" data-toggle="tab" aria-expanded="false">Training Cost</a>
			</li>
			<li class="">
				<a style="color:#000 !important" href="#s3a" data-toggle="tab" aria-expanded="false">Target Group & Module Detail</a>
			</li>
			<li class="">
				<a style="color:#000 !important" href="#s4a" data-toggle="tab" aria-expanded="false">CPD Detail</a>
			</li>
		</ul>
		<!-- myTabContent1 -->
		<div id="myTabContent" class="tab-content padding-10">

			<div class="tab-pane fade active in" id="s1a">
				<div id="training_list_detl">
				</div>
			</div> 

			<div class="tab-pane fade" id="s2a">
				<div id="training_list_detl2">
				</div>
			</div> 

			<div class="tab-pane fade" id="s3a">
				<div id="training_list_detl3">
				</div>
			</div>

			<div class="tab-pane fade" id="s4a">
				<div id="training_list_detl4">
				</div>
			</div>

		</div>
		<!-- end myTabContent1 -->
	</div>
</div>