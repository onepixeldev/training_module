<p>
<div class="well">
	<div class="row">
		<table class="table table-bordered table-hover" id="tbl_list_tcl">
		<thead>
		<tr>
			<th class="text-center">Code</th>
			<th class="text-center">Description</th>
			<th class="text-center">Service Year (from)</th>
            <th class="text-center">Service Year (to)</th>
            <th class="text-center">Ordering</th>
            <th class="text-center">Status</th>
			<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			$no = 0;
			if (!empty($tr_comp_lvl)) {
				foreach ($tr_comp_lvl as $tcl) {
                    $tclStatus = "";

                    if ($tcl->TCL_STATUS == 'Y')
                    {
                        $tclStatus = 'ACTIVE';
                    } else {
                        $tclStatus = 'INACTIVE';
                    }
					echo '
					<tr>
						<td class="text-center col-md-1">' . $tcl->TCL_COMPETENCY_CODE . '</td>
						<td class="text-left">' . $tcl->TCL_COMPETENCY_DESC . '</td>
                        <td class="text-center">' . $tcl->TCL_SERVICE_YEAR_FROM . '</td>
                        <td class="text-center">' . $tcl->TCL_SERVICE_YEAR_TO . '</td>
                        <td class="text-center">' . $tcl->TCL_ORDERING . '</td>
                        <td class="text-center">' . $tclStatus . '</td>
						<td class="text-center col-md-2">
							<button type="button" class="btn btn-success btn-xs edit_tcl" title="Edit Record"><i class="fa fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-danger btn-xs delete_tcl" title="Delete Record"><i class="fa fa-trash"></i> Delete</button>
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
<script>

	// DELETE page
	$('.delete_tcl').click(function () {
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
				url: '<?php echo $this->lib->class_url('delTCL')?>',
				data: {'codeTCL' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});

	// EDIT page
	$('.edit_tcl').click(function () {
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
				url: '<?php echo $this->lib->class_url('editTCL')?>',
				data: {'codeTCL' : recCode},
				success: function(res) {
					$('#myModalis .modal-content').hide().html(res).fadeIn();
				}
			});
		}
	});
</script>