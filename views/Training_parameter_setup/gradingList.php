<p>
<div class="text-right">
    <button type="button" class="btn btn-primary btn-sm add_tg" value="<?php echo $tg_type ?>"><i class="fa fa-plus"></i> Add New Grading (<?php echo $tg_type ?>)</button>
</div>
<br>
<div class="well">
    <h6>Grading Setup (<?php echo $tg_type ?>)</h6>
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_list_grading">
		<thead>
		<tr>
			<th class="text-center">Mark</th>
			<th class="text-center">Description</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			//$no = 0;
			if (!empty($training_grading_list)) {
				foreach ($training_grading_list as $tg) {
					echo '
					<tr>
						<td class="text-center col-md-1">' . $tg->TAG_GRADE_CODE . '</td>
						<td class="text-left">' . $tg->TAG_GRADE_DESC . '</td>
						<td class="text-center col-md-2">
							<button type="button" class="btn btn-success btn-xs edit_grading" title="Edit Record" value='.$tg_type.'><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs delete_grading" title="Delete Record" value='.$tg_type.'><i class="fa fa-trash"></i> Delete</button>
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
<div id="assessment_list_spinner"></div>
</p>

<script>

// DELETE page
	$('.delete_grading').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
        var recCode = td.eq(0).html().trim();
        var recType = thisBtn.val();
		//alert(recCode);
		
		if (recCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('delTG')?>',
				data: {'tg_type' : recType, 'tg_code' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// EDIT page
	$('.edit_grading').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var recCode = td.eq(0).html().trim();
        var recType = thisBtn.val();
		//alert(recCode);
		
		if (recCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('editTG')?>',
				data: {'tg_type' : recType, 'tg_code' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
    });
    
    // ADD
	$('.add_tg').click(function () {
        var thisBtn = $(this);
		var recType = thisBtn.val();
		
		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
		
		$.ajax({
			type: 'POST',
            url: '<?php echo $this->lib->class_url('addTrainingGrading')?>',
            data: {'tg_type' : recType},
			success: function(res) {
				$('#myModalis .modal-content').hide().html(res).slideDown();
			}
		});
	});
</script>