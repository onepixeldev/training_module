<h4 class="panel-heading txt-color-black">REFERENCE ID : <b><?php echo $refid. " ($tname)"?></b></h4>
<p>
<h4 class="panel-heading bg-color-blueDark txt-color-white">Target Group</h4>
<br>
<div class="text-right">
	<button type="button" class="btn btn-primary btn-sm add_nt"><i class="fa fa-plus"></i> Add Target Group</button>
</div>
<br>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_list_tg">
		<thead>
		<tr>
			<th class="text-center">Group Code</th>
			<th class="text-left">Description</th>
            <th class="text-center">Scheme Code</th>
            <th class="text-center">Grade (From)</th>
            <th class="text-center">Grade (To)</th>
            <th class="text-center">Service Year (From)</th>
            <th class="text-center">Service Year (To)</th>
            <th class="text-center">Service Group</th>
            <th class="text-center">Academician?</th>
            <th class="text-center">New Staff?</th>
            <th class="text-center">Compulsory?</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($targetGroup)) {
				foreach ($targetGroup as $tg) {
					echo '
                    <tr>
						<td class="text-center col-md-2">' . $tg->TTG_GROUP_CODE . '</td>
                        <td class="text-left col-md-3">' . $tg->TG_GROUP_DESC . '</td>
                        <td class="text-center">' . $tg->TG_SCHEME . '</td>
                        <td class="text-center">' . $tg->TG_GRADE_FROM . '</td>
                        <td class="text-center">' . $tg->TG_GRADE_TO . '</td>
                        <td class="text-center">' . $tg->TG_SERVICE_YEAR_FROM . '</td>
                        <td class="text-center">' . $tg->TG_SERVICE_YEAR_TO . '</td>
                        <td class="text-center">' . $tg->TG_SERVICE_GROUP . '</td>
                        <td class="text-center">' . $tg->TG_ACADEMIC . '</td>
                        <td class="text-center">' . $tg->TG_NEW_STAFF . '</td>
                        <td class="text-center">' . $tg->TG_COMPULSORY . '</td>
                        <td class="text-center col-md-3">
							<button type="button" class="btn btn-success btn-xs edit_training_btn"><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs delete_training_btn"><i class="fa fa-trash"></i> Delete</button>
						</td>
					</tr>
					';
				}
			} else {
				echo '<tr><td colspan="12" class="text-center">No record found.</td></tr>';
			}
		?>
		</tbody>
		</table>	
	</div>
</div>
</p>

<br>
<!-------------------------->
<div>
    <h4 class="panel-heading bg-color-blueDark txt-color-white">Module Setup</h4>
	<div id="module_setup">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th class="text-center">Please select training from Training Info</th>
            </tr>
            </thead>
        </table>
	</div>
</div>	
<!-------------------------->

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