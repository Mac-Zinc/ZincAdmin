<?php $fileInclude = $moduleFields->fileInclude; //var_dump($fileInclude) ?>
@include("layouts.script_file_include")
<style type="text/css">
	.lblTxtHidden {
 	   color: white;
	}
</style>
@include("layouts.breadcrums")
<div id="organisation_form_wiz" class="portlet light ">
<div class="portlet-body form">
        <form method="POST" id="organisation_form" action="#" class="form-horizontal1" novalidate="novalidate">
            <div class="form-wizard">
                <div class="form-body">
                    <ul class="nav nav-pills nav-justified steps">
                        <?php $count = 1; ?>
                        @foreach ($sections as $key=>$tabName)
                        <li >
                            <a class="step" data-toggle="tab" href='#tab_{{ trim($count,"'") }}' aria-expanded="true">
                                <span class="number"> {{$count}} </span> <?php $count++; ?>
                                <span class="desc">
                                    <i class="fa fa-check"></i> {{$tabName}} </span>
                            </a>
                        </li>
                        @endforeach
                        
                    </ul>
                    <div role="progressbar" class="progress progress-striped" id="bar">
                        <div class="progress-bar progress-bar-success" style=""> </div>
                    </div>
                    <div class="tab-content">
                        <div class="alert alert-danger display-none">
                            <button data-dismiss="alert" class="close"></button> You have some form errors. Please check below. 
                        </div>
                        <div class="alert alert-success display-none">
                            <button data-dismiss="alert" class="close"></button> Your form validation is successful! 
                        </div>
                        
                        <div class="tab-pane" id="tab_1">
                            <?php $tabNo = 13; ?>
                            <div class="row hidden">
                            	<?php $sec = $sections[$tabNo]; $fieldId = 149; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-6'>
				        			<div class="form-group">
                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
                            </div>
                            <div class="row">                            	
                            	<?php $sec = $sections[$tabNo]; $fieldId = 119; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-6'>
				        			<div class="form-group">
                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
				        		<?php $sec = $sections[$tabNo]; $fieldId = 120; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-6'>
				        			<div class="form-group">
                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
                            </div>
                            <div class="row">
                            	<?php $sec = $sections[$tabNo]; $fieldId = 121; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-3'>
				        			<div class="form-group">
                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
				        		<?php $sec = $sections[$tabNo]; $fieldId = 124; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-3'>
				        			<div class="form-group">
                                                <label class="control-label tab-header lblTxtHidden">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
				        		<?php $sec = $sections[$tabNo]; $fieldId = 127; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-3'>
				        			<div class="form-group">
                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
				        		<?php $sec = $sections[$tabNo]; $fieldId = 128; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-3'>
				        			<div class="form-group">
                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
                            </div>
                            <div class="row">
                            	<?php $sec = $sections[$tabNo]; $fieldId = 122; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-3'>
				        			<div class="form-group">
                                                <label class="control-label tab-header lblTxtHidden">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
				        		<?php $sec = $sections[$tabNo]; $fieldId = 125; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-3'>
				        			<div class="form-group">
                                                <label class="control-label tab-header lblTxtHidden">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
				        		<?php $sec = $sections[$tabNo]; $fieldId = 161; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-2'>
				        			<div class="form-group">
                                                <label class="control-label tab-header ">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
				        		<?php $sec = $sections[$tabNo]; $fieldId = 129; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-2'>
				        			<div class="form-group">
                                                <label class="control-label tab-header ">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
				        		<?php $sec = $sections[$tabNo]; $fieldId = 130; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-2'>
				        			<div class="form-group">
                                                <label class="control-label tab-header ">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
                            </div>
                            <div class="row">
                            	<?php $sec = $sections[$tabNo]; $fieldId = 126; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-3'>
				        			<div class="form-group">
                                                <label class="control-label tab-header lblTxtHidden">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif

                            </div>
                            <div class="row">
                            	<?php $sec = $sections[$tabNo]; $fieldId = 131; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-3'>
				        			<div class="form-group">
                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
				        		<?php $sec = $sections[$tabNo]; $fieldId = 132; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-3'>
				        			<div class="form-group">
                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
				        		<?php $sec = $sections[$tabNo]; $fieldId = 133; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-3'>
				        			<div class="form-group">
                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
                            </div>
                            <div class="row">
                            	<?php $sec = $sections[$tabNo]; $fieldId = 134; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-6'>
				        			<div class="form-group">
                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
				        		<?php $sec = $sections[$tabNo]; $fieldId = 135; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-3'>
				        			<div class="form-group">
                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
				        		<?php $sec = $sections[$tabNo]; $fieldId = 136; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-1'>
				        			<div class="form-group">
                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
				        		<?php $sec = $sections[$tabNo]; $fieldId = 137; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-1'>
				        			<div class="form-group">
                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_2">
                            <?php $tabNo = 14; ?>
                            <div class="row">
                            	<?php $sec = $sections[$tabNo]; $fieldId = 138; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-6'>
				        			<div class="form-group">
                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
				        		<?php $sec = $sections[$tabNo]; $fieldId = 139; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-6'>
				        			<div class="form-group">
                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
                            </div>
                            <div class="row">
                            	<?php $sec = $sections[$tabNo]; $fieldId = 140; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-6'>
				        			<div class="form-group">
                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
				        		<?php $sec = $sections[$tabNo]; $fieldId = 141; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-6'>
				        			<div class="form-group">
                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
                            </div>
                        </div> 
                        <div class="tab-pane" id="tab_3">
                            <?php $tabNo = 15; ?>
                            <div class="row">
                            	<?php $sec = $sections[$tabNo]; $fieldId = 142; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-3'>
				        			<div class="form-group">
                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
				        		<?php $sec = $sections[$tabNo]; $fieldId = 143; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-3'>
				        			<div class="form-group">
                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
				        		<?php $sec = $sections[$tabNo]; $fieldId = 144; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-3'>
				        			<div class="form-group">
                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
                            </div>
                            <div class="row">
				        		<?php $sec = $sections[$tabNo]; $fieldId = 162; $gridFields = array(165,166,167,168,163,164); $gridUrl = array('gridfieldid'=> 162); ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-12'>
				        			<div class="form-group">
                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
                            </div>
                        </div> 
                        <div class="tab-pane" id="tab_4">
                            <?php $tabNo = 16; ?>
                            <div class="row">
                            	<?php $sec = $sections[$tabNo]; $fieldId = 145; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-3'>
				        			<div class="form-group">
                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
				        		<?php $sec = $sections[$tabNo]; $fieldId = 146; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-3'>
				        			<div class="form-group">
                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
				        		<?php $sec = $sections[$tabNo]; $fieldId = 147; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-3'>
				        			<div class="form-group">
                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
				        		<?php $sec = $sections[$tabNo]; $fieldId = 148; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
				        		<div class='col-md-3'>
				        			<div class="form-group">
                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                     </div>
				        		</div>
				        		@endif
                            </div>
                        </div> 
                    </div>     
                        
                </div>
            </div>
            @include("layouts.form_page_action_controls")    
            </div>
        </form>
    </div>
</div> 
<?php 
$fRules = array();
$fRules[$fieldId] = array();
$thisFieldRules = array('minlength' => 5, 'required' => true);
$fRules[$fieldId] = $thisFieldRules; 

$frmRules = '{ name: { minlength: 5, required: true } }';
$frmMsg = '{ name: { required: "Please Enter a Name for the Contract", minlength: "mininum 5 char" } }' ;   // custom messages for radio buttons and checkboxes
?>
<script type="text/javascript"> NewFormWizard.init('organisation_form','Save/Organisation', <?php echo $frmRules; ?> , <?php echo $frmMsg; ?> ); </script>

<script type="text/javascript">
	$('.nav-pills li:nth-child(n+2)').addClass('hidden');
	$('.nav-pills li:nth-child(n+2) .step').removeAttr('data-toggle'); 
	$('.nav-pills li:nth-child(n+2) .number').html(' 2 ');
	value =  parseInt($('#org_lvl').val()) + 1 ;
	if( value > 1 ){
		$('.nav-pills li:nth-child('+ value +')').removeClass('hidden');
		$('.nav-pills li:nth-child('+ value +') .step').attr('data-toggle', 'tab');
	}
	
	//$('.page-content').on('change','#org_lvl',function(){
	$('#org_lvl').on('change',function(){	
		value = parseInt($(this).val()) + 1;
		$('.nav-pills li:nth-child(n+2)').addClass('hidden');
		$('.nav-pills li:nth-child(n+2) .step').removeAttr('data-toggle');
		$('.nav-pills li:nth-child('+ value +')').removeClass('hidden');
		$('.nav-pills li:nth-child('+ value +') .step').attr('data-toggle', 'tab');
	});
</script>