<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Sistema de gestão - AMAUC</title>
        <link href="application/images/favicon.png" rel="icon">

		
        <!--  -->

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, user-scalable=no">
		<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">

        <link href="library/inspinia/css/bootstrap.min.css" rel="stylesheet">
	   	<link href="library/inspinia/font-awesome/css/font-awesome.css" rel="stylesheet">
	    <link href="library/inspinia/css/animate.css" rel="stylesheet">
	    <link href="library/inspinia/css/style.css" rel="stylesheet">
	    <link href="application/script/css/system.css" rel="stylesheet">
	    <!-- Data Tables -->
	    <link href="library/inspinia/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
	    <link href="library/inspinia/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
	    <link href="library/inspinia/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
		<!-- Calendar -->
		<link href="library/inspinia/css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    	<link href="library/inspinia/css/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>
	    <!-- Sweet Alert -->
    	<link href="library/inspinia/css/plugins/sweetalert2/sweetalert2.css" rel="stylesheet">
	
		<link href="library/inspinia/css/plugins/iCheck/custom.css" rel="stylesheet">
	    <link href="library/inspinia/css/plugins/chosen/chosen.css" rel="stylesheet">
	    <link href="library/inspinia/css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
	    <link href="library/inspinia/css/plugins/cropper/cropper.min.css" rel="stylesheet">

	    <link href="library/inspinia/css/plugins/switchery/switchery.css" rel="stylesheet">
	    <link href="library/inspinia/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
	    <link href="library/inspinia/css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">
	    <link href="library/inspinia/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
	    <link href="library/inspinia/css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
	    <link href="library/inspinia/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
	    <link href="library/inspinia/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
	    <link href="library/inspinia/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">	    
	    <link href="library/inspinia/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
	    <link href="library/inspinia/css/plugins/select2/select2.min.css" rel="stylesheet">
		<link href="library/inspinia/css/plugins/iCheck/custom.css" rel="stylesheet">
		<link href="library/inspinia/css/plugins/bootstrap-select/bootstrap-select.css" rel="stylesheet">
		<link href="library/inspinia/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

		<link href="library/inspinia/css/plugins/c3/c3.min.css" rel="stylesheet">
		
		<!-- Simple Line Icons -->
		<link href="library/inspinia/css/simple-line-icons.css" rel="stylesheet">

		<!-- Line Icons -->
		<link href="library/inspinia/css/linecons.css" rel="stylesheet">

		<link href="library/inspinia/css/material-design-color-palette.min.css" rel="stylesheet">
		<link href="library/inspinia/css/material-design-iconic-font.min.css"   rel="stylesheet">
		<link href="library/inspinia/fileinput/css/fileinput.css" rel="stylesheet">	    

		<!-- Toastr style -->
    	<link href="library/inspinia/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    	<link href="library/inspinia/css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">

    	<style type="text/css">
    		.select2-container--default .select2-selection--single{
    			border: 1px solid #e5e6e7 !important;
			    border-radius: 0px !important;
			    height: 34px !important;
    		}

    		.select2-container--default .select2-selection--single:focus{
    			border: 1px solid #1ab394 !important;
    		}

    		.select2-container--default .select2-selection--multiple{
    			border: 1px solid #e5e6e7 !important;
			    border-radius: 0px !important;
			    min-height: 34px !important;
			    padding-bottom: 5px;
    		}

    		.select2-container--default .select2-selection--multiple:focus{
    			border: 1px solid #1ab394 !important;
    		}
    	</style>

    	<script src="application/script/js/mascara_regex.js"></script>
    	<script src="application/script/ajax/ajax.js"></script>
		
		<!-- Mainly scripts -->
	    <script src="library/inspinia/js/jquery-2.1.4.js"></script>
	    <script src="library/inspinia/js/bootstrap.min.js"></script>
	    <script src="library/inspinia/js/plugins/metisMenu/jquery.metisMenu.js"></script>
	    <script src="library/inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	    <script src="library/inspinia/js/plugins/filestyle/bootstrap-filestyle.min.js"></script>
	
		<script src="library/inspinia/js/plugins/d3/d3.min.js"></script>
		<script src="library/inspinia/js/plugins/c3/c3.min.js"></script>
	    <!-- Data Tables -->
	    <script src="library/inspinia/js/plugins/dataTables/jquery.dataTables.js"></script>
	    <script src="library/inspinia/js/plugins/dataTables/dataTables.bootstrap.js"></script>
	    <script src="library/inspinia/js/plugins/dataTables/dataTables.responsive.js"></script>
	    <script src="library/inspinia/js/plugins/dataTables/dataTables.tableTools.min.js"></script>

	    <!-- Flot -->
	    <script src="library/inspinia/js/plugins/flot/jquery.flot.js"></script>
	    <script src="library/inspinia/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
	    <script src="library/inspinia/js/plugins/flot/jquery.flot.spline.js"></script>
	    <script src="library/inspinia/js/plugins/flot/jquery.flot.resize.js"></script>
	    <script src="library/inspinia/js/plugins/flot/jquery.flot.pie.js"></script>
	    <script src="library/inspinia/js/plugins/flot/jquery.flot.symbol.js"></script>
	    <script src="library/inspinia/js/plugins/flot/jquery.flot.time.js"></script>

	    <!-- Peity -->
	    <script src="library/inspinia/js/plugins/peity/jquery.peity.min.js"></script>
	    <script src="library/inspinia/js/demo/peity-demo.js"></script>

	    <!-- Custom and plugin javascript -->
	    <script src="library/inspinia/js/inspinia.js"></script>
	    <script src="library/inspinia/js/plugins/pace/pace.min.js"></script>

	    <!-- jQuery UI -->
	    <script src="library/inspinia/js/plugins/jquery-ui/jquery-ui.min.js"></script>
		
		<!-- Jvectormap -->
	    <script src="library/inspinia/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
	    <script src="library/inspinia/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

	    <!-- EayPIE -->
	    <script src="library/inspinia/js/plugins/easypiechart/jquery.easypiechart.js"></script>

	    <!-- Sparkline -->
	    <script src="library/inspinia/js/plugins/sparkline/jquery.sparkline.min.js"></script>

	    <!-- Sparkline demo data  -->
	    <script src="library/inspinia/js/demo/sparkline-demo.js"></script>

		

	    <script type="text/javascript" src="application/script/js/jquery.maskedinput.js"></script>   
   		<script type='text/javascript' src="application/script/js/system.js"></script>
        <script type='text/javascript' src="application/script/js/masc_val.js"></script>
        <script type='text/javascript' src='library/inspinia/js/plugins/bootbox/bootbox.min.js'></script>

        <link href="library/inspinia/css/plugins/iCheck/custom.css" rel="stylesheet">
    	<link href="library/inspinia/css/plugins/steps/jquery.steps.css" rel="stylesheet">

    	<!-- Steps -->
	    <script src="library/inspinia/js/plugins/staps/jquery.steps.min.js"></script>
	    
	    <!-- Jquery Validate -->
	    <script src="library/inspinia/js/plugins/validate/jquery.validate.min.js"></script>
	    <script src="library/inspinia/js/plugins/validate/additional-methods.min.js"></script>
	    <script src="library/inspinia/js/plugins/validate/localization/messages_pt_BR.min.js"></script>

	    <!-- Chosen -->
	    <script src="library/inspinia/js/plugins/chosen/chosen.jquery.js"></script>

	   	<!-- JSKnob -->
	   	<script src="library/inspinia/js/plugins/jsKnob/jquery.knob.js"></script>

	   	<!-- Input Mask-->
	    <script src="library/inspinia/js/plugins/jasny/jasny-bootstrap.min.js"></script>

	   	<!-- Data picker -->
	   	<script src="library/inspinia/js/plugins/datepicker/bootstrap-datepicker.js"></script>
	   	<script src="library/inspinia/js/plugins/datepicker/locales/bootstrap-datepicker.pt-BR.min.js"></script>

	   	<!-- NouSlider -->
	   	<script src="library/inspinia/js/plugins/nouslider/jquery.nouislider.min.js"></script>

	   	<!-- Switchery -->
	   	<script src="library/inspinia/js/plugins/switchery/switchery.js"></script>

	    <!-- IonRangeSlider -->
	    <script src="library/inspinia/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

	    <!-- iCheck -->
	    <script src="library/inspinia/js/plugins/iCheck/icheck.min.js"></script>

	    <!-- MENU -->
	    <script src="library/inspinia/js/plugins/metisMenu/jquery.metisMenu.js"></script>

	    <!-- Color picker -->
	    <script src="library/inspinia/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

	    <!-- Clock picker -->
	    <script src="library/inspinia/js/plugins/clockpicker/clockpicker.js"></script>

	    <!-- Image cropper -->
	    <script src="library/inspinia/js/plugins/cropper/cropper.min.js" ></script>

	    <!-- Date range use moment.js same as full calendar plugin -->
	    <script src="library/inspinia/js/plugins/fullcalendar/moment.min.js"></script>

	    <!-- Date range picker -->
	    <script src="library/inspinia/js/plugins/daterangepicker/daterangepicker.js"></script>

	    <!-- Select2 -->
	    <script src="library/inspinia/js/plugins/select2/select2.full.min.js"></script>

	    <!-- Sweet alert -->
    	<script src="library/inspinia/js/plugins/sweetalert2/sweetalert2.min.js"></script>

    	<script src="library/inspinia/js/plugins/bootstrap-select/bootstrap-select.js"></script>

    	<!-- Mask Money -->
    	<script src="library/inspinia/js/plugins/jquery-maskmoney/jquery.maskMoney.js"></script>

    	<!-- Fileinput -->
    	<script src="library/inspinia/fileinput/js/fileinput.js"></script>
    	<script src="library/inspinia/fileinput/js/fileinput_locale_pt-BR.js"></script>

    	<!-- Toastr script -->
    	<script src="library/inspinia/js/plugins/toastr/toastr.min.js"></script>
    	
		<!-- Jvectormap -->
	    <script src="library/inspinia/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
	    <script src="library/inspinia/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

	    <!-- Sparkline -->
	    <script src="library/inspinia/js/plugins/sparkline/jquery.sparkline.min.js"></script>

	    <!-- Sparkline demo data  -->
	    <script src="library/inspinia/js/demo/sparkline-demo.js"></script>
	    <!-- ChartJS-->
		<script src="library/inspinia/js/plugins/chartJs/Chart.min.js"></script>
		<!-- blueimp gallery -->
    	<script src="library/inspinia/js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>

    	<!-- Morris -->
	    <script src="library/inspinia/js/plugins/morris/raphael-2.1.0.min.js"></script>
	    <script src="library/inspinia/js/plugins/morris/morris.js"></script>

		<!-- Calendar -->
		<script src="library/inspinia/js/plugins/fullcalendar/fullcalendar.min.js"></script>

		</script>
    	
    	<!-- iCheck -->
    	<script src="library/inspinia/js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>


        <script>
			//espera 0.5s para tirar o alert.
			<?php if(($_GET['acao']=='novo_planilha_vlr')&&($_SESSION['amauc_userPermissao'] == 0)){ ?>
				window.setTimeout(function() {
					$(".alert").fadeTo(500, 0).slideUp(500, function(){
						$(this).remove(); 
					});
				}, 5000);
			<?php }else{ ?>	
				window.setTimeout(function() {
					$(".alert").fadeTo(500, 0).slideUp(500, function(){
						$(this).remove(); 
					});
				}, 1500);
			<?php } ?>	
			
			function topo(){
				$('html, body').animate({
					scrollTop: $("#vemaqui").offset().top
				}, 5000);
			}
			
			window.onscroll = function() {
				if(window.scrollY > 100) {
					$('#selo').show();
				} else {
					// esconder botão...
					$('#selo').hide();
				}
			}
			function float_only_exc(e){
				// allowed: numeric keys, numeric numpad keys, backspace, del and delete keys, ponto e virgula
				if (e.keyCode == 37  || 
					e.keyCode == 38  || 
					e.keyCode == 39  || 
					e.keyCode == 40  || 
					e.keyCode == 46  || 
					e.keyCode == 8   || 
					e.keyCode == 9   || 
					e.keyCode == 188 || 
					e.keyCode == 110 || 
					e.keyCode == 190 ||
					e.keyCode == 194 ||
					// Allow: Ctrl+A
		            (e.keyCode == 65 && e.ctrlKey === true) ||
		            // Allow: Ctrl+C
		            (e.keyCode == 67 && e.ctrlKey === true) ||
		            // Allow: Ctrl+X
		            (e.keyCode == 88 && e.ctrlKey === true) ||
		            // Allow: home, end, left, right
		            (e.keyCode >= 35 && e.keyCode <= 39) ||					  
					(e.keyCode < 106 && e.keyCode > 95 ) ) { 
					return true;
				}else{
					return false;
				}
			}
			
			function integer_only_exc(e){
				// allowed: numeric keys, numeric numpad keys, backspace, del and delete keys, ponto e virgula
				if (e.keyCode == 37 || 
					e.keyCode == 38 || 
					e.keyCode == 39 || 
					e.keyCode == 40 || 
					e.keyCode == 46 || 
					e.keyCode == 8  || 
					e.keyCode == 9  || 
					// Allow: Ctrl+A
		            (e.keyCode == 65 && e.ctrlKey === true) ||
		             // Allow: Ctrl+C
		            (e.keyCode == 67 && e.ctrlKey === true) ||
		             // Allow: Ctrl+X
		            (e.keyCode == 88 && e.ctrlKey === true) ||
		             // Allow: home, end, left, right
		            (e.keyCode >= 35 && e.keyCode <= 39) ||
					
					(e.keyCode < 106 && e.keyCode > 95)){ 
					return true;
				}else{
					return false;
				}
			}	
			$(document).ready(function(){	  
				$("input.float_only").keydown(function(event) { 
					if ( float_only_exc(event) ) { 
					}else{ 
						if ((event.keyCode < 48 || event.keyCode > 57)) { 
							event.preventDefault();  
						}        
					} 	
				});

				$("input.integer_only").keydown(function(event) { 
					if ( integer_only_exc(event) ) { 
					}else{ 
						if ((event.keyCode < 48 || event.keyCode > 57)) { 
							event.preventDefault();  
						}        
					} 	
				});  

				$("#selo").hide();

				$('input.blockenter').keypress(function (e) {
		            var code = null;
		            code = (e.keyCode ? e.keyCode : e.which);                
		            return (code == 13) ? false : true;
					
		        });
			});				  
		</script>
        
       	<?php 
			include('library/mobile_device_detect.php');
			require_once 'application/incs/header.inc.php'; 
			$tela = 0 //Tela de do sistema
		?>
	</head>
    
	<body>
	   	<div id="wrapper">
    	    <?php 
            	require_once 'application/incs/menu.inc.php';
            	require_once 'application/incs/top.inc.php';
            	require_once 'application/'.$_GET['module'].'/controller/'.$_GET['module'].'_controller.php';
            ?>
        </div>
        <div class="footer">
            <div class="pull-right">
                <a href="http://www.raisweb.com.br/" target="_blank" title="Desenvolvido por RAISWeb"><img src="application/images/logo_raisweb.svg" style="height:30px;"/></a>
            </div>
            <div>
                <img src="application/images/favicon.png" style="height:30px;" /> &copy; 2023-<?php echo date('Y');?>
            </div>
        </div>
	</body>
</html>
