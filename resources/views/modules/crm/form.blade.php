<?php $fileInclude = $moduleFields->fileInclude; //var_dump($fileInclude) ?>
@include("layouts.script_file_include")

@include("layouts.breadcrums")
<div class='crm_form_container'>
	<div id="crm_form_wiz" class="portlet light ">
	<form method="POST" id="crm_form" action="#" class="form-horizontal1" novalidate="novalidate">
		<input type="hidden" name="module" class="modLinkModifier" value='CRM'>
		<div class="form-wizard">
            <div class="form-body">
				<div class='container1'>
					<div class='row'>
						<div class= 'col-md-2 '>  
							<div class='driverQuickInfoContainer leftSideContainer'>								
								<div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail driverImgDisplay img-circle" data-trigger="fileinput" style=""> 
                                    	<img src="images/profile/1.jpg">
                                    </div>
                                    <div>
                                        <span class="btn red btn-outline btn-file">
                                            <span class="fileinput-new"> Select image </span>
                                            <span class="fileinput-exists"> Change </span>
                                            <input name="..." type="file"> 
                                        </span>
                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                    </div>
                                </div>					
								<div><label class="driverName bold color-green">Driver Name</label></div>
								<div><label>LP Number</label></div>
								<div><label>Location</label></div>
								<div><label>Tel</label></div>
								<div><label>Notice</label></div>
							</div>
						</div>
						<div class= 'col-md-10 rightSideContainer'>
							<div class="tabbable-line ">
							    <ul class="nav nav-tabs ">
							    	<?php $count = 1; $active = 'active'; ?>
			                        @foreach ($sections as $key=>$tabName)
							        <li class="{{$active}}">
							            <a href="#tab_{{$count}}" data-toggle="tab"> {{$tabName}} </a>
							        </li>
							        <?php $count++; $active=''; ?>
							        @endforeach
							    </ul>
							    <div class="tab-content">	
							    	<div class="alert alert-danger display-none">
			                            <button data-dismiss="alert" class="close"></button> You have some form errors. Please check below. 
			                        </div>
			                        <div class="alert alert-success display-none">
			                            <button data-dismiss="alert" class="close"></button> Your form validation is successful! 
			                        </div>			    	
			                       
							        <div class="tab-pane active" id="tab_1">
							           <?php $tabNo = 1; ?>
							           <div class="row hidden">
			                            	<?php $sec = $sections[$tabNo]; $fieldId = 8; ?>
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
							           		<?php $sec = $sections[$tabNo]; $fieldId = 80; ?>
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

							        		<?php $sec = $sections[$tabNo]; $fieldId = 10; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-4'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif

							        		<?php $sec = $sections[$tabNo]; $fieldId = 81; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-4'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif

							        		<?php $sec = $sections[$tabNo]; $fieldId = 82; ?>
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
							           <hr>
							           <div class="row">
							           		<?php $sec = $sections[$tabNo]; $fieldId = 9; ?>
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
							        		<?php $sec = $sections[$tabNo]; $fieldId = 83; ?>
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
							           <hr>
							           <div class="row">
							           		<?php $sec = $sections[$tabNo]; $fieldId = 84; ?>
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
							        		<?php $sec = $sections[$tabNo]; $fieldId = 85; ?>
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
							           <hr>
							           <div class="row">
							           		<?php $sec = $sections[$tabNo]; $fieldId = 94; ?>
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
							        		<?php $sec = $sections[$tabNo]; $fieldId = 97; ?>
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
							           		<?php $sec = $sections[$tabNo]; $fieldId = 95; ?>
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
							        		<?php $sec = $sections[$tabNo]; $fieldId = 98; ?>
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
							           		<?php $sec = $sections[$tabNo]; $fieldId = 96; ?>
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
							        		<?php $sec = $sections[$tabNo]; $fieldId = 99; ?>
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
							           <hr>
							           <div class="row">
							           		<?php $sec = $sections[$tabNo]; $fieldId = 86; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		<?php $sec = $sections[$tabNo]; $fieldId = 87; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		<?php $sec = $sections[$tabNo]; $fieldId = 88; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		<?php $sec = $sections[$tabNo]; $fieldId = 89; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		<?php $sec = $sections[$tabNo]; $fieldId = 90; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							           </div>
							           <h5 class="bold">Additional Information</h5>
							           <div class="row">
							           		<?php $sec = $sections[$tabNo]; $fieldId = 91; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		<?php $sec = $sections[$tabNo]; $fieldId = 92; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		<?php $sec = $sections[$tabNo]; $fieldId = 93; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
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
							        	<?php $tabNo = 2; ?>
        					        	<div class="row">
        					        		<?php $sec = $sections[$tabNo]; $fieldId = 158; $gridFields = array(159,160,11,43,12,42); $gridUrl = array('gridfieldid'=> 158); ?>
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
							        <div class="tab-pane" id="tab_3">
							        	<?php $tabNo = 3; ?>
							        	<div class='row'>
							        		<?php $sec = $sections[$tabNo]; $fieldId = 44; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-8'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		<?php $sec = $sections[$tabNo]; $fieldId = 45; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		<?php $sec = $sections[$tabNo]; $fieldId = 46; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        	</div>
							        	<div class='row'>
							        		<?php $sec = $sections[$tabNo]; $fieldId = 47; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-8'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		<?php $sec = $sections[$tabNo]; $fieldId = 48; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		<?php $sec = $sections[$tabNo]; $fieldId = 49; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        	</div>
							        	<hr>
							        	<h5 class='bold'>Service Information</h5>
							        	<div class='row'>
							        		<?php $sec = $sections[$tabNo]; $fieldId = 50; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-8'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		<?php $sec = $sections[$tabNo]; $fieldId = 51; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-4'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		
							        	</div>
							        	<div class='row'>
							        		<?php $sec = $sections[$tabNo]; $fieldId = 53; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-8'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		<?php $sec = $sections[$tabNo]; $fieldId = 54; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		<?php $sec = $sections[$tabNo]; $fieldId = 55; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        	</div>
							        	<hr>
							        	<h5 class='bold'>Contractual Information</h5>
							        	<div class='row'>
							        		<?php $sec = $sections[$tabNo]; $fieldId = 52; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-8'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		<?php $sec = $sections[$tabNo]; $fieldId = 56; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-4'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        	</div>
							        	<hr>
							        	<h5 class='bold'>Driver Classification</h5>				        	
					        			<div class="row">
					        				<?php $sec = $sections[$tabNo]; $fieldId = 57; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		<?php $sec = $sections[$tabNo]; $fieldId = 58; ?>
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
							        		<?php $sec = $sections[$tabNo]; $fieldId = 59; ?>
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
					        				<?php $sec = $sections[$tabNo]; $fieldId = 60; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		<?php $sec = $sections[$tabNo]; $fieldId = 61; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		<?php $sec = $sections[$tabNo]; $fieldId = 62; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-4'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
					        			</div>
						        		<hr>
						        		<div class="row">
					        				<?php $sec = $sections[$tabNo]; $fieldId = 63; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		<?php $sec = $sections[$tabNo]; $fieldId = 64; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		<?php $sec = $sections[$tabNo]; $fieldId = 65; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-4'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		<?php $sec = $sections[$tabNo]; $fieldId = 66; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-4'>
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
							        	<?php $tabNo = 4; ?>
							        	<h5 class='bold'>Adjustment</h5>
							        	<div class='row'>
							        		<?php $sec = $sections[$tabNo]; $fieldId = 67; ?>
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
							        		<div class="row"><div class="col-md-6">
								        		<?php $sec = $sections[$tabNo]; $fieldId = 68; ?>
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
								        	</div></div>
							        	</div>

							        	<div class='row'>
							        		<?php $sec = $sections[$tabNo]; $fieldId = 69; ?>
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
							        		<div class="row"> <div class="col-md-6">
								        		<?php $sec = $sections[$tabNo]; $fieldId = 70; ?>
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

								        		<?php $sec = $sections[$tabNo]; $fieldId = 71; ?>
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

								        		<?php $sec = $sections[$tabNo]; $fieldId = 72; ?>
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

								        		<?php $sec = $sections[$tabNo]; $fieldId = 73; ?>
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
							        		</div></div>
							        	</div>
							        	<h5 class='bold'>Payment Information</h5>
							        	<div class="row">
							        		<?php $sec = $sections[$tabNo]; $fieldId = 74; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		<?php $sec = $sections[$tabNo]; $fieldId = 75; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		<?php $sec = $sections[$tabNo]; $fieldId = 76; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		<div class='row'><div class="col-md-6">
								        		<?php $sec = $sections[$tabNo]; $fieldId = 77; ?>
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
								        		<?php $sec = $sections[$tabNo]; $fieldId = 78; ?>
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
								        		<?php $sec = $sections[$tabNo]; $fieldId = 79; ?>
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
								        	</div></div>
							        	</div>
							        	<hr>
							        </div>
							        <div class="tab-pane" id="tab_5">
							        	<?php $tabNo = 7; //$fields->tbl_fld_fld_type_id?>
							        	@include("FormFields.25")
							        </div>
							        <div class="tab-pane" id="tab_6">
							        	<?php $tabNo = 8; ?>
							        	<div class="row">
							        		<?php $sec = $sections[$tabNo]; $fieldId = 105; $gridFields = array(156,115,116,117,118); $gridUrl = array('gridfieldid'=> 105); ?>
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
							        	<div class="row">
							        		<?php $sec = $sections[$tabNo]; $fieldId = 106; $gridFields = array(155,111,112,113,114); $gridUrl = array('gridfieldid'=> 106); ?>
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
							        	<div class="row">
							        		<?php $sec = $sections[$tabNo]; $fieldId = 107; ?>
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
							        		<?php $sec = $sections[$tabNo]; $fieldId = 108; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		<?php $sec = $sections[$tabNo]; $fieldId = 109; ?>
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
							        		<?php $sec = $sections[$tabNo]; $fieldId = 110; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        	</div>
							        </div>
							        <div class="tab-pane" id="tab_7">
							        	<?php $tabNo = 9; ?>
							        	<h5 class="bold">User Controls</h5>
							        	<div class="row">
							        		<?php $sec = $sections[$tabNo]; $fieldId = 100; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		<?php $sec = $sections[$tabNo]; $fieldId = 101; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		<?php $sec = $sections[$tabNo]; $fieldId = 102; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        	</div>
							        	<h5 class="bold">Change Password</h5>
							        	<div class="row">
							        		<?php $sec = $sections[$tabNo]; $fieldId = 103; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif
							        		<?php $sec = $sections[$tabNo]; $fieldId = 104; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
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
					</div>
					@include("layouts.form_page_action_controls")
				</div>
			</div>
		</div>	
	</form>
	</div>
</div>
<script type="text/javascript"> NewFormWizard.init('crm_form','Save/CRM'); </script>
<script type="text/javascript">
	$('input.readonly').attr('readonly', 'readonly');

	jQuery(document).ready(function() {
	    if ($('.primaryKey').val() == ''){
	        $('.dataTables_wrapper').hide();
	        $('.file_upload_container').addClass('hidden');;
	        $('.hidden-msg').removeClass('hidden');
	    }
	});
</script>