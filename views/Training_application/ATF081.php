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

<script>
	var tr_row = '';
    
	//var intExt = '1';
	var disDept = '1';
	var disYear = '1';
    var evaluation = '1';
	//var dt_row2 = '';
	
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
        
        $.post('<?php echo $this->lib->class_url('setParami') ?>', {repCode: repCode, year_ai: year_ai, department_ai: department_ai, 
        choice_ai: choice_ai, year_bi: year_bi, courseRefid: courseRefid}, function (res) {
            var repURL = '<?php echo $this->lib->class_url('genReporti') ?>';
            //alert(repURL);
            var mywin = window.open( repURL , 'report');
        }).fail(function(){
            $.alert({
                title: 'Error!',
                content: 'Please contact administrator.',
                type: 'red',
            });
            // msg.danger('Please contact administrator.', '#alert');     
        });
        
    });
	
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
			url: '<?php echo $this->lib->class_url('setRepParam')?>',
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

    // REPORT I
    $('#report_i').on('click', '.genReportMMi', function () {
        var repCode = $(this).attr('repCode');
        var fr_month_ai = $("#fr_month_ai").val(); 
        var fr_year_ai = $("#fr_year_ai").val(); 
        var to_month_ai = $("#to_month_ai").val(); 
        var to_year_ai = $("#to_year_ai").val();

        if(fr_month_ai == '' || fr_year_ai == '' || to_month_ai == '' || to_year_ai == '') {
            $.alert({
                title: 'Alert!',
                content: 'Please select <b>From (month, year)</b> and <b>To (month, year)</b>',
                type: 'red',
            });
            return;
        }

        $.post('<?php echo $this->lib->class_url('setParami') ?>', {repCode: repCode, fr_month_ai: fr_month_ai, 
        fr_year_ai: fr_year_ai, to_month_ai: to_month_ai, to_year_ai: to_year_ai}, function (res) {
            var repURL = '<?php echo $this->lib->class_url('genReporti') ?>';
            //alert(repURL);
            var mywin = window.open( repURL , 'report');
        }).fail(function(){
            $.alert({
                title: 'Error!',
                content: 'Please contact administrator.',
                type: 'red',
            });
            // msg.danger('Please contact administrator.', '#alert');      
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
        
        $.post('<?php echo $this->lib->class_url('setParamii') ?>', {repCode: repCode, year_aii: year_aii, organizer_ii: organizer_ii, 
        rep_for_ii: rep_for_ii, fr_month_aii: fr_month_aii, fr_year_aii: fr_year_aii, to_month_aii: to_month_aii, to_year_aii: to_year_aii, 
        org_codeii: org_codeii, sector_ii: sector_ii, coor_ii: coor_ii}, function (res) {
            var repURL = '<?php echo $this->lib->class_url('genReportii') ?>';
            //alert(repURL);
            var mywin = window.open( repURL , 'report');
        }).fail(function(){
            $.alert({
                title: 'Error!',
                content: 'Please contact administrator.',
                type: 'red',
            });
            // msg.danger('Please contact administrator.', '#alert');     
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
        
        $.post('<?php echo $this->lib->class_url('setParamiii') ?>', {repCode: repCode, year_aiii: year_aiii, department_aiii: department_aiii, 
        course_titleiii: course_titleiii, staff_idiii: staff_idiii, date_course_fromiii: date_course_fromiii, department_biii: department_biii}, function (res) {
            var repURL = '<?php echo $this->lib->class_url('genReportiii') ?>';
            //alert(repURL);
            var mywin = window.open( repURL , 'report');
        }).fail(function(){
            $.alert({
                title: 'Error!',
                content: 'Please contact administrator.',
                type: 'red',
            });
            // msg.danger('Please contact administrator.', '#alert');        
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

        // alert(repCode+' '+induction_courseiv+' '+induction_test_sts+' '+pnp_course_sts+' '+year_avi);
        
        $.post('<?php echo $this->lib->class_url('setParamiv') ?>', {repCode: repCode, induction_courseiv: induction_courseiv, year_avi: year_avi}, function (res) {
            var repURL = '<?php echo $this->lib->class_url('genReportiv') ?>';
            //alert(repURL);
            var mywin = window.open( repURL , 'report');
        }).fail(function(){
            $.alert({
                title: 'Error!',
                content: 'Please contact administrator.',
                type: 'red',
            });
            // msg.danger('Please contact administrator.', '#alert');        
        });
    });

    // REPORT IV - ATR125 / ATR119
    $('#report_iv').on('click', '.genReportivTi', function () {
        var repCode = $(this).attr('repCode'); 
        var induction_test_sts = $("#induction_test_sts").val(); 
        var pnp_course_sts = $("#pnp_course_sts").val(); 

        // alert(repCode+' '+induction_courseiv+' '+induction_test_sts+' '+pnp_course_sts+' '+year_avi);

        // if(induction_test_sts == '') {
        //     $.alert({
        //         title: 'Alert!',
        //         content: 'Please select <b>General induction test status</b>',
        //         type: 'red',
        //     });
        //     return;
        // }

        // if(pnp_course_sts == '') {
        //     $.alert({
        //         title: 'Alert!',
        //         content: 'Please select <b>P & P course status</b>',
        //         type: 'red',
        //     });
        //     return;
        // }
        
        $.post('<?php echo $this->lib->class_url('setParamiv') ?>', {repCode: repCode, induction_test_sts: induction_test_sts, 
        pnp_course_sts: pnp_course_sts}, function (res) {
            var repURL = '<?php echo $this->lib->class_url('genReportiv') ?>';
            //alert(repURL);
            var mywin = window.open( repURL , 'report');
        }).fail(function(){
            $.alert({
                title: 'Error!',
                content: 'Please contact administrator.',
                type: 'red',
            });
            // msg.danger('Please contact administrator.', '#alert');        
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

        // alert(repCode+' '+year_aiii+' '+department_aiii+' '+course_titleiii+' '+staff_idiii+' '+date_course_fromiii+' '+department_biii);
        
        $.post('<?php echo $this->lib->class_url('setParamv') ?>', {repCode: repCode, year_av: year_av, month_from_av: month_from_av, 
            month_to_av: month_to_av, department_v: department_v, quarter_v: quarter_v, quarter_month_av: quarter_month_av,
            quarter_month_bv: quarter_month_bv, quarter_month_cv: quarter_month_cv}, function (res) {
            var repURL = '<?php echo $this->lib->class_url('genReportv') ?>';
            //alert(repURL);
            var mywin = window.open( repURL , 'report');
        }).fail(function(){
            $.alert({
                title: 'Error!',
                content: 'Please contact administrator.',
                type: 'red',
            });
            // msg.danger('Please contact administrator.', '#alert');        
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

        // alert(month_vi+' '+year_vi+' '+aca_nonaca+' '+orga_vi+' '+re_formatvi+' '+staff_id_vi);
        
        $.post('<?php echo $this->lib->class_url('setParamvi') ?>', {repCode: repCode, month_vi: month_vi, year_vi: year_vi, 
            aca_nonaca: aca_nonaca, orga_vi: orga_vi, re_formatvi: re_formatvi, staff_id_vi: staff_id_vi}, function (res) {
            var repURL = '<?php echo $this->lib->class_url('genReportvi') ?>';
            //alert(repURL);
            var mywin = window.open( repURL , 'report');
        }).fail(function(){
            $.alert({
                title: 'Error!',
                content: 'Please contact administrator.',
                type: 'red',
            });
            // msg.danger('Please contact administrator.', '#alert');        
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

        // alert(month_vi+' '+year_vi+' '+aca_nonaca+' '+orga_vi+' '+re_formatvi+' '+staff_id_vi);
        
        $.post('<?php echo $this->lib->class_url('setParamvii') ?>', {repCode: repCode, staffID: staffID, department: department, 
            unit: unit, statusavii: statusavii, year: year, courseTitle: courseTitle, dateFrom: dateFrom, statusbvii: statusbvii}, function (res) {
            var repURL = '<?php echo $this->lib->class_url('genReportvii') ?>';
            //alert(repURL);
            var mywin = window.open( repURL , 'report');
        }).fail(function(){
            $.alert({
                title: 'Error!',
                content: 'Please contact administrator.',
                type: 'red',
            });
            // msg.danger('Please contact administrator.', '#alert');        
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
</script>