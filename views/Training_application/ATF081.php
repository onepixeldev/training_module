<?php echo $this->lib->title('Training Application') ?>

<section id="widget-grid" class="">
    <div class="jarviswidget  jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
        <header role="heading">
            <div class="jarviswidget-ctrls" role="menu">
                <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" data-placement="bottom"><i class="fa fa-expand "></i></a>
            </div>
            <h2>ATF081 - Training Application Reports</h2>				
            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
        </header>
        <div role="content">
            <div class="jarviswidget-editbox">
            </div>
            <div class="widget-body">
                <div class="jarviswidget well" id="wid-id-3" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false" role="widget">
                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-comments"></i> </span>
                        <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
					</header>

                    <!-- widget div-->
                    <div role="content">
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                        </div>
                        <!-- end widget edit box -->
                        <div class="widget-body">

                            <ul id="myTab1" class="nav nav-tabs bordered">
                                <li class="active">
                                    <a style="color:#000 !important" href="#s1" data-toggle="tab" aria-expanded="true">Reports</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s2" data-toggle="tab" aria-expanded="false">Reports (II)</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s3" data-toggle="tab" aria-expanded="false">Reports (III)</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s4" data-toggle="tab" aria-expanded="false">Reports (IV)</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s5" data-toggle="tab" aria-expanded="false">Reports (V)</a>
                                </li>
								<li class="">
                                    <a style="color:#000 !important" href="#s6" data-toggle="tab" aria-expanded="false">Reports (VI)</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s7" data-toggle="tab" aria-expanded="false">Reports (VII)</a>
                                </li>
                                <li class="">
                                    <a style="color:#000 !important" href="#s8" data-toggle="tab" aria-expanded="false">Reports (VIII)</a>
                                </li>
                            </ul>
							<!-- myTabContent1 -->
                            <div id="myTabContent1" class="tab-content padding-10">

                                <div class="tab-pane fade active in" id="s1">
									<div id="report_i">
									</div>
                                </div>

                                <div class="tab-pane fade" id="s2">
									<div id="report_ii">
									</div>
                                </div>

                                <div class="tab-pane fade" id="s3">
									<div id="report_iii">
									</div>
                                </div>

								<div class="tab-pane fade" id="s4">
									<div id="report_iv">
									</div>
                                </div>

								<div class="tab-pane fade" id="s5">
									<div id="report_v">
									</div>
                                </div>

								<div class="tab-pane fade" id="s6">
									<div id="report_vi">
									</div>
                                </div>

                                <div class="tab-pane fade" id="s7">
									<div id="report_vii">
									</div>
                                </div>
                                
                                <div class="tab-pane fade" id="s8">
									<div id="report_viii">
									</div>
                                </div>

                            </div>
                            <!-- end myTabContent1 -->
                        </div>
                        <!-- end widget content -->
                    </div>
                    <!-- end widget div -->
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ADD / EDIT / DELETE page will be displayed here -->
<div class="modal fade" id="myModalis" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="mContent">
		
        </div>
    </div><!-- /.modal-dialog -->
</div>
<!-- end ADD / EDIT / DELETE -->

<!-- ADD / EDIT / DELETE page will be displayed here -->
<div class="modal fade" id="myModalis2" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content" id="mContent2">
		
        </div>
    </div><!-- /.modal-dialog -->
</div>
<!-- end ADD / EDIT / DELETE -->

<!-- SEARCH DEPT page will be displayed here -->
<div class="modal fade" id="mySearchDeptModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
			<div class="modal-header btn-primary">
				<h4 class="modal-title" id="myModalLabel">Department
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<div class="modal-body">
				<div id="search_dept_list"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
			</div>		  
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- end SEARCH DEPT -->

<!-- SEARCH TRAINING page will be displayed here -->
<div class="modal fade" id="mySearchTrainingModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
			<div class="modal-header btn-primary">
				<h4 class="modal-title" id="myModalLabel">Training Title
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<div class="modal-body">
				<div id="search_training_list"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
			</div>		  
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- end SEARCH TRAINING -->

<!-- SEARCH ORGANIZER page will be displayed here -->
<div class="modal fade" id="mySearchOrganizerModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
			<div class="modal-header btn-primary">
				<h4 class="modal-title" id="myModalLabel">Organizer
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<div class="modal-body">
				<div id="search_organizer_list"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
			</div>		  
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- end SEARCH ORGANIZER -->

<!-- SEARCH STAFF page will be displayed here -->
<div class="modal fade" id="mySearchStaffModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
			<div class="modal-header btn-primary">
				<h4 class="modal-title" id="myModalLabel">Staff
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</h4>
			</div>
			<div class="modal-body">
				<div id="search_staff_list"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-hand-o-left"></i> Close</button>
			</div>		  
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- end SEARCH STAFF -->

<script>
	var tr_row = '';
    
	//var intExt = '1';
	var disDept = '1';
	var disYear = '1';
        var evaluation = '1';
	//var dt_row2 = '';
        
        //start add @17/02/2020
        //--------------------------------------------------------------------------
        var dt_deptlist_row = '';
        var dt_deptlist_row2 = '';
        var dt_deptlist_row3 = '';
        var dt_traininglist_row = '';
        var dt_traininglist_row2 = '';
        var dt_depttab1list_row = '';
        var dt_organizertab2list_row = '';
        var dt_stafftab2list_row = '';
        var dt_depttab3list_row = '';
        var dt_trainingtab3list_row = '';
        var dt_stafftab3list_row = '';
        var dt_depttab3blist_row = '';
        var dt_depttab5list_row = '';
        var dt_stafftab6list_row = '';
        var dt_stafftab7list_row = '';
        var dt_trainingtab7list_row = '';
	//end @17/02/2020 -----------------------------------------------------------
        
	$(document).ready(function(){
		// navigate to selected tab
		<?php
        $currtab = $this->session->tabID;
    
        if (!empty($currtab)) {
            if ($currtab == 's2'){
                echo "$('.nav-tabs li:eq(1) a').tab('show');";
            } elseif ($currtab == 's3'){
				echo "$('.nav-tabs li:eq(2) a').tab('show');";
			} elseif ($currtab == 's4'){
				echo "$('.nav-tabs li:eq(3) a').tab('show');";
			} elseif ($currtab == 's5'){
				echo "$('.nav-tabs li:eq(4) a').tab('show');";
			} elseif ($currtab == 's6'){
				echo "$('.nav-tabs li:eq(5) a').tab('show');";
			} elseif ($currtab == 's7'){
				echo "$('.nav-tabs li:eq(6) a').tab('show');";
			}
            else {
                echo "$('.nav-tabs li:eq(0) a').tab('show');";
            }
		}
        ?>
	});

	$(".nav-tabs a").click(function(){
		$(this).tab('show');
    });

    // REPORT I
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('tarReport')?>',
		data: '',
		beforeSend: function() {
			$('#report_i').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#report_i').html(res);
		},
    });

    // REPORT II
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('tarReportii')?>',
		data: '',
		beforeSend: function() {
			$('#report_ii').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#report_ii').html(res);
		},
    });

    // REPORT III
	$.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('tarReportiii')?>',
		data: '',
		beforeSend: function() {
			$('#report_iii').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#report_iii').html(res);
		},
    });

    // REPORT IV
    $.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('tarReportiv')?>',
		data: '',
		beforeSend: function() {
			$('#report_iv').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#report_iv').html(res);
		},
    });

    // REPORT V
    $.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('tarReportv')?>',
		data: '',
		beforeSend: function() {
			$('#report_v').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#report_v').html(res);
		},
    });

    // REPORT VI
    $.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('tarReportvi')?>',
		data: '',
		beforeSend: function() {
			$('#report_vi').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#report_vi').html(res);
		},
    });

    // REPORT VII
    $.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('tarReportvii')?>',
		data: '',
		beforeSend: function() {
			$('#report_vii').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#report_vii').html(res);
		},
    });
    
    // REPORT I (A)
    $('#report_i').on('click', '.genReporti', function () {
        var repCode = $(this).attr('repCode');
        var year_ai = $("#year_ai").val(); 
        var department_ai = $("#department_ai").val(); 
        var choice_ai = $("#choice_ai").val(); 
        // var fr_month_ai = $("#fr_month_ai").val(); 
        // var fr_year_ai = $("#fr_year_ai").val(); 
        // var to_month_ai = $("#to_month_ai").val(); 
        // var to_year_ai = $("#to_year_ai").val();
        var year_bi = $("#year_bi").val();
        var courseRefid = $("#courseRefid").val();
        // alert(repCode+' '+year_ai+' '+department_ai+' '+choice_ai+' '+fr_month_ai+' '+fr_year_ai+' '+to_month_ai+' '+to_year_ai+' '+year_bi+' '+courseRefid);

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setReportParamTrainAppl')?>',
			data: {'repCode': repCode, 'year_ai': year_ai, 'department_ai': department_ai, 'choice_ai': choice_ai, 'year_bi': year_bi, 'courseRefid': courseRefid},
			dataType: 'JSON',
			success: function(res) {
				window.open("report?r="+res.report,"mywin","width=800,height=600");
				//window.open("report?r="+res.report,"mywin","width=800,height=600");
			}
		});
    });
    
    // REPORT I (Program / Facilitator Evaluation)
    $('#report_i').on('click', '.genReportBi', function () {
        var repCode = $(this).attr('repCode');
		var rep_format_bi = $("#rep_format_bi").val();
        var year_bi = $("#year_bi").val();
        var courseRefid = $("#courseRefid").val();
        
        if (courseRefid.length == 0) {
			$.alert({
				title: 'Alert!',
				content: 'Please select Course Title',
				type: 'red'
			});
			return;
		}
            
        // alert(repCode+' '+rep_format_bi+' '+year_bi+' '+courseRefid);
        //rep_code: repCode, 

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setReportParamTrainAppl')?>',
			data: {'repCode': repCode, 'rep_format_bi' : rep_format_bi, 'year_bi' : year_bi, 'courseRefid' : courseRefid},
			dataType: 'JSON',
			success: function(res) {
				window.open("report?r="+res.report,"mywin","width=800,height=600");
			}
		});
    });
    
        /*
	// REPORT I (Program / Facilitator Evaluation)
	$('#report_i').on('click','.genReportBi', function() {
		var repCode = $(this).attr('repCode');
		var repFormat = $("#rep_format_bi").val();
        var year_bi = $("#year_bi").val();
        var courseRefid = $("#courseRefid").val();
		
		if (courseRefid.length == 0) {
			$.alert({
				title: 'Alert!',
				content: 'Please select Course Title',
				type: 'red'
			});
			return;
		}

		$(this).attr('disabled', 'disabled');
		$.ajax({
			type: 'POST',
			url: '<?php //echo $this->lib->class_url('setRepParam')?>',
			data: {'rep_code': repCode, 'rep_format' : repFormat, 'rep_year' : year_bi, 'course_rid' : courseRefid},
			dataType: 'json',
			success: function(res) {
				$('.genReportBi').removeAttr('disabled');
				
				window.open("report?r="+res.report,"mywin","width=800,height=600");
			},
			error: function() {
				$('.genReportBi').removeAttr('disabled');
				$.alert({
					title: 'Error!',
					content: 'Please contact administrator.',
					type: 'red',
				});
			}
		});	
	});	
        */
           
    // REPORT I
    $('#report_i').on('click', '.genReportMMi', function () {
        var repCode = $(this).attr('repCode');
        var fr_month_ai = $("#fr_month_ai").val(); 
        var fr_year_ai = $("#fr_year_ai").val(); 
        var to_month_ai = $("#to_month_ai").val(); 
        var to_year_ai = $("#to_year_ai").val();
		//alert(repCode);

        if(fr_month_ai == '' || fr_year_ai == '' || to_month_ai == '' || to_year_ai == '') {
            $.alert({
                title: 'Alert!',
                content: 'Please select <b>From (month, year)</b> and <b>To (month, year)</b>',
                type: 'red',
            });
            return;
        }

        // $.post('<?php //echo $this->lib->class_url('setReportParamTrainAppl') ?>', {repCode: repCode, fr_month_ai: fr_month_ai, 
        // fr_year_ai: fr_year_ai, to_month_ai: to_month_ai, to_year_ai: to_year_ai}, function (res) {
        //     window.open("report?r="+res.report,"mywin","width=800,height=600");
        // }).fail(function(){
        //     $.alert({
        //         title: 'Error!',
        //         content: 'Please contact administrator.',
        //         type: 'red',
        //     });
        //     // msg.danger('Please contact administrator.', '#alert');      
        // });

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setReportParamTrainAppl')?>',
			data: {'repCode': repCode, 'fr_month_ai': fr_month_ai, 'fr_year_ai': fr_year_ai, 'to_month_ai': to_month_ai, 'to_year_ai': to_year_ai},
			dataType: 'JSON',
			success: function(res) {
				window.open("report?r="+res.report,"mywin","width=800,height=600");
				//window.open("report?r="+res.report,"mywin","width=800,height=600");
			}
		});
    });

    // REPORT I - POPULATE COURSE TITLE LIST
	$('#report_i').on('click', '.select_course_btn', function() {
        var year_bi = $("#year_bi").val();
        var courseRefid = $("#courseRefid").val();

        if(year_bi == '') {
            $.alert({
                title: 'Alert!',
                content: 'Please select <b>Year</b>',
                type: 'red',
            });
            return;
        }

		$('#myModalis .modal-content').empty();
		$('#myModalis').modal('show');
		$('#myModalis').find('.modal-content').html('<center><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color:black"></i></center>');
	
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('courseTitlei')?>',
			data: {'year_bi' : year_bi},
			success: function(res) {
				$('#myModalis .modal-content').html(res);
				$('#courseRefid').val('');
			    $('#courseTitle').val('');
				dt_row = $('#tbl_list_cr_title').DataTable({
					"ordering":false,
					"lengthMenu": [[5, 10], [5, 10]]
				});		
			}
		});
	});

    // REPORT I - POPULATE COURSE REFID
	$('#myModalis').on('click', '.select_course_title', function() {
		var thisBtn = $(this);
		var td = thisBtn.parent().siblings();
		var refid = td.eq(0).html().trim();
		var courseTitle = td.eq(1).html().trim().replace(/&amp;/g, '&');
		//alert(trTitle);
		if(refid != null && courseTitle != null){
			$('#courseRefid').val(refid);
			$('#courseTitle').val(courseTitle);
			$('#myModalis').modal('hide');
		}
	});

    // REPORT II
    $('#report_ii').on('click', '.genReportii', function () {
        var repCode = $(this).attr('repCode');
        var year_aii = $("#year_aii").val(); 
        var organizer_ii = $("#organizer_ii").val(); 
        var rep_for_ii = $("#rep_for_ii").val(); 
        var fr_month_aii = $("#fr_month_aii").val(); 
        var fr_year_aii = $("#fr_year_aii").val(); 
        var to_month_aii = $("#to_month_aii").val(); 
        var to_year_aii = $("#to_year_aii").val();
        var org_codeii = $("#org_codeii").val();
        var sector_ii = $("#sector_ii").val();
        var coor_ii = $("#coor_ii").val();

        // alert(repCode+' '+year_aii+' '+organizer_ii+' '+rep_for_ii+' '+fr_month_aii+' '+fr_year_aii+' '+to_month_aii+' '+to_year_aii+' '+org_codeii+' '+sector_ii+' '+coor_ii);
        
        // $.post('<?php //echo $this->lib->class_url('setParamii') ?>', {repCode: repCode, year_aii: year_aii, organizer_ii: organizer_ii, 
        // rep_for_ii: rep_for_ii, fr_month_aii: fr_month_aii, fr_year_aii: fr_year_aii, to_month_aii: to_month_aii, to_year_aii: to_year_aii, 
        // org_codeii: org_codeii, sector_ii: sector_ii, coor_ii: coor_ii}, function (res) {
        //     var repURL = '<?php //echo $this->lib->class_url('genReportii') ?>';
        //     //alert(repURL);
        //     var mywin = window.open( repURL , 'report');
        // }).fail(function(){
        //     $.alert({
        //         title: 'Error!',
        //         content: 'Please contact administrator.',
        //         type: 'red',
        //     });
        //     // msg.danger('Please contact administrator.', '#alert');     
        // });

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setReportParamTrainAppl')?>',
			data: {'repCode': repCode, 'year_aii': year_aii, 'organizer_ii': organizer_ii, 'rep_for_ii': rep_for_ii, 'fr_month_aii': fr_month_aii, 'fr_year_aii': fr_year_aii, 'to_month_aii': to_month_aii, 'to_year_aii': to_year_aii, 'org_codeii': org_codeii, 'sector_ii': sector_ii, 'coor_ii': coor_ii},
			dataType: 'JSON',
			success: function(res) {
				window.open("report?r="+res.report,"mywin","width=800,height=600");
				//window.open("report?r="+res.report,"mywin","width=800,height=600");
			}
		});
    });

    // REPORT III
    $('#report_iii').on('click', '.genReportiii', function () {
        var repCode = $(this).attr('repCode');
        var year_aiii = $("#year_aiii").val(); 
        var department_aiii = $("#department_aiii").val(); 
        var course_titleiii = $("#course_titleiii").val(); 
        var staff_idiii = $("#staff_idiii").val(); 
        var date_course_fromiii = $("#date_course_fromiii").val(); 
        var department_biii = $("#department_biii").val();

        // alert(repCode+' '+year_aiii+' '+department_aiii+' '+course_titleiii+' '+staff_idiii+' '+date_course_fromiii+' '+department_biii);

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setReportParamTrainAppl')?>',
			data: {'repCode': repCode, 'year_aiii': year_aiii, 'department_aiii': department_aiii, 'course_titleiii': course_titleiii, 'staff_idiii': staff_idiii, 'date_course_fromiii': date_course_fromiii, 'department_biii': department_biii},
			dataType: 'JSON',
			success: function(res) {
				window.open("report?r="+res.report,"mywin","width=800,height=600");
				//window.open("report?r="+res.report,"mywin","width=800,height=600");
			}
		});
    });

    // POPULATE COURSE TITLE - REPORT III
	$('#report_iii').on('change','#year_aiii', function() {
		var year = $(this).val();
		$('#crtloader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$('#course_titleiii').html('');
		// alert(year);
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('courseTitleiii')?>',
			data: {'year' : year},
			dataType: 'JSON',
			success: function(res) {
				$('#crtloader').html('');

				var resList = '<option value="" selected > ---Please select--- </option>';
				
				if (res.sts == 1) {
					for (var i in res.courseList) {
						resList += '<option value="'+res.courseList[i]['TH_REF_ID']+'">'+res.courseList[i]['TH_ID_TITLE']+'</option>';
					}
				} 
				
				$("#course_titleiii").html(resList);
			}
		});
    });

    // REPORT IV
    $('#report_iv').on('click', '.genReportiv', function () {
        var repCode = $(this).attr('repCode');
        var induction_courseiv = $("#induction_courseiv").val(); 
        var year_avi = $("#year_avi").val();
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setReportParamTrainAppl')?>',
			data: {'repCode': repCode, 'induction_courseiv': induction_courseiv, 'year_avi': year_avi},
			dataType: 'JSON',
			success: function(res) {
				window.open("report?r="+res.report,"mywin","width=800,height=600");
			}
		});
    });

    // REPORT IV - ATR125 / ATR119
    $('#report_iv').on('click', '.genReportivTi', function () {
        var repCode = $(this).attr('repCode'); 
        var induction_test_sts = $("#induction_test_sts").val(); 
        var pnp_course_sts = $("#pnp_course_sts").val(); 

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setReportParamTrainAppl')?>',
			data: {'repCode': repCode, 'induction_test_sts': induction_test_sts, 'pnp_course_sts': pnp_course_sts},
			dataType: 'JSON',
			success: function(res) {
				window.open("report?r="+res.report,"mywin","width=800,height=600");
			}
		});
    });

    // REPORT V
    $('#report_v').on('click', '.genReportv', function () {
        var repCode = $(this).attr('repCode');
        var year_av = $("#year_av").val(); 
        var month_from_av = $("#month_from_av").val(); 
        var month_to_av = $("#month_to_av").val(); 
        var department_v = $("#department_v").val(); 
        var quarter_v = $("#quarter_v").val(); 
        var quarter_month_av = $("#quarter_month_av").val();
        var quarter_month_bv = $("#quarter_month_bv").val();
        var quarter_month_cv = $("#quarter_month_cv").val();

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setReportParamTrainAppl')?>',
			data: {'repCode': repCode, 'year_av': year_av, 'month_from_av': month_from_av, 
            'month_to_av': month_to_av, 'department_v': department_v, 'quarter_v': quarter_v, 'quarter_month_av': quarter_month_av,
            'quarter_month_bv': quarter_month_bv, 'quarter_month_cv': quarter_month_cv},
			dataType: 'JSON',
			success: function(res) {
				window.open("report?r="+res.report,"mywin","width=800,height=600");
			}
		});
    });
    
    // REPORT VI
    $('#report_vi').on('click', '.genReportvi', function () {
        var repCode = $(this).attr('repCode');
        var month_vi = $("#month_vi").val(); 
        var year_vi = $("#year_vi").val(); 
        var aca_nonaca = $("#aca_nonaca").val(); 
        var orga_vi = $("#orga_vi").val(); 
        var re_formatvi = $("#re_formatvi").val(); 
        var staff_id_vi = $("#staff_id_vi").val();

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setReportParamTrainAppl')?>',
			data: {'repCode': repCode, 'month_vi': month_vi, 'year_vi': year_vi, 
            'aca_nonaca': aca_nonaca, 'orga_vi': orga_vi, 're_formatvi': re_formatvi, 'staff_id_vi': staff_id_vi},
			dataType: 'JSON',
			success: function(res) {
				window.open("report?r="+res.report,"mywin","width=800,height=600");
			}
		});
    });
    
    // REPORT VII
    $('#report_vii').on('click', '.genReportvii', function () {
        var repCode = $(this).attr('repCode');
        var staffID = $("#staff_id_vii").val(); 
        var department = $("#departmentvii").val(); 
        var unit = $("#unitvii").val(); 
        var statusavii = $("#status_avii").val(); 
        var year = $("#year_avii").val(); 
        var courseTitle = $("#course_titleavii").val();
        var dateFrom = $("#date_course_fromvii").val();
        var statusbvii = $("#status_bvii").val();
		var format_vii = $("#format_vii").val();

		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setReportParamTrainAppl')?>',
			data: {'repCode': repCode, 'format_vii': format_vii, 'staffID': staffID, 'department': department, 
            'unit': unit, 'statusavii': statusavii, 'year': year, 'courseTitle': courseTitle, 'dateFrom': dateFrom, 'statusbvii': statusbvii},
			dataType: 'JSON',
			success: function(res) {
				window.open("report?r="+res.report,"mywin","width=800,height=600");
			}
		});
    });

    // POPULATE COURSE TITLE - REPORT VII
	$('#report_vii').on('change','#year_avii', function() {
		var year = $(this).val();
		$('#crtaviiLoader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$('#course_titleiii').html('');
		// alert(year);
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('courseTitleiii')?>',
			data: {'year' : year},
			dataType: 'JSON',
			success: function(res) {
				$('#crtaviiLoader').html('');

				var resList = '<option value="" selected > ---Please select--- </option>';
				
				if (res.sts == 1) {
					for (var i in res.courseList) {
						resList += '<option value="'+res.courseList[i]['TH_REF_ID']+'">'+res.courseList[i]['TH_ID_TITLE']+'</option>';
					}
				} 
				
				$("#course_titleavii").html(resList);
			}
		});
    });

    // POPULATE UNIT - REPORT VII
	$('#report_vii').on('change','#departmentvii', function() {
		var deptCode = $(this).val();
                
		$('#unitLoader').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
		$('#unitvii').html('');
		//alert(deptCode);
		
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('getUnitVii')?>',
			data: {'deptCode' : deptCode},
			dataType: 'JSON',
			success: function(res) {
				$('#unitLoader').html('');

				var resList = '<option value="" selected > ---Please select--- </option>';
				
				if (res.sts == 1) {
					for (var i in res.unit_list) {
						resList += '<option value="'+res.unit_list[i]['DM_DEPT_CODE']+'">'+res.unit_list[i]['DM_DEPT_DESC']+'</option>';
					}
				} 
				
				$("#unitvii").html(resList);
			}
		});
    });
    
    //start add @17/02/2020
    //--------------------------------------------------------------------------
    
    $.ajax({
		type: 'POST',
		url: '<?php echo $this->lib->class_url('tarReportviii')?>',
		data: '',
		beforeSend: function() {
			$('#report_viii').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>').show();
		},
		success: function(res) {
            $('#report_viii').html(res);
		},
    });
    
    //... DEPARTMENT
    $('#report_viii').on('click','.search_dept_btn', function() {
		
		$('#search_dept_list').html('');
		$('#mySearchDeptModal').modal('show');
			
		$.ajax({
			type: 'POST',  
			url: '<?php echo $this->lib->class_url('ATF081DepartmentSearchResult')?>', 
			data: '',
                        //data: {'deptID' : dept},
			success: function(res) {
                            $('#search_dept_list').html(res);
                            dt_deptlist_row = $('#tbl_dept_list').DataTable({
				"ordering":false
                            });
			}
		});
    });
        
    $('#search_dept_list').on('click','.select_dept_btn', function() {
		var thisBtn = $(this);
		var sID = thisBtn.parents('tr').data('dept-code');
		var sname = thisBtn.parent().siblings(':eq(2)').html();

		if (sID) {
			$('#alertSearch').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
			
			// Assign new value to ID and Name
                        $('#deptCode').val(sID);
                        
			//$('input[name="form[department]"]').val(sID);
			$('#dept_name').val(sname);
			
			// Hide search modal
			$('#mySearchDeptModal').modal('hide');
			$('#search_dept_list').html('');
		}	       
    });
    //---------------------------------
    
    //... DEPARTMENT
    $('#report_viii').on('click','.search_dept_btn2', function() {
		
		$('#search_dept_list').html('');
		$('#mySearchDeptModal').modal('show');
			
		$.ajax({
			type: 'POST',  
			url: '<?php echo $this->lib->class_url('ATF081DepartmentSearchResult2')?>', 
			data: '',
                        //data: {'deptID' : dept},
			success: function(res) {
                            $('#search_dept_list').html(res);
                            dt_deptlist_row2 = $('#tbl_dept_list2').DataTable({
				"ordering":false
                            });
			}
		});
    });
        
    $('#search_dept_list').on('click','.select_dept_btn2', function() {
		var thisBtn = $(this);
		var sID = thisBtn.parents('tr').data('dept-code');
		var sname = thisBtn.parent().siblings(':eq(2)').html();

		if (sID) {
			$('#alertSearch').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
			
			// Assign new value to ID and Name
                        $('#deptCode2').val(sID);
                        
			//$('input[name="form[department]"]').val(sID);
			$('#dept_name2').val(sname);
			
			// Hide search modal
			$('#mySearchDeptModal').modal('hide');
			$('#search_dept_list').html('');
		}	       
    });
    
    //... DEPARTMENT
    $('#report_viii').on('click','.search_dept_btn3', function() {
		
		$('#search_dept_list').html('');
		$('#mySearchDeptModal').modal('show');
			
		$.ajax({
			type: 'POST',  
			url: '<?php echo $this->lib->class_url('ATF081DepartmentSearchResult3')?>', 
			data: '',
                        //data: {'deptID' : dept},
			success: function(res) {
                            $('#search_dept_list').html(res);
                            dt_deptlist_row3 = $('#tbl_dept_list3').DataTable({
				"ordering":false
                            });
			}
		});
    });
        
    $('#search_dept_list').on('click','.select_dept_btn3', function() {
		var thisBtn = $(this);
		var sID = thisBtn.parents('tr').data('dept-code');
		var sname = thisBtn.parent().siblings(':eq(2)').html();

		if (sID) {
			$('#alertSearch').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
			
			// Assign new value to ID and Name
                        $('#deptCode3').val(sID);
                        
			//$('input[name="form[department]"]').val(sID);
			$('#dept_name3').val(sname);
			
			// Hide search modal
			$('#mySearchDeptModal').modal('hide');
			$('#search_dept_list').html('');
		}	       
    });
    
    //... TRAINING
    $('#report_viii').on('click','.search_training_btn', function() {
		
                var year = $("#year2").val(); 
                var month = $("#month_from").val();
		$('#search_training_list').html('');
		$('#mySearchTrainingModal').modal('show');
			
		$.ajax({
			type: 'POST',  
			url: '<?php echo $this->lib->class_url('ATF081TrainingSearchResult')?>', 
			//data: '',
                        data: {'year' : year, 'month' : month},
			success: function(res) {
                            $('#search_training_list').html(res);
                            dt_traininglist_row = $('#tbl_training_list').DataTable({
				"ordering":false
                            });
			}
		});
    });
        
    $('#search_training_list').on('click','.select_training_btn', function() {
		var thisBtn = $(this);
		var sID = thisBtn.parents('tr').data('training-code');
		var sname = thisBtn.parent().siblings(':eq(2)').html();

		if (sID) {
			$('#alertSearch').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
			
			// Assign new value to ID and Name
                        $('#trainingCode').val(sID);
                        
			//$('input[name="form[department]"]').val(sID);
			$('#training_name').val(sname);
			
			// Hide search modal
			$('#mySearchTrainingModal').modal('hide');
			$('#search_training_list').html('');
		}	       
    });
    
    //... TRAINING
    $('#report_viii').on('click','.search_training_btn2', function() {

		$('#search_training_list').html('');
		$('#mySearchTrainingModal').modal('show');
			
		$.ajax({
			type: 'POST',  
			url: '<?php echo $this->lib->class_url('ATF081TrainingSearchResult2')?>', 
			data: '',
                        //data: {'year' : year, 'month' : month},
			success: function(res) {
                            $('#search_training_list').html(res);
                            dt_traininglist_row2 = $('#tbl_training_list2').DataTable({
				"ordering":false
                            });
			}
		});
    });
        
    $('#search_training_list').on('click','.select_training_btn2', function() {
		var thisBtn = $(this);
		var sID = thisBtn.parents('tr').data('training-code');
		var sname = thisBtn.parent().siblings(':eq(2)').html();

		if (sID) {
			$('#alertSearch').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
			
			// Assign new value to ID and Name
                        $('#trainingCode2').val(sID);
                        
			//$('input[name="form[department]"]').val(sID);
			$('#training_name2').val(sname);
			
			// Hide search modal
			$('#mySearchTrainingModal').modal('hide');
			$('#search_training_list').html('');
		}	       
    });
    
    // REPORT VIII
    $('#report_viii').on('click', '.genReportviii', function () {
  
        var repCode = $(this).attr('repCode');
        var department_v = $("#deptCode").val(); 
        var department_v2 = $("#deptCode2").val();
        var trainingID = $("#trainingCode").val();
        var year = $("#year2").val();
        var month = $("#month_from").val();
        var department_v3 = $("#deptCode3").val();
        var trainingID2 = $("#trainingCode2").val();

        // $.post('<?php echo $this->lib->class_url('setParamviii') ?>', {repCode: repCode, department_v: department_v,
        //     department_v2: department_v2, department_v3: department_v3, trainingID: trainingID, trainingID2: trainingID2, year: year, month: month}, function (res) {
        //     var repURL = '<?php echo $this->lib->class_url('genReportviii') ?>';
        //     //alert(repURL);
        //     var mywin = window.open( repURL , 'report');
        // }).fail(function(){
        //     $.alert({
        //         title: 'Error!',
        //         content: 'Please contact administrator.',
        //         type: 'red',
        //     });
        //     // msg.danger('Please contact administrator.', '#alert');        
        // });
        
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->lib->class_url('setReportParamTrainAppl')?>',
			data: {'repCode': repCode, 'department_v': department_v,
            'department_v2': department_v2, 'department_v3': department_v3, 'trainingID': trainingID, 'trainingID2': trainingID2, 'year': year, 'month': month},
			dataType: 'JSON',
			success: function(res) {
				window.open("report?r="+res.report,"mywin","width=800,height=600");
			}
		});
    });
    
    // TAB 1 : REPORTS (tarReport.php)
    // -------------------------------
    //... DEPARTMENT
    $('#report_i').on('click','.search_dept_tab1_btn', function() {
		
		$('#search_dept_list').html('');
		$('#mySearchDeptModal').modal('show');
			
		$.ajax({
			type: 'POST',  
			url: '<?php echo $this->lib->class_url('ATF081Tab1DepartmentSearchResult')?>', 
			data: '',
                        //data: {'deptID' : dept},
			success: function(res) {
                            $('#search_dept_list').html(res);
                            dt_depttab1list_row = $('#tbl_dept_tab1_list').DataTable({
				"ordering":false
                            });
			}
		});
    });
        
    $('#search_dept_list').on('click','.select_deptTab1_btn', function() {
		var thisBtn = $(this);
		var sID = thisBtn.parents('tr').data('dept-code');
		var sname = thisBtn.parent().siblings(':eq(2)').html();

		if (sID) {
			$('#alertSearch').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
			
			// Assign new value to ID and Name
                        $('#department_ai').val(sID);
                        
			//$('input[name="form[department]"]').val(sID);
			$('#department_ai_name').val(sname);
			
			// Hide search modal
			$('#mySearchDeptModal').modal('hide');
			$('#search_dept_list').html('');
		}	       
    });
    //---------------------------------
   
    // TAB 2 : REPORTS (II) (tarReportii.php)
    // --------------------------------------
    
    //... DEPARTMENT
    $('#report_ii').on('click','.search_organizer_tab2_btn', function() {
		
		$('#search_organizer_list').html('');
		$('#mySearchOrganizerModal').modal('show');
			
		$.ajax({
			type: 'POST',  
			url: '<?php echo $this->lib->class_url('ATF081Tab2OrganizerSearchResult')?>', 
			data: '',
                        //data: {'deptID' : dept},
			success: function(res) {
                            $('#search_organizer_list').html(res);
                            dt_organizertab2list_row = $('#tbl_organizer_tab2_list').DataTable({
				"ordering":false
                            });
			}
		});
    });
        
    $('#search_organizer_list').on('click','.select_orgTab2_btn', function() {
		var thisBtn = $(this);
		var sID = thisBtn.parents('tr').data('org-code');
		var sname = thisBtn.parent().siblings(':eq(2)').html();

		if (sID) {
			$('#alertSearch').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
			
			// Assign new value to ID and Name
                        $('#org_codeii').val(sID);
                        
			//$('input[name="form[department]"]').val(sID);
			$('#org_codeii_name').val(sname);
			
			// Hide search modal
			$('#mySearchOrganizerModal').modal('hide');
			$('#search_organizer_list').html('');
		}	       
    });
    //---------------------------------
    
    //... COORDINATOR / STAFF
    $('#report_ii').on('click','.search_staff_tab2_btn', function() {
		
		$('#search_staff_list').html('');
		$('#mySearchStaffModal').modal('show');
			
		$.ajax({
			type: 'POST',  
			url: '<?php echo $this->lib->class_url('ATF081Tab2StaffSearchResult')?>', 
			data: '',
                        //data: {'deptID' : dept},
			success: function(res) {
                            $('#search_staff_list').html(res);
                            dt_stafftab2list_row = $('#tbl_staff_tab2_list').DataTable({
				"ordering":false
                            });
			}
		});
    });
        
    $('#search_staff_list').on('click','.select_staffTab2_btn', function() {
		var thisBtn = $(this);
		var sID = thisBtn.parents('tr').data('staff-id');
		var sname = thisBtn.parent().siblings(':eq(2)').html();

		if (sID) {
			$('#alertSearch').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
			
			// Assign new value to ID and Name
                        $('#coor_ii').val(sID);
                        
			//$('input[name="form[department]"]').val(sID);
			$('#coor_ii_name').val(sname);
			
			// Hide search modal
			$('#mySearchStaffModal').modal('hide');
			$('#search_staff_list').html('');
		}	       
    });
    //---------------------------------
    
    // TAB 3 : REPORTS III (tarReportiii.php)
    // --------------------------------------
    //... DEPARTMENT
    $('#report_iii').on('click','.search_dept_tab3_btn', function() {
		
		$('#search_dept_list').html('');
		$('#mySearchDeptModal').modal('show');
			
		$.ajax({
			type: 'POST',  
			url: '<?php echo $this->lib->class_url('ATF081Tab3DepartmentSearchResult')?>', 
			data: '',
                        //data: {'deptID' : dept},
			success: function(res) {
                            $('#search_dept_list').html(res);
                            dt_depttab3list_row = $('#tbl_dept_tab3_list').DataTable({
				"ordering":false
                            });
			}
		});
    });
        
    $('#search_dept_list').on('click','.select_deptTab3_btn', function() {
		var thisBtn = $(this);
		var sID = thisBtn.parents('tr').data('dept-code');
		var sname = thisBtn.parent().siblings(':eq(2)').html();

		if (sID) {
			$('#alertSearch').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
			
			// Assign new value to ID and Name
                        $('#department_aiii').val(sID);
                        
			//$('input[name="form[department]"]').val(sID);
			$('#department_aiii_name').val(sname);
			
			// Hide search modal
			$('#mySearchDeptModal').modal('hide');
			$('#search_dept_list').html('');
		}	       
    });
    //---------------------------------
    
    //... TRAINING TITLE
    $('#report_iii').on('click','.search_training_tab3_btn', function() {
	
        var year = $("#year_aiii").val();
        
		$('#search_training_list').html('');
		$('#mySearchTrainingModal').modal('show');
			
		$.ajax({
			type: 'POST',  
			url: '<?php echo $this->lib->class_url('ATF081Tab3TrainingSearchResult')?>', 
			//data: '',
                        data: {'year' : year},
			success: function(res) {
                            $('#search_training_list').html(res);
                            dt_trainingtab3list_row = $('#tbl_training_tab3_list').DataTable({
				"ordering":false
                            });
			}
		});
    });
        
    $('#search_training_list').on('click','.select_training_tab3_btn', function() {
		var thisBtn = $(this);
		var sID = thisBtn.parents('tr').data('training-code');
		var sname = thisBtn.parent().siblings(':eq(2)').html();

		if (sID) {
			$('#alertSearch').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
			
			// Assign new value to ID and Name
                        $('#course_titleiii').val(sID);
                        
			//$('input[name="form[department]"]').val(sID);
			$('#course_titleiii_name').val(sname);
			
			// Hide search modal
			$('#mySearchTrainingModal').modal('hide');
			$('#search_training_list').html('');
		}	       
    });
    //---------------------------------
    
    //... STAFF
    $('#report_iii').on('click','.search_staff_tab3_btn', function() {
		
		$('#search_staff_list').html('');
		$('#mySearchStaffModal').modal('show');
			
		$.ajax({
			type: 'POST',  
			url: '<?php echo $this->lib->class_url('ATF081Tab3StaffSearchResult')?>', 
			data: '',
                        //data: {'deptID' : dept},
			success: function(res) {
                            $('#search_staff_list').html(res);
                            dt_stafftab3list_row = $('#tbl_staff_tab3_list').DataTable({
				"ordering":false
                            });
			}
		});
    });
        
    $('#search_staff_list').on('click','.select_staffTab3_btn', function() {
		var thisBtn = $(this);
		var sID = thisBtn.parents('tr').data('staff-id');
		var sname = thisBtn.parent().siblings(':eq(2)').html();

		if (sID) {
			$('#alertSearch').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
			
			// Assign new value to ID and Name
                        $('#staff_idiii').val(sID);
                        
			//$('input[name="form[department]"]').val(sID);
			$('#staff_idiii_name').val(sname);
			
			// Hide search modal
			$('#mySearchStaffModal').modal('hide');
			$('#search_staff_list').html('');
		}	       
    });
    //---------------------------------
    
    //... DEPARTMENT
    $('#report_iii').on('click','.search_dept_tab3b_btn', function() {
		
		$('#search_dept_list').html('');
		$('#mySearchDeptModal').modal('show');
			
		$.ajax({
			type: 'POST',  
			url: '<?php echo $this->lib->class_url('ATF081Tab3BDepartmentSearchResult')?>', 
			data: '',
                        //data: {'deptID' : dept},
			success: function(res) {
                            $('#search_dept_list').html(res);
                            dt_depttab3blist_row = $('#tbl_dept_tab3b_list').DataTable({
				"ordering":false
                            });
			}
		});
    });
        
    $('#search_dept_list').on('click','.select_deptTab3B_btn', function() {
		var thisBtn = $(this);
		var sID = thisBtn.parents('tr').data('dept-code');
		var sname = thisBtn.parent().siblings(':eq(2)').html();

		if (sID) {
			$('#alertSearch').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
			
			// Assign new value to ID and Name
                        $('#department_biii').val(sID);
                        
			//$('input[name="form[department]"]').val(sID);
			$('#department_biii_name').val(sname);
			
			// Hide search modal
			$('#mySearchDeptModal').modal('hide');
			$('#search_dept_list').html('');
		}	       
    });
    //---------------------------------
    
    // TAB 5 : REPORTS (V) (tarReportv.php)
    // --------------------------------------
    //... DEPARTMENT
    $('#report_v').on('click','.search_dept_tab5_btn', function() {
		
		$('#search_dept_list').html('');
		$('#mySearchDeptModal').modal('show');
			
		$.ajax({
			type: 'POST',  
			url: '<?php echo $this->lib->class_url('ATF081Tab5DepartmentSearchResult')?>', 
			data: '',
                        //data: {'deptID' : dept},
			success: function(res) {
                            $('#search_dept_list').html(res);
                            dt_depttab5list_row = $('#tbl_dept_tab5_list').DataTable({
				"ordering":false
                            });
			}
		});
    });
        
    $('#search_dept_list').on('click','.select_deptTab5_btn', function() {
		var thisBtn = $(this);
		var sID = thisBtn.parents('tr').data('dept-code');
		var sname = thisBtn.parent().siblings(':eq(2)').html();

		if (sID) {
			$('#alertSearch').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
			
			// Assign new value to ID and Name
                        $('#department_v').val(sID);
                        
			//$('input[name="form[department]"]').val(sID);
			$('#department_v_name').val(sname);
			
			// Hide search modal
			$('#mySearchDeptModal').modal('hide');
			$('#search_dept_list').html('');
		}	       
    });
    //---------------------------------
    
    // TAB 6 : REPORTS (VI) (tarReportvi.php)
    // --------------------------------------
    
    //... STAFF
    $('#report_vi').on('click','.search_staff_tab6_btn', function() {
		
		$('#search_staff_list').html('');
		$('#mySearchStaffModal').modal('show');
			
		$.ajax({
			type: 'POST',  
			url: '<?php echo $this->lib->class_url('ATF081Tab6StaffSearchResult')?>', 
			data: '',
                        //data: {'deptID' : dept},
			success: function(res) {
                            $('#search_staff_list').html(res);
                            dt_stafftab6list_row = $('#tbl_staff_tab6_list').DataTable({
				"ordering":false
                            });
			}
		});
    });
        
    $('#search_staff_list').on('click','.select_staffTab6_btn', function() {
		var thisBtn = $(this);
		var sID = thisBtn.parents('tr').data('staff-id');
		var sname = thisBtn.parent().siblings(':eq(2)').html();

		if (sID) {
			$('#alertSearch').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
			
			// Assign new value to ID and Name
                        $('#staff_id_vi').val(sID);
                        
			//$('input[name="form[department]"]').val(sID);
			$('#staff_id_vi_name').val(sname);
			
			// Hide search modal
			$('#mySearchStaffModal').modal('hide');
			$('#search_staff_list').html('');
		}	       
    });
    //---------------------------------
    
    // TAB 7 : REPORTS (VII) (tarReportvii.php)
    // --------------------------------------
    
    //... STAFF
    $('#report_vii').on('click','.search_staff_tab7_btn', function() {
		
		$('#search_staff_list').html('');
		$('#mySearchStaffModal').modal('show');
			
		$.ajax({
			type: 'POST',  
			url: '<?php echo $this->lib->class_url('ATF081Tab7StaffSearchResult')?>', 
			data: '',
                        //data: {'deptID' : dept},
			success: function(res) {
                            $('#search_staff_list').html(res);
                            dt_stafftab7list_row = $('#tbl_staff_tab7_list').DataTable({
				"ordering":false
                            });
			}
		});
    });
        
    $('#search_staff_list').on('click','.select_staffTab7_btn', function() {
		var thisBtn = $(this);
		var sID = thisBtn.parents('tr').data('staff-id');
		var sname = thisBtn.parent().siblings(':eq(2)').html();

		if (sID) {
			$('#alertSearch').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
			
			// Assign new value to ID and Name
                        $('#staff_id_vii').val(sID);
                        
			//$('input[name="form[department]"]').val(sID);
			$('#staff_id_vii_name').val(sname);
			
			// Hide search modal
			$('#mySearchStaffModal').modal('hide');
			$('#search_staff_list').html('');
		}	       
    });
    //---------------------------------
    
    //... TRAINING TITLE
    $('#report_vii').on('click','.search_training_tab7_btn', function() {
	
        var year = $("#year_avii").val();
        
		$('#search_training_list').html('');
		$('#mySearchTrainingModal').modal('show');
			
		$.ajax({
			type: 'POST',  
			url: '<?php echo $this->lib->class_url('ATF081Tab7TrainingSearchResult')?>', 
			//data: '',
                        data: {'year' : year},
			success: function(res) {
                            $('#search_training_list').html(res);
                            dt_trainingtab7list_row = $('#tbl_training_tab7_list').DataTable({
				"ordering":false
                            });
			}
		});
    });
        
    $('#search_training_list').on('click','.select_training_tab7_btn', function() {
		var thisBtn = $(this);
		var sID = thisBtn.parents('tr').data('training-code');
		var sname = thisBtn.parent().siblings(':eq(2)').html();

		if (sID) {
			$('#alertSearch').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>');
			
			// Assign new value to ID and Name
                        $('#course_titleavii').val(sID);
                        
			//$('input[name="form[department]"]').val(sID);
			$('#course_titleavii_name').val(sname);
			
			// Hide search modal
			$('#mySearchTrainingModal').modal('hide');
			$('#search_training_list').html('');
		}	       
    });
    //---------------------------------
 
    //end @17/02/2020 -----------------------------------------------------------
    
    
    
</script>