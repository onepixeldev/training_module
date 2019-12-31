<p>
<h4 class="panel-heading bg-color-blueDark txt-color-white">Training Memo for Participants</h4>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_list_tmp">
		<thead>
		<tr>
			<th class="text-center">Code</th>
			<th class="text-center">Module</th>
            <th class="text-center">Status</th>
			<th class="text-center" style="display: none">staff</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (!empty($tr_mem_pr)) {
				foreach ($tr_mem_pr as $tmp) {
                    $tmpStatus = "";

                    if ($tmp->TMC_STATUS == 'Y')
                    {
                        $tmpStatus = 'ACTIVE';
                    } 
                    elseif ($tmp->TMC_STATUS == 'N')
                    {
                        $tmpStatus = 'INACTIVE';
                    } 
					echo '
					<tr>
						<td class="text-center col-md-1">' . $tmp->TMC_CODE . '</td>
                        <td class="text-left">' . $tmp->TMC_MODULE . '</td>
						<td class="text-center col-md-1">' . $tmpStatus . '</td>
						<td class="text-left" style="display: none">' . $tmp->TMC_SEND_BY . '</td>
						<td class="text-center col-md-3">
							<button type="button" class="btn btn-info btn-xs detail_tmp" title="More details"><i class="fa fa-info-circle"></i> Detail</button>
							<button type="button" class="btn btn-success btn-xs edit_tmp" title="Edit Record"><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs delete_tmp" title="Delete Record"><i class="fa fa-trash"></i> Delete</button>
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
</p>


<br>
<!-------------------------->
<div>
	<h4 class="panel-heading bg-color-blueDark txt-color-white">Training Memo for Evaluator</h4>
	
	<div style="max-height:500px;overflow-y:auto;overflow-x:hidden">
		<table class="table table-bordered table-hover">
			<tbody> 
				<tr>
					<td class="text-left col-md-1"><b>Module</b></td>
					<td class="text-left"><?php echo $tr_mem_ev->TEM_MODULE?></td>
					<td class="text-center col-md-2">
						<button type="button" class="btn btn-info btn-xs detail_tem" value="<?php echo $tr_mem_ev->TEM_SEND_BY?>"><i class="fa fa-info-circle"></i> More Details</button>
						<button type="button" class="btn btn-success btn-xs edit_tem" value="<?php echo $tr_mem_ev->TEM_SEND_BY?>" title="Edit Record" ><i class="fa fa-edit"></i> Update</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>	
<!-------------------------->


<script>
	// DETAILS page
	$('.detail_tmp').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var recCode = td.eq(0).html().trim();
		var staffID = td.eq(3).html().trim();
		//alert(recCode);
		
		if (recCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('detailTMP')?>',
				data: {'codeTMP' : recCode, 'staffID' : staffID},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// DELETE page
	$('.delete_tmp').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var recCode = td.eq(0).html().trim();
		var staffID = td.eq(3).html().trim();
		
		if (recCode) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('delTMP')?>',
				data: {'codeTMP' : recCode, 'staffID' : staffID},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// EDIT page
	$('.edit_tmp').click(function () {
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
				url: '<?php echo $this->lib->class_url('editTMP')?>',
				data: {'codeTMP' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});


	// DETAILS page - Training Memo for Evaluator
	$('.detail_tem').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var staffID = thisBtn.val();
		
		if (staffID) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('detailTEM')?>',
				data: {'staffID' : staffID},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// EDIT page - Training Memo for Evaluator
	$('.edit_tem').click(function () {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var staffID = thisBtn.val();
		//alert(recCode);
		
		if (staffID) {
			$('#myModalis .modal-content').empty();
			$('#myModalis').modal('show');
			$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');

			$.ajax({
				type: 'POST',
				url: '<?php echo $this->lib->class_url('editTEM')?>',
				data: {'staffID' : staffID},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});
</script>