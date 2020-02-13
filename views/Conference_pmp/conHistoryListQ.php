<form id="addConferenceLeave" class="form-horizontal" method="post">
    <br>
    <div class="form-group">
        <label class="col-md-2 control-label">Staff ID</label>
        <div class="col-md-2">
            <input name="form[staff_id]" class="form-control" type="text" value="<?php echo $staff_id?>" id="staff_id" readonly>
        </div>

        <div class="col-md-6">
            <input name="form[staff_name]" class="form-control" type="text" value="<?php echo $staff_name?>" id="staff_name" readonly>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">Service Code</label>
        <div class="col-md-2">
            <input name="form[svc_code]" class="form-control" type="text" value="<?php echo $svc_code?>" id="svc_code" readonly>
        </div>

        <div class="col-md-6">
            <input name="form[svc_desc]" class="form-control" type="text" value="<?php echo $svc_desc?>" id="svc_desc" readonly>
        </div>
    </div>
</form>
<div class="alert alert-info fade in">
    <b>List of Conferences</b>
</div>
<p>
<div class="well">
	<div class="row table-condensed table-responsive">
		<table class="table table-bordered table-hover" id="tbl_chl_list">
		<thead>
		<tr>
			<th class="text-center col-md-2 refid">Refid</th>
            <th class="text-left col-md-4">Name</th>
            <th class="text-left col-md-2">Category</th>
            <th class="text-center col-md-1" id="boHead">Budget Origin</th>
            <th class="text-center col-md-2">Apply Date</th>
            <th class="text-center col-md-1">Status</th>
            <th class="text-center col-md-1" id="rsHead">Report Submission</th>
            <th class="text-center col-md-1" id="srHead">Status REP</th>
			<th class="text-center col-md-1">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($con_inf)) {
				foreach ($con_inf as $ci) {
					echo '
                    <tr>
						<td class="text-center refid">' . $ci->SCM_REFID . '</td>
                        <td class="text-left cr_name">' . $ci->CM_NAME . '</td>
                        <td class="text-left">' . $ci->CC_DESC . '</td>
                        <td class="text-center" id="boBody">' . $ci->SCM_BUDGET_ORIGIN . '</td>
                        <td class="text-center">' . $ci->SCM_APPLY_DATE2 . '</td>
                        <td class="text-center scm_status">' . $ci->SCM_STATUS . '</td>
                        <td class="text-center" id="rsBody">' . $ci->COUNT_REP_DESC . '</td>
                        <td class="text-center" id="srBody">' . $ci->SCR_STATUS . '</td>
						<td class="text-center">
							<div class="btn-group" id=menuBtn>
								<button type="button" class="btn btn-xs btn-warning" data-toggle="dropdown"><i class="fa fa-bars"></i> Menu</button>
								<div style="background-color:silver;text-align:center;width:5px;" class="dropdown-menu dropdown-menu-right dd_btn">
									<button type="button" class="btn btn-primary text-left btn-block btn-xs detl_btn" value=""><i class="fa fa-info-circle"></i> Detail</button>
									<button type="button" class="btn btn-danger text-left btn-block btn-xs memo_tnca_btn"><i class="fa fa-print"></i> Memo TNCA</button>
									<button type="button" class="btn btn-danger text-left btn-block btn-xs print_pmp_btn"><i class="fa fa-print"></i> Print PMP</button>
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
<br>
<br>
<div id="detl_history_query">
	<div class="hidden" id="dhq">
		<div class="alert alert-success fade in">
			<b>Details</b>
		</div>

		<ul id="myTabQ" class="nav nav-tabs bordered">
			<li class="active">
				<a style="color:#000 !important" href="#s1a" data-toggle="tab" aria-expanded="true">Conference Application</a>
			</li>
			<li class="">
				<a style="color:#000 !important" href="#s2a" data-toggle="tab" aria-expanded="false">Conference RMIC Approval</a>
			</li>
			<li class="">
				<a style="color:#000 !important" href="#s3a" data-toggle="tab" aria-expanded="false">Conference Leave</a>
			</li>
			<li class="">
				<a style="color:#000 !important" href="#s4a" data-toggle="tab" aria-expanded="false">Allowances</a>
			</li>
		</ul>
		<!-- myTabContent1 -->
		<div id="myTabContent" class="tab-content padding-10">

			<div class="tab-pane fade active in" id="s1a">
				<div id="conference_application">
				</div>
			</div> 

			<div class="tab-pane fade" id="s2a">
				<div id="conference_rmic_approval">
				</div>
			</div> 

			<div class="tab-pane fade" id="s3a">
				<div id="conference_leave_detl">
				</div>
			</div>

			<div class="tab-pane fade" id="s4a">
				<div id="allowances_detl">
				</div>
			</div>

		</div>
		<!-- end myTabContent1 -->
	</div>
</div>


<script>
	// PRINT PMP
	$('.print_pmp_btn').on('click', function () {
		var thisBtn = $(this);
		var td = thisBtn.closest("tr");
		var crRefID = td.find(".refid").text();
		var repCode = "ATR020";
		crStaffID = $('#staff_id').val();
		// alert(repCode+' '+crStaffID+' '+crRefID);
		
		$.post('<?php echo $this->lib->class_url('setParamPmpAtt') ?>', {repCode: repCode, crStaffID: crStaffID, crRefID: crRefID}, function (res) {
			var repURL = '<?php echo $this->lib->class_url('genReportPmpAtt') ?>';
			var mywin = window.open( repURL , 'report');
		}).fail(function(){
			msg.danger('Please contact administrator.', '#alertEditStaffConference');        
		});
	});
</script>