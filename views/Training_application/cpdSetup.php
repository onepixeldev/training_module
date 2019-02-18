<p>
<?php
	if (empty($cpdSetup)) {
		echo '
		<div class="text-right">
			<button type="button" class="btn btn-primary btn-sm add_nt"><i class="fa fa-plus"></i> Add CPD</button>
		</div>
		';
	}
?>
<br>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_list_cs">
		<tbody>
		<?php
			if (!empty($cpdSetup)) {
				echo '
				<tr data-parm-id="">
					<td class="text-right col-md-2"><b>Competency</b></td>
					<td class="text-left col-md-4">'.$cpdSetup->CH_COMPETENCY.'</td>
					<td class="text-left">
						<button type="button" class="btn btn-success btn-xs edit_hod_mem" value="<?php echo $hod_memo->HP_PARM_NO?>" title="Edit Record" ><i class="fa fa-edit"></i> Update</button>
					</td>
				</tr>

				<tr data-parm-id="">
					<td class="text-right col-md-2"><b>Category</b></td>
					<td class="text-left col-md-4">'.$cpdSetupCatDesc.'</td>
					<td class="text-left">
						<button type="button" class="btn btn-success btn-xs edit_hod_mem" value="<?php echo $hod_memo->HP_PARM_NO?>" title="Edit Record" ><i class="fa fa-edit"></i> Update</button>
					</td>
				</tr>

				<tr data-parm-id="">
					<td class="text-right col-md-2"><b>Mark</b></td>
					<td class="text-left col-md-4">'.$cpdSetup->CH_MARK.'</td>
					<td class="text-left">
						<button type="button" class="btn btn-success btn-xs edit_hod_mem" value="<?php echo $hod_memo->HP_PARM_NO?>" title="Edit Record" ><i class="fa fa-edit"></i> Update</button>
					</td>
                </tr>
                
                <tr data-parm-id="">
					<td class="text-right col-md-2"><b>Report Submission?</b></td>
					<td class="text-left col-md-4">'.$cpdSetup->REP_SUB.'</td>
					<td class="text-left">
						<button type="button" class="btn btn-success btn-xs edit_hod_mem" value="<?php echo $hod_memo->HP_PARM_NO?>" title="Edit Record" ><i class="fa fa-edit"></i> Update</button>
					</td>
				</tr>
				';
			} else {
				echo '<tr><td colspan="8" class="text-center">No record found.</td></tr>';
			}
		?>
		</tbody>
		</table>	
	</div>
</div>
</p>
<script>
	//var dt_obj = '';
	//var dt_obj2 = '';

	// DELETE page - category setup
	$('.delete_tac').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var recCode = td.eq(0).html().trim();
		//alert(recCode);
		
		if (recCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('delTAC')?>',
				data: {'codeTAC' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// EDIT page - category setup
	$('.edit_tac').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var recCode = td.eq(0).html().trim();
		//alert(recCode);
		
		if (recCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('editTAC')?>',
				data: {'codeTAC' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});	
</script>