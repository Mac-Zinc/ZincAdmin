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
        <link href="<?php echo asset('assets/global/plugins/jquery-timepicker/jquery.timepicker.css');?>" rel="stylesheet" type="text/css"></link>
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
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="{{ $res['Site_favicon'] }}" /> 
        <style type="text/css">
            .accessLevelRoleSelectDiv, .accessLevelModuleSelectDiv, .accessLevelSectionSelectDiv,.accessLevelSectionFields,.accessLevelUserTypeSelectDiv,.accessLevelUsersSelectDiv{
                width :40%;
            }
            .accessLevelFieldsDiv > span > div.mt-checkbox-list .mt-checkbox {
                display: inline;
            }
            .accessLevelFieldsDiv {
                width: 95%;
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
        <script src="<?php echo asset('assets/global/plugins/jquery-timepicker/jquery.timepicker.min.js');?>" type="text/javascript"></script>

        
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
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo asset('assets/layouts/layout2/scripts/layout.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo asset('assets/layouts/layout2/scripts/demo.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo asset('assets/layouts/global/scripts/quick-sidebar.min.js');?>" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
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
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                  <!--   //load page content-->
					@include('layouts.editable_table')
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
			<!-- //quick right sidebar-->
			@include('layouts.Quick_right_sidebar')
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
          <!--  //footer-->
		   @include('layouts.Footer')
        </div>
        <!-- END FOOTER -->
    <script>

        var dataToSend;
        $('.menueClickHijack').click( function( event ){
            event.preventDefault();
            href = $(this).attr("href");
            $.get( href, function( data ) {
                $( ".page-content" ).html( data );
                //alert( "Load was performed." );
            });
            return false;
        });

        $('.page-content').on('click','.menueClickHijack',function(e){ 
            event.preventDefault();
            href = $(this).attr("href");
            $.get( href, function( data ) {
                $( ".page-content" ).html( data );                
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
        });

        $('.page-content').on('change','#accessLevelRoleSelect' , function(){
            //console.log('yes');            
            href = '/AccessLevel/'+$('#accessLevelRoleSelect').val();
            if($('#accessLevelRoleSelect').val() != ''){
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
            //console.log('yes');           
            value = $('#accessLevelSectionSelect').val(); 
            href = '/AccessLevelSectionBlock';
            if( value != ''){
                $.post( href, {blk_id : value, _token : $('.csrf_token').val()},function( data ) {
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
                href = '/AccessLevelFormSave';
                data =  {   _token : $('.csrf_token').val(), 
                            values : giantobj,
                            type : $('#accessLevelType').val(),
                            typeValue : $('#accessLevelRoleSelect').val(),
                            area : $('#accessLevelModuleSelect').val(),
                            section : $('#accessLevelSectionSelect').val(),
                        }
                $.post( href, data ,function( data ) {
                    //$( ".accessLevelSectionFields" ).html( data );    
                    console.log('Yes');            
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
        //console.log($(this).parents('span.columnML'));
        array = ['MLWhite', 'MLGreen', 'MLOrange', 'MLRed'];
        value = $(this).val();
        triggeredEle = $(this);  
        $( "#dialog-confirm" ).dialog({
          resizable: false,
          dialogClass: "no-close",
          closeOnEscape: false,
          height:140,
          modal: true,
          buttons: {
            Yes: function() {                    
                $( this ).dialog( "close" );
                triggeredEle.parents('span.columnML').find('span.MLColourCode').removeClass('MLGreen MLRed MLOrange').addClass(array[value]);
                triggeredEle.parent('span').find('button.buttonMLQuickView').html(triggeredEle.find('option:selected').text());
                triggeredEle.data('previous',triggeredEle.find('option:selected').val());
            },
            No: function() {
                triggeredEle.val(triggeredEle.data('previous'));
                $( this ).dialog( "close" );
            }
          }
        });    
    
    });           

    $('.page-content').on('click','.MLMoreData',function(){
        var $elie = $(this), degree = $elie.data('rotate'), timer;
        //
        $('.MLMoreDataOpen').removeClass('MLMoreDataOpen').click();
       rotate();
       function rotate() {
        if($elie.data('rotate') == 0){
          $elie.css({ WebkitTransform: 'rotate(' + degree + 'deg)'});  
          $elie.css({ '-moz-transform': 'rotate(' + degree + 'deg)'});
          timer = setTimeout(function() {
              ++degree; 
              if(degree == 90){
                $elie.data('rotate',90);
                $elie.addClass('MLMoreDataOpen');
                $elie.parents('div.rowML').next('div.MLQuickEdit').addClass('MLQuickEditOpen').slideDown();               
              }else{
                rotate();
              } 
          },3);
        }else{
            $elie.css({ WebkitTransform: 'rotate(' + degree + 'deg)'});  
          $elie.css({ '-moz-transform': 'rotate(' + degree + 'deg)'});
          timer = setTimeout(function() {
              --degree; 
              if(degree == 0){
                $elie.data('rotate',0);
                $elie.removeClass('MLMoreDataOpen');
                $elie.parents('div.rowML').next('div.MLQuickEdit').removeClass('MLQuickEditOpen').slideUp();
              }else{
                rotate();
              }
          },3);
        }
        
    }
    });  

    $('.page-content').on('click','span.weekNav >span > a',function(e){ 
        e.preventDefault();
        href = $(this).attr("href");
        $.get( href, function( data ) {
            $( ".page-content" ).html( data );            
        });
        return false;
    });
        

    </script>  
    </body>

</html>