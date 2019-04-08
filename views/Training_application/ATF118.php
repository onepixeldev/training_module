<p>
<h4 class="panel-heading bg-color-blueDark txt-color-white">Training</h4>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_training_row">
		<thead>
		<tr>
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
			echo '
			<tr>
				<td class="text-center col-md-1">' . $refid . '</td>
				<td class="text-center col-md-1">' . $tr_detl->TH_TRAINING_CODE .'</td>
				<td class="text-left col-md-3">' . $tname . '</td>
				<td class="text-center col-md-1">' . $tr_detl->TH_DATEFR .'</td>
				<td class="text-center col-md-1">' . $tr_detl->TH_DATETO .'</td>
				<td class="text-center col-md-1">
					<button type="button" class="btn btn-info btn-xs tr_detl_btn" value='.$refid.'><i class="fa fa-info-circle"></i> Detail</button>
				</td>
			</tr>
			';
		?>
		</tbody>
		</table>	
	</div>
</div>
<br>
<h4 class="panel-heading bg-color-blueDark txt-color-white">List of Staff</h4>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_list_sta_svc_book">
		<thead>
		<tr>
			<th class="text-center">Select</th>
			<th class="text-center">Staff ID</th>
            <th class="text-left">Name</th>
			<th class="text-center">Department</th>
            <th class="text-center">Role</th>
			<th class="text-center">Status</th>
			<th class="text-center">Service Book</th>
			<th class="text-center">Service Book Ref ID</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($get_svc_book)) {
				foreach ($get_svc_book as $gsb) {
					echo '
					<tr>
						<td class="text-center col-md-1">
							<div class="form-check text-center">
								<input class="form-check-input position-static checkitem" type="checkbox" name="applicantID" id="applicantID" value="' . $gsb->STH_STAFF_ID . '" aria-label="...">
							</div>
						</td>
						<td class="text-center col-md-1 sid">' . $gsb->STH_STAFF_ID . '</td>
						<td class="text-left col-md-3">' . $gsb->SM_STAFF_NAME . '</td>
						<td class="text-center col-md-1">' . $gsb->SM_DEPT_CODE . '</td>
						<td class="text-center col-md-1">' . $gsb->TPR_DESC . '</td>
						<td class="text-center col-md-1 sth_sts">' . $gsb->STH_STATUS . '</td>
						<td class="text-center col-md-1">' . $gsb->STH_SERVICE_BOOK . '</td>
						<td class="text-center col-md-1">' . $gsb->SBH_REF_ID . '</td>
					</tr>
                    ';
				}
			}
		?>
		</tbody>
		</table>	
	</div>
</div>

<br>
<div class="row">
	<div class="col-sm-3">
		<div class="text-left col-sm-7">
			<button type="button" class="btn btn-primary btn-sm sta_appsm_btn" value="<?php echo $refid?>" data-tr-name="<?php echo $tname?>"><i class="fa fa-book"></i> Service Book</button>
		</div>
	</div>
</div>
</p>

<script>
	// SERVICE BOOK - ATF118
	$('.sta_appsm_btn').click(function(){
		var thisBtn = $(this);
		var refid =  $('.sta_appsm_btn').val();
		var trainingN =  thisBtn.data("tr-name");
		var staffIDArr = []; 
		var selectedID = 0;
		var sthStatus = 0;
		//alert(refid+trainingN);

		$.confirm({
		    title: 'Service Book',
		    content: 'Press <b>YES</b> to confirm write into service book',
			type: 'blue',
		    buttons: {
		        yes: function () {
					$('.checkitem:checked').each(function() {
						// check the checked property 
						var currentID = $(this).val();
						stfID = $(this).closest("tr").find(".sid").text();
						sth_status = $(this).closest("tr").find(".sth_sts").text();
						++selectedID;

						if (sth_status != 'APPROVE') {
							sthStatus = 1;
						}
						//alert(stfID);
						staffIDArr.push(stfID);
					});
					
					//alert(staffIDArr);

					if (selectedID == 0) {
						$.alert({
							title: 'Alert!',
							content: 'You must select at least one record to continue.',
							type: 'red'
						});
						return;
					}

					if (sthStatus > 0) {
						$.alert({
							title: 'Alert!',
							content: 'Only staff with <b>APPROVE</b> status can be registered into service book',
							type: 'red'
						});
						return;
					}

					$.ajax({
						type: 'POST',
						url: '<?php echo $this->lib->class_url('addServiceBook')?>',
						data: {'stfID' : staffIDArr, 'refid' : refid},
						dataType: 'JSON',
						beforeSend: function() {
							//$('.nav-tabs li:eq(1) a').tab('show');
							//$('.btn').attr('disabled', 'disabled');
							$('#loader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
						},
						success: function(res) {
							if(res.sts == 1) {
								$.alert({
									title: 'Success!',
									content: res.msg,
									type: res.alert
								});

								$.ajax({
									type: 'POST',
									url: '<?php echo $this->lib->class_url('ATF118')?>',
									data: {'refid' : refid, 'tName' : trainingN},
									beforeSend: function() {
										$('.nav-tabs li:eq(2) a').tab('show');
										$('#staff_training_svc_book').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
									},
									success: function(res) {
										$('#staff_training_svc_book').html(res);
										tr_row = $('#tbl_list_sta_svc_book').DataTable({
											"ordering":false,
										});
									}
								});
							} else {
								$.alert({
									title: 'Alert!',
									content: res.msg,
									type: res.alert
								});
							}
							
							$('.btn').removeAttr('disabled');
							$('#loader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').hide();
						}
					});			
		        },
		        cancel: function () {
		            $.alert('Service Book has been cancelled!');
		        }
		    }
		});
    });	

	// SELECT TRAINING BTN - STAFF
	$('.tr_detl_btn').click(function(){
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var trRefID = td.eq(0).html().trim();
		var trainingN = td.eq(1).html().trim();
		//var scCode = '1';
		//alert(trRefID);

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('editTraining')?>',
			//data: {'refID' : trRefID, 'scCode' : scCode},
			data: {'refID' : trRefID},
			beforeSend: function() {
				$('.nav-tabs li:eq(4) a').tab('show');
				$('#training_list_detl').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
			},
			success: function(res) {
				$('#training_list_detl').html(res);

				$('.modal-header').hide();
				$('#alert').hide();
				$('.field_inpt').prop("disabled", true);
				$('.save_upd_tr_info').hide();
				$('#search_str_tr_ver').hide();
		
				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('speakerInfo')?>',
					data: {'tsRefID' : trRefID},
					beforeSend: function() {
						$('#speakerInfo').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
						$('#speakerInfo').html(res);
						$('.add_tr_sp').hide();
						$('#speakerInfo #spAct').hide();
					}
				});

				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('facilitatorInfo')?>',
					data: {'tsRefID' : trRefID},
					beforeSend: function() {
						$('#facilitatorInfo').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
						$('#facilitatorInfo').html(res);
						$('.add_tr_fi').hide();
						$('#facilitatorInfo #fiAct').hide();
					}
				});

				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('verExternalAgency')?>',
					data: {'trRefID' : trRefID},
					dataType: 'JSON',
					success: function(res) {
						if(res.sts == 1) {
							$.ajax({
								type: 'POST',
								url: '<?php echo $this->lib->class_url('trainingCost')?>',
								data: {'trRefID' : trRefID, 'tName' : trainingN},
								beforeSend: function() {
									$('#training_list_detl2').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
								},
								success: function(res) {
									$('#training_list_detl2').html(res);
								}
							});
						} else {
							$('#training_list_detl2').html('<p><table class="table table-bordered table-hover"><thead><tr><th class="text-center">Training Cost only available for External Agency Training</th></tr></thead></table></p>');
						};
					}
				});
			
				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('targetGroup')?>',
					data: {'trRefID' : trRefID, 'tName' : trainingN},
					beforeSend: function() {
						$('#training_list_detl3').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
						$('#training_list_detl3').html(res);
						$('.add_tg').hide();
						$('.del_tg_btn').hide();

						$.ajax({
							type: 'POST',
							url: '<?php echo $this->lib->class_url('moduleSetup')?>',
							data: {'tsRefID' : trRefID},
							beforeSend: function() {
								$('#module_setup').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
							},
							success: function(res) {
								$('#module_setup').html(res);
								$('#msBTN').hide();
								$('.edit_ms1_btn').hide();
								$('.edit_ms2_btn').hide();
								$('.edit_ms3_btn').hide();
							}
						});
					}
				});

				$.ajax({
					type: 'POST',
					url: '<?php echo $this->lib->class_url('cpdSetup')?>',
					data: {'tsRefID' : trRefID, 'tName' : trainingN},
					beforeSend: function() {
						$('#training_list_detl4').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
					},
					success: function(res) {
						$('#training_list_detl4').html(res);
						$('#cpdBTN').hide();
						$('.edit_cpd1_btn').hide();
						$('.edit_cpd2_btn').hide();
						$('.edit_cpd3_btn').hide();
						$('.edit_cpd4_btn').hide();
						$('.edit_cpd5_btn').hide();
					}
				});
			}
		});
	});
</script>