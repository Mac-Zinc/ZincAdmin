<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>{{ $res['Site_name'] }}</title><!--dynamic-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES 
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />-->
        <link href="<?php echo asset('assets/global/plugins/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo asset('assets/global/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo asset('assets/global/plugins/select2/css/select2.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo asset('assets/global/plugins/jquery-ui/jquery-ui.min.css');?>" rel="stylesheet" type="text/css"></link>        
        <link href="<?php echo asset('assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.css');?>" rel="stylesheet" type="text/css"></link>
        
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo asset('assets/global/css/components-rounded.min.css');?>" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo asset('assets/global/css/plugins.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo asset('assets/layouts/layout2/css/layout.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo asset('assets/layouts/layout2/css/themes/blue.min.css');?>" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo asset('assets/layouts/layout2/css/custom.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css');?>" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="{{ $res['Site_favicon'] }}" /> 
        <style type="text/css">
            .screen_loader{
                width: 100%;
                z-index: 99999999;
                height: 100%;
                position: fixed;
                display: none;
            }

            .screen_loader_canvas{
                position: absolute; 
                width: 100%; 
                height: 100%; 
                background-color: #ffffff; 
                opacity: 0.8;
            }
            .screen_loader img{
                display: block; 
                position: absolute; 
                left: calc(50% - 50px); 
                top: calc(50% - 50px);
            }

            #header_notification_bar, #header_inbox_bar, #header_task_bar {
                display: none;
            }
            .site_logo{
                height: 43px;
                margin-left: 0 !important;
                 margin-top: 11px !important;
            }
            .page-header.navbar .page-logo {
                background: #E1E1E1 none repeat scroll 0 0 !important;
            }
            .page-header.navbar .page-top {
                background: #E1E1E1 none repeat scroll 0 0;
            }
            .page-sidebar, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover {
                background-color: #f6f6f6;
            }
            .page-sidebar .page-sidebar-menu > li.open > a, .page-sidebar .page-sidebar-menu > li:hover > a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu > li.open > a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu > li:hover > a {
                background: #019934 none repeat scroll 0 0;
                color: #e4e9f2;
            }
            .page-container-bg-solid .page-content{
                background: #ffffff none repeat scroll 0 0 !important;
            }
            .page-bar {
                background-color: #eeeeee !important;
            }
            .page-sidebar .page-sidebar-menu > li > a span.title{
                color: #000 !important;
            }
            .page-footer {
                background-color: #f6f6f6;
            }
            .page-footer .page-footer-inner {
                color: #a1b2cf;
                text-align: center !important;
                width: 100%;
            }
            .page-content-wrapper{
                background-color: #f6f6f6 !important;
            }
            body{
                background-color: #f6f6f6 !important;
            }
            .page-sidebar .page-sidebar-menu > li.active.open > a, .page-sidebar .page-sidebar-menu > li.active > a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu > li.active.open > a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu > li.active > a {
                background: #019934 none repeat scroll 0 0;
                color: #fff;
            }
            .page-sidebar .page-sidebar-menu > li.active.open > a:hover, .page-sidebar .page-sidebar-menu > li.active > a:hover, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu > li.active.open > a:hover, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu > li.active > a:hover {
                background: #019934 none repeat scroll 0 0;
            }
            .accessLevelRoleSelectDiv, .accessLevelModuleSelectDiv, .accessLevelSectionSelectDiv,.accessLevelSectionFields,.accessLevelUserTypeSelectDiv,.accessLevelUsersSelectDiv{
               /* width :40%; */
            }
            .accessLevelFieldsDiv > span > div.mt-checkbox-list .mt-checkbox {
                display: inline;
            }
            .accessLevelFieldsDiv {
               /* width: 95%; */
                clear: both;
            }
            span.fieldName {
                width: 150px;
                display: inline-block;
            }
            .fixwidth{
                width: 153px;
            }
            .errLog{
                color: #ff0202;
                margin-left: 30px;
            }
            table.dataTable thead .sorting::after {
                content: "" !important;
                opacity: 0.2;
            }
            table.dataTable thead .sorting_asc::after {
                content: "" !important;
            }
            table.dataTable thead .sorting_desc::after {
                content: "" !important;
            }
            .select2-selection__choice, .select2-container .select2-search--inline {
                float: left;
                list-style: outside none none !important;
            }
            .select2-container {
                border-radius: 15px;
                border-style: solid;
                border-width: 1px;
                display: block;
            }
            .dataTables_filter {
               display: none;
            }
            .filterBarSub {
                display: inline-block;
                margin-left: 50px;
            }
            .fixInline-blockAndWidth{
                display: inline-block !important;
                width: 69% !important;
            }
            .fixPadding{
                padding: 6px 5px; !important;
            }
            .portlet>.portlet-title>.caption {
                margin-right: 20px;
            }                   
            span.weekNav {
                float: right;
            }
            div.weekTitleBar {
                background-color: #d3d3d3;
                padding: 5px 10px;
                font-weight: bold;
            }
            .tabML {
                background: whitesmoke;
                margin-top: 10px;
            }
            label.control-label.tab-header {
                font-weight: bold;
            }
            span.weekNavPrevious {
                margin-right: 25px;
            }
            span.weekNavNext {
                margin-left: 25px;
            }
            span.weekNav>span>a {
                color: black !important;
                font-weight: 500;
            }
            span.weekNav>span>a:hover {
                color: blue !important;
                text-decoration: none;
            }
            div#timesheet_table_wrapper .progress-bar {
                color: #000 !important;
            }
            .form-control.expenses.ui-spinner-input {
                width: 60px;
            }        
            .driverImgDisplay {
                background-size: contain;
                height: 150px;
                margin: 15px auto;
                width: 150px;
            }
            .driverQuickInfoContainer {     
                display: inline-block;
                height: 400px;
                text-align: center;
                width: 100%;
            }
            .rightSideContainer,.leftSideContainer{
                background-color: #eeeeee;
            }
        </style>
        </head><!--dynamic-->
    <!-- END HEAD -->
  <!--[if lt IE 9]>
<script src="<?php echo asset('assets/global/plugins/respond.min.js');?>" type="text/javascript"></script>
<script src="<?php echo asset('assets/global/plugins/excanvas.min.js');?>" type="text/javascript"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo asset('assets/global/plugins/jquery.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo asset('assets/global/plugins/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo asset('assets/global/plugins/js.cookie.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo asset('assets/global/plugins/jquery.blockui.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo asset('assets/global/plugins/select2/js/select2.full.min.js');?>" type="text/javascript"></script>

        <script src="<?php echo asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js');?>" type="text/javascript"></script>

        <script src="<?php echo asset('assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo asset('assets/global/plugins/jquery-ui/jquery-ui.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo asset('assets/global/plugins/moment.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo asset('assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo asset('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo asset('assets/global/plugins/clockface/js/clockface.js');?>" type="text/javascript"></script>
        <script src="<?php echo asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js');?>" type="text/javascript"></script>

        

        
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo asset('assets/global/scripts/app.min.js');?>" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo asset('assets/pages/scripts/form-samples.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo asset('assets/pages/scripts/form-wizard.js');?>" type="text/javascript"></script>
        <script src="<?php echo asset('assets/modules/contracts/form-wizard.js');?>" type="text/javascript"></script>

        <script src="<?php echo asset('assets/pages/scripts/components-date-time-pickers.min.js');?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo asset('assets/layouts/layout2/scripts/layout.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo asset('assets/layouts/layout2/scripts/demo.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo asset('assets/layouts/global/scripts/quick-sidebar.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo asset('assets/global/scripts/globalize.js');?>" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        <!-- DUMP Files-->
        <link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
         <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        
        <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyB-A5fcY-h4I27Edt_2QloPCGJaB_D7R5U"></script>

        <link href="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>

        <!-- List Page -->
               <!-- BEGIN PAGE LEVEL PLUGINS -->
                <link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
                <link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
                <!-- END PAGE LEVEL PLUGINS -->
                 <!-- BEGIN PAGE LEVEL PLUGINS -->
                <script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
                <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
                <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
                <!-- END PAGE LEVEL PLUGINS -->
                <script src="../assets/pages/scripts/table-datatables-buttons.js" type="text/javascript"></script>
                <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
                <script src="../assets/pages/scripts/components-bootstrap-switch.min.js" type="text/javascript"></script>
                
                <script src="<?php echo asset('assets/modules/contracts/table-datatable-buttons-customs.js');?>" type="text/javascript"></script>

        <!-- DUMP Files-->
        <meta name="_token" content="{{ csrf_token() }}" class='csrf_token'>
        <script type="text/javascript">
            $.ajaxPrefilter(function(options, originalOptions, xhr) { // this will run before each request
                var token = $('meta[name="_token"]').attr('content'); // or _token, whichever you are using

                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token); // adds directly to the XmlHttpRequest Object
                }
            });
        </script>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
        <!-- BEGIN HEADER
		//load header -->
		 @extends('layouts.header')
		
		
       <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- END SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <!-- END SIDEBAR MENU 
					//load sidebar menu-->
					 @include('layouts.sidebar_compact')
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- This is screen loader display this when you are running ajax.-->
                <div class="screen_loader">
                    <div class="screen_loader_canvas"></div>
                    <img alt="loader" src="images/default/loading.gif" />
                </div>

                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                  <!--   //load page content-->
					<?php //@include('layouts.editable_table') ?>

                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
			<!-- //quick right sidebar-->
			@include('layouts.quick_right_sidebar')
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
          <!--  //footer-->
		   @include('layouts.footer')
        </div>
        <!-- END FOOTER -->
    <script>

        function display_screen_loader(){
            $('.screen_loader').show();
        }
        
        function hide_screen_loader(){
            if($.active == 0){}
                $('.screen_loader').hide();
            
        }
        
        var delay = (function(){
          var timer = 0;
          return function(callback, ms){
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
          };
        })();
        
        var dataToSend;
        $('.menueClickHijack').click( function( event ){
            event.preventDefault();
            $('.page-sidebar-menu > li').removeClass('active open');
            $('.page-sidebar-menu > li > a > span.arrow').removeClass('open');
            $('.page-sidebar-menu > li > a > span.sele').removeClass('selected');
            $(this).find('span.arrow').addClass('open');
            $(this).find('span.sele').addClass('selected');
            $(this).parent().addClass('active open');
            href = $(this).attr("href");
            display_screen_loader();
            $.get( href, function( data ) {
                $( ".page-content" ).html( data );
                hide_screen_loader();
                //alert( "Load was performed." );
            });
            return false;
        });

        $('.page-content').on('click','.menueClickHijack',function(event){ 
            event.preventDefault();
            display_screen_loader();
            href = $(this).attr("href");
            $.get( href, function( data ) {
                $( ".page-content" ).html( data ); 
                hide_screen_loader();               
            });
            return false;
        });

        $('.page-content').on('click','.apType',function(){            
            if($(this).val() == 1){
                $('.accessLevelRoleSelectDiv').removeClass('hidden');
                $('.accessLevelUserTypeSelectDiv,.accessLevelUsersSelectDiv').addClass('hidden');
            }else if($(this).val() == 2){
                $('.accessLevelUserTypeSelectDiv').removeClass('hidden');
                $('.accessLevelUsersSelectDiv,.accessLevelRoleSelectDiv').addClass('hidden');
            }else if($(this).val() == 3){
                $('.accessLevelUsersSelectDiv').removeClass('hidden');
                $('.accessLevelRoleSelectDiv,.accessLevelUserTypeSelectDiv').addClass('hidden');
            }
            $('.accessLevelSettingContainer').html('');
        });

        $('.page-content').on('change','#accessLevelRoleSelect' , function(){                        
            href = '/AccessLevel/'+$('#accessLevelRoleSelect').val();
            if($('#accessLevelRoleSelect').val() != ''){
                $.get( href, function( data ) {
                    $( ".accessLevelSettingContainer" ).html( data );                
                }); 
            }else{
                $( ".accessLevelSettingContainer" ).html( '' ); 
            }
           
        });

        $('.page-content').on('change','#accessLevelUserTypeSelect' , function(){                        
            href = '/AccessLevel/'+$('#accessLevelUserTypeSelect').val();
            if($('#accessLevelUserTypeSelect').val() != ''){
                $.get( href, function( data ) {
                    $( ".accessLevelSettingContainer" ).html( data );                
                }); 
            }else{
                $( ".accessLevelSettingContainer" ).html( '' ); 
            }
           
        });

        $('.page-content').on('change','#accessLevelUserSelect' , function(){                        
            href = '/AccessLevel/'+$('#accessLevelUserSelect').val();
            if($('#accessLevelUserSelect').val() != ''){
                $.get( href, function( data ) {
                    $( ".accessLevelSettingContainer" ).html( data );                
                }); 
            }else{
                $( ".accessLevelSettingContainer" ).html( '' ); 
            }
           
        });

        $('.page-content').on('change','#accessLevelModuleSelect' , function(){
            //console.log('yes');           
            value = $('#accessLevelModuleSelect').val(); 
            href = '/AccessLevelSection';
            if( value != ''){
                $.post( href, {m_id : value, _token : $('.csrf_token').val()},function( data ) {
                    $( ".accessLevelSection" ).html( data );                
                }); 
            }else{
                $( ".accessLevelSection" ).html( '' ); 
            }
           
        });

        $('.page-content').on('change','#accessLevelSectionSelect' , function(){
            if($('.apType:checked').val() == 1){
                typeValue = $('#accessLevelRoleSelect').val();
            }else if($('.apType:checked').val() == 2){
                typeValue = $('#accessLevelUserTypeSelect').val();
            }else if($('.apType:checked').val() == 3){
                typeValue = $('#accessLevelUserSelect').val();
            } 
            data = {
                blk_id : $('#accessLevelSectionSelect').val(),
                _token : $('.csrf_token').val(),
                accessType : $('.apType:checked').val(),
                typeValue : typeValue
            }
            href = '/AccessLevelSectionBlock';
            if( value != ''){
                $.post( href, data ,function( data ) {
                    $( ".accessLevelSectionFields" ).html( data );                
                }); 
            }else{
                $( ".accessLevelSectionFields" ).html( '' ); 
            }           
        });

        $('.page-content').on('click','.readAll',function(){
            if($('.readAll:checked').length){
                $('.read').prop( "checked", true );
            }else{
                $('.read').prop( "checked", false );
            }            
        });

        $('.page-content').on('click','.writeAll',function(){
            if($('.writeAll:checked').length){
                $('.write').prop( "checked", true );
            }else{
                $('.write').prop( "checked", false );
            }            
        });

        $('.page-content').on('click','.deleteAll',function(){
            if($('.deleteAll:checked').length){
                $('.delete').prop( "checked", true );
            }else{
                $('.delete').prop( "checked", false );
            }            
        });

        $('.page-content').on('click','.noAccessAll',function(){
            if($('.noAccessAll:checked').length){
                $('.noAccess').prop( "checked", true );
            }else{
                $('.noAccess').prop( "checked", false );
            }            
        });

        $('.page-content').on('click','.addAll',function(){
            if($('.addAll:checked').length){
                $('.add').prop( "checked", true );
            }else{
                $('.add').prop( "checked", false );
            }            
        });

        $('.page-content').on('submit','.accessLevelForm',function( e ){
       
            e.preventDefault();
            if (permissionsCheck() == true ){                
                href = '/Save/AccessLevelFormSave';
                if($('.apType:checked').val() == 1){
                    typeValue = $('#accessLevelRoleSelect').val();
                }else if($('.apType:checked').val() == 2){
                    typeValue = $('#accessLevelUserTypeSelect').val();
                }else if($('.apType:checked').val() == 3){
                    typeValue = $('#accessLevelUserSelect').val();
                }
                data =  {   _token : $('.csrf_token').val(), 
                            values : giantobj,
                            accessType : $('.apType:checked').val(),
                            typeValue : typeValue,
                            area : $('#accessLevelModuleSelect').val(),
                            section : $('#accessLevelSectionSelect').val(),
                        }
                $.post( href, data ,function( response ) {
                    //$( ".accessLevelSectionFields" ).html( data ); console.log('Yes');   
                    
                    if(response.status == 1){
                        $('.msgDisplayArea').html('<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Save Complete!</strong></div>');                
                
                    }else{  
                        $('.msgDisplayArea').html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Save Failed!</strong></div>');
                    } 
                    $(".alert").alert();
                    $(".alert").fadeTo(2000, 500).slideUp(500, function(){
                        $(".alert").alert('close');
                    });            
                });
            }

        });

        var giantobj = {}

        function permissionsCheck(){
            giantobj = {};
            var returnFlag = true;
            $('.mt-checkbox-list').each( function(){
                 // default true
                read = '0'; write = '0'; add = '0'; del ='0'; noAccess = '0';

                if( $(this).find('.read').is(':checked') == true){
                    read = '1';
                }
                if( $(this).find('.write').is(':checked') == true){
                    write = '1';
                }
                if( $(this).find('.add').is(':checked') == true){
                    add = '1';
                }
                if( $(this).find('.delete').is(':checked') == true){
                    del = '1';
                }
                if( $(this).find('.noAccess').is(':checked') == true){
                    noAccess = '1';
                }
                val1 = read + write + add + del + noAccess ;
                //console.log(val1);
                $(this).find('.binaryVal').val(val1);
                giantobj[ $(this).find('.binaryVal').attr("name") ] = $(this).find('.binaryVal').attr("value") ;


                decVal1 = parseInt(val1, 2);

                if( (decVal1%2) == 1 && decVal1 > 1 ){
                    //console.log('Err');
                    $(this).find('.errLog').html('Error');
                    returnFlag = false;
                }else{
                    $(this).find('.errLog').html('');
                }
                
            });  
            return returnFlag;  
        }

        
               
 /*******************************************/

    $('.page-content').on('click','.buttonLiMLQuickView',function(e){
        value = $(this).data('value');
        $(this).parent().next().val(value).trigger('change');
    });

    $('.page-content').on('change','.MLQuickView',function(e){
        
        array = ['MLWhite', 'MLGreen', 'MLOrange', 'MLRed', 'MLYellow', 'MLGrey'];
        value = $(this).val();
        rowid = $(this).data('rowid');
        triggeredEle = $(this);  
        $( "#dialog-confirm" ).dialog({
          resizable: false,
          dialogClass: "no-close",
          closeOnEscape: false,
          height:140,
          modal: true,
          buttons: {
            Yes: function() {  
                href = '/Save/ManningLevels/MLQuickView';                
                data =  {   _token : $('.csrf_token').val(),                            
                            rowid : rowid,
                            value : value,                            
                        }
                $.post( href, data ,function( response ) {                       
                   if(response.status == 1){                        
                        triggeredEle.parents('span.columnML').find('span.MLColourCode').removeClass(array.join(' ')).addClass(array[value]);
                        triggeredEle.parent('span').find('button.buttonMLQuickView > span.ui-button-text').html(triggeredEle.find('option:selected').text());
                        triggeredEle.data('previous',triggeredEle.find('option:selected').val());
                   }else{
                        triggeredEle.val(triggeredEle.data('previous'));
                        
                   }             
                });                  
                $( this ).dialog( "close" );
            },
            No: function() {
                triggeredEle.val(triggeredEle.data('previous'));
                $( this ).dialog( "close" );
            }
          }
        });    
    
    });           

    $('.page-content').on('click','.MLMoreData',function(){
        $elie = $(this);
        $sliderContainer = $elie.parents('div.rowML').next('div.MLQuickEdit'); 
        degree = $elie.data('rotate'); 
        recLoc = 0;
        rowid = $elie.data('rowid');
        
        $elie.removeClass('MLMoreDataOpen');
        $('.MLMoreDataOpen').removeClass('MLMoreDataOpen').click();

        if(degree == 0){
            $elie.data('rotate',90);
            $elie.addClass('MLMoreDataOpen');
            $sliderContainer.addClass('MLQuickEditOpen').slideDown();
            recLoc = 1;
        }else{
            $elie.data('rotate',0); 
            $elie.removeClass('MLMoreDataOpen');
            $sliderContainer.removeClass('MLQuickEditOpen').slideUp();
            recLoc = 0;
        }   
        
        href = '/Save/ManningLevels/MLMoreData';                
                data =  {   _token : $('.csrf_token').val(),                            
                            rowid  : rowid,
                            recLoc : recLoc,                            
                        }
                $.post( href, data ,function( response ) {                       
                   if(response.status == 1){   
                        $sliderContainer.find('.overlay').addClass('hidden');                        
                        $.each(response.data, function(index, value) {
                            
                            $sliderContainer.find('.MLQuickEditRow.dataRow .MLQuickEditRowInput.'+index).val(value);
                        });                        
                   }else{
                        $sliderContainer.find('.overlay').removeClass('hidden');
                        //console.log('0');
                   }             
                });   
        
   
    });  

    $('.page-content').on('click','span.weekNav >span > a',function(e){ 
        e.preventDefault();
        href = $(this).attr("href");
        $.get( href, function( data ) {
            $( ".page-content" ).html( data );            
        });
        return false;
    });
    
    $('.page-content').on('click','.pagination > li > a',function(e){ 
        e.preventDefault();
        href = $(this).attr("href");
        hrefParse = href.split('?');
        newhref = hrefParse[0];
        page = hrefParse[1].replace('page=','');
        data = getPageData( page );

        $.post( newhref, data, function( data ) {
            $( ".listRowsContainer" ).html( data );            
        });
        return false;
    }); 

    $('.page-content').on('change','.recPerPage',function(e){ 
        e.preventDefault();
        //href = $(this).attr("href");
        //hrefParse = href.split('?');
        newhref = 'List/ManningLevels/page/load';
        page = 1;
        data = getPageData( page );

        $.post( newhref, data, function( data ) {
            $( ".listRowsContainer" ).html( data );            
        });
        return false;
    }); 

    $('.page-content').on('keyup','.driverLPFilter',function(e){
        e.preventDefault();
        newhref = 'List/ManningLevels/page/load';
        delay(function(){
             data = getPageData( 1 );
            //data.driverLPFilter = $('.driverLPFilter').val();
            $.post( newhref, data, function( data ) {
                $( ".listRowsContainer" ).html( data );            
            }); 
        }, 1000 );        
        return false;
    });

    $('.page-content').on('keyup','.search_by',function(e){
        e.preventDefault();        
        delay(function(){
            triggerDataTableFilter(); 
            //dataTableControler.submitFilter();
        }, 1000 );        
        return false;
    });

    $('.page-content').on('change','.filterDropDown',function(e){
        e.preventDefault();
        triggerDataTableFilter();
        //dataTableControler.submitFilter();
    });

    function triggerDataTableFilter(){
        if( typeof dataTableControler === 'object' ) {
            if($('.search_by').val().trim().length > 0 ){
                dataTableControler.setAjaxParam('search_by',$('.search_by').val().trim());
            }
            
            $('.filterDropDown').each(function(){
                if($(this).val().trim().length > 0 ){
                    dataTableControler.setAjaxParam($(this).attr("name"),$(this).val().trim());
                }
                
            });
            /*
            $('.extraHiddenParams').each(function(){  
                if($(this).val().trim().length > 0 ){             
                    dataTableControler.setAjaxParam($(this).attr("name"),$(this).val().trim());
                }
            });
            */
            dataTableControler.submitFilter();
        }
    }

 //----------------------------------------   

     
    $('.page-content').on('click','.saveTimeSheets',function(e){ 
        e.preventDefault();
        href = 'Save/TimeSheet';
        data = { _token : $('.csrf_token').val(), };
        for(i=0; i<7; i++){           
            data[i] = $('.form_'+i).serialize();
        }        

        $.post( href, data, function( response ) {
             
            if(response.status == 1){
                $('.msgDisplayArea').html('<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Save Complete!</strong></div>');                
                
            }else{  
                $('.msgDisplayArea').html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Save Failed!</strong></div>');
            } 
            $(".alert").alert();
            $(".alert").fadeTo(2000, 500).slideUp(500, function(){
               $(".alert").alert('close');
            });         
        });
        return false;
    });

    //--------------------------------------------------

    $('.page-content').on('click','.add_new_button',function(e){ 
        e.preventDefault();
        href = $(this).data("url");        
        data = {};
        display_screen_loader();
        $.get( href, data, function( data ) {
            $( ".page-content" ).html( data );
            hide_screen_loader();            
        });
        return false;
    });

    $('.page-sidebar-menu li:first a').click();

    </script>  
    </body>

</html>