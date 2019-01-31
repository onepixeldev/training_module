<p>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_list_tasv">
		<thead>
		<tr>
			<th class="text-center">Type</th>
			<th class="text-center">Order</th>
			<th class="text-center">Code</th>
			<th class="text-center">Description</th>
			<th class="text-center">Assessment Type</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			//$no = 0;
			if (!empty($training_assessment_setup_view)) {
				foreach ($training_assessment_setup_view as $tasv) {
					echo '
					<tr>
						<td class="text-center col-md-1">' . $tasv->TAS_TYPE . '</td>
						<td class="text-center col-md-1">' . $tasv->TAS_ORDERING . '</td>
						<td class="text-center col-md-1">' . $tasv->TAS_CODE . '</td>
						<td class="text-left">' . $tasv->TAS_DESC . '</td>
						<td class="text-center col-md-1">' . $tasv->TAS_ASSESSMENT_TYPE . '</td>
						<td class="text-center col-md-3">
							<button type="button" class="btn btn-info btn-xs show_grading_setup" title="Show grading setup"><i class="fa fa-arrow-down"></i> Select</button>
							<button type="button" class="btn btn-success btn-xs edit_tasv" title="Edit Record"><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs delete_tasv" title="Delete Record"><i class="fa fa-trash"></i> Delete</button>
						</td>
					</tr>
					';
				}
			} else {
				echo '<tr><td colspan="8" class="text-center">No record found.</td></tr>';
			}
		?>
		</tbody>
		</table>	
	</div>
</div>
<!--<div id="assessment_list_spinner"></div>-->
</p>
<br>

<!-------------------------->
<div>
	<h4 class="panel-heading bg-color-blueDark txt-color-white">Grading Setup Query</h4>

	<div id="grading_list">
	<table class="table table-bordered table-hover">
		<thead>
		<tr>
			<th class="text-center">Please select Assessment from Assessment Setup</th>
		</tr>
		</thead>
	</table>
	</div>
</div>	
<!-------------------------->
<script>

	// DELETE page
	$('.delete_tasv').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
        var recType = td.eq(0).html().trim();
		var recCode = td.eq(2).html().trim();
		//alert(recCode);
		
		if (recCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('delTASV')?>',
				data: {'tasv_type' : recType, 'tasv_code' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// EDIT page
	$('.edit_tasv').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var recType = td.eq(0).html().trim();
		var recCode = td.eq(2).html().trim();
		//alert(recCode);
		
		if (recCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('editTASV')?>',
				data: {'tasv_type' : recType, 'tasv_code' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	$('.show_grading_setup').click(function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var recType = td.eq(0).html().trim();
		//alert(recCode);

		$('#assessment_list_spinner').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$('#grading_list').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('gradingList')?>',
			data: {'tg_type' : recType},
			success: function(res) {
				//$('.nav-tabs li:eq(1) a').tab('show');
				$('#grading_list').html(res);
				$('#assessment_list_spinner').html('');
			}
		});
	});	
</script>