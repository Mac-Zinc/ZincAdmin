<?php $fileInclude = $moduleFields->fileInclude; //var_dump($fileInclude) ?>
@include("layouts.script_file_include")
<style type="text/css">
	#tab_6 .lblTxtHidden {
	    display: none;
	}
</style>
@include("layouts.breadcrums")
<div class='crm_form_container'>
	<div id="crm_form_wiz" class="portlet light ">
	<form method="POST" id="crm_form" action="#" class="form-horizontal1" novalidate="novalidate" enctype="multipart/form-data">
		<input type="hidden" name="module" class="modLinkModifier" value='CRM'>
		<div class="form-wizard">
            <div class="form-body">
				<div class='container1'>
					<div class='row'>
						<div class= 'col-md-2 '>  
							<div class='driverQuickInfoContainer leftSideContainer'>								
								<?php $tabNo = 1; ?>
								<?php $sec = $sections[$tabNo]; $fieldId = 188; ?>
				        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
				        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>				        		
			        			
                                <!--<label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>-->
                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                <!--<span class="help-block"> This is inline help </span>-->                                
				        		
				        		@endif					
								<div><label class="leftSideDriverName bold color-green">Driver Name</label></div>
								<div><label class="leftSideLpNumber">LP Number</label></div>
								<div><label class="leftSideLocation">Location</label></div>
								<div><label class="leftSideTel">Tel</label></div>
								<div><label class="leftSideNotice">Notice</label></div>
							</div>
						</div>
						<div class= 'col-md-10 rightSideContainer'>
						<div class='container-fluid'>
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
							        		<div class=' col-md-2'>
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
							        		<div class='col-md-3'>
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
       						           		<?php $sec = $sections[$tabNo]; $fieldId = 171; ?>
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
							           		<?php $sec = $sections[$tabNo]; $fieldId = 91; ?>
							        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
							        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header lblTxtHidden">{{$fields->tbl_fld_col_disp_name}}</label>
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
			                                                <label class="control-label tab-header lblTxtHidden">{{$fields->tbl_fld_col_disp_name}}</label>
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
			                                                <label class="control-label tab-header lblTxtHidden">{{$fields->tbl_fld_col_disp_name}}</label>
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
							        	<div class="row">
    				        				<?php $sec = $sections[$tabNo]; $fieldId = 57; ?>
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
							        	<h5 class='bold hidden'>Adjustment</h5>

        					        	<div class="row">
        					        		<?php $sec = $sections[$tabNo]; $fieldId = 174; $gridFields = array(172,173,67,68,69,70,71,72,73); $gridUrl = array('gridfieldid'=> 174); ?>
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
							        		<div class='col-md-2'>
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
							        		<div class='col-md-2'>
							        			<div class="form-group">
			                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
			                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
			                                                <!--<span class="help-block"> This is inline help </span>-->
			                                     </div>
							        		</div>
							        		@endif							        		
							        		<?php $sec = $sections[$tabNo]; $fieldId = 187; ?>
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
        					        	<div class="row">
        					        		<?php $sec = $sections[$tabNo]; $fieldId = 175; ?>
        					        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
        					        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
        					        		<div class='col-md-2'>
        					        			<div class="form-group">
        	                                                <label class="control-label tab-header lblTxtHidden">{{$fields->tbl_fld_col_disp_name}}</label>
        	                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
        	                                                <!--<span class="help-block"> This is inline help </span>-->
        	                                     </div>
        					        		</div>
        					        		@endif
        					        		<?php $sec = $sections[$tabNo]; $fieldId = 176; ?>
        					        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
        					        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
        					        		<div class='col-md-2'>
        					        			<div class="form-group">
        	                                                <label class="control-label tab-header lblTxtHidden">{{$fields->tbl_fld_col_disp_name}}</label>
        	                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
        	                                                <!--<span class="help-block"> This is inline help </span>-->
        	                                     </div>
        					        		</div>
        					        		@endif
        					        	</div>
        					        	<div class="row">
        					        		<?php $sec = $sections[$tabNo]; $fieldId = 177; ?>
        					        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
        					        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
        					        		<div class='col-md-2'>
        					        			<div class="form-group">
        	                                                <label class="control-label tab-header lblTxtHidden">{{$fields->tbl_fld_col_disp_name}}</label>
        	                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
        	                                                <!--<span class="help-block"> This is inline help </span>-->
        	                                     </div>
        					        		</div>
        					        		@endif
        					        		<?php $sec = $sections[$tabNo]; $fieldId = 178; ?>
        					        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
        					        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
        					        		<div class='col-md-2'>
        					        			<div class="form-group">
        	                                                <label class="control-label tab-header lblTxtHidden">{{$fields->tbl_fld_col_disp_name}}</label>
        	                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
        	                                                <!--<span class="help-block"> This is inline help </span>-->
        	                                     </div>
        					        		</div>
        					        		@endif
        					        	</div>
        					        	<div class="row">
        					        		<?php $sec = $sections[$tabNo]; $fieldId = 179; ?>
        					        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
        					        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
        					        		<div class='col-md-2'>
        					        			<div class="form-group">
        	                                                <label class="control-label tab-header lblTxtHidden">{{$fields->tbl_fld_col_disp_name}}</label>
        	                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
        	                                                <!--<span class="help-block"> This is inline help </span>-->
        	                                     </div>
        					        		</div>
        					        		@endif
        					        		<?php $sec = $sections[$tabNo]; $fieldId = 180; ?>
        					        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
        					        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
        					        		<div class='col-md-2'>
        					        			<div class="form-group">
        	                                                <label class="control-label tab-header lblTxtHidden">{{$fields->tbl_fld_col_disp_name}}</label>
        	                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
        	                                                <!--<span class="help-block"> This is inline help </span>-->
        	                                     </div>
        					        		</div>
        					        		@endif
        					        	</div>
        					        	<div class="row">
        					        		<?php $sec = $sections[$tabNo]; $fieldId = 181; ?>
        					        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
        					        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
        					        		<div class='col-md-2'>
        					        			<div class="form-group">
        	                                                <label class="control-label tab-header lblTxtHidden">{{$fields->tbl_fld_col_disp_name}}</label>
        	                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
        	                                                <!--<span class="help-block"> This is inline help </span>-->
        	                                     </div>
        					        		</div>
        					        		@endif
        					        		<?php $sec = $sections[$tabNo]; $fieldId = 182; ?>
        					        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
        					        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
        					        		<div class='col-md-2'>
        					        			<div class="form-group">
        	                                                <label class="control-label tab-header lblTxtHidden">{{$fields->tbl_fld_col_disp_name}}</label>
        	                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
        	                                                <!--<span class="help-block"> This is inline help </span>-->
        	                                     </div>
        					        		</div>
        					        		@endif
        					        	</div>
        					        	<div class="row">
        					        		<?php $sec = $sections[$tabNo]; $fieldId = 183; ?>
        					        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
        					        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
        					        		<div class='col-md-2'>
        					        			<div class="form-group">
        	                                                <label class="control-label tab-header lblTxtHidden">{{$fields->tbl_fld_col_disp_name}}</label>
        	                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
        	                                                <!--<span class="help-block"> This is inline help </span>-->
        	                                     </div>
        					        		</div>
        					        		@endif
        					        		<?php $sec = $sections[$tabNo]; $fieldId = 184; ?>
        					        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
        					        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
        					        		<div class='col-md-2'>
        					        			<div class="form-group">
        	                                                <label class="control-label tab-header lblTxtHidden">{{$fields->tbl_fld_col_disp_name}}</label>
        	                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
        	                                                <!--<span class="help-block"> This is inline help </span>-->
        	                                     </div>
        					        		</div>
        					        		@endif
        					        	</div><div class="row">
        					        		<?php $sec = $sections[$tabNo]; $fieldId = 185; ?>
        					        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
        					        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
        					        		<div class='col-md-2'>
        					        			<div class="form-group">
        	                                                <label class="control-label tab-header lblTxtHidden">{{$fields->tbl_fld_col_disp_name}}</label>
        	                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
        	                                                <!--<span class="help-block"> This is inline help </span>-->
        	                                     </div>
        					        		</div>
        					        		@endif
        					        		<?php $sec = $sections[$tabNo]; $fieldId = 186; ?>
        					        		@if(isset($moduleFields->{$sec}->{ "field_".$fieldId }))
        					        		<?php $fields = $moduleFields->{$sec}->{ "field_".$fieldId } ;?>
        					        		<div class='col-md-2'>
        					        			<div class="form-group">
        	                                                <label class="control-label tab-header lblTxtHidden">{{$fields->tbl_fld_col_disp_name}}</label>
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
						</div></div>
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

	    $('.preffered_shift_patterns').click(function(){ preffered_shift_patterns_options(); });
	    $('#firstname_usr,#lastname_usr,#lp_number,#mobile_usr').on('keyup',function(){ leftSideInfoDisplay(); });

	    $('#dob_usr').parent().datepicker().on('show', function(e) { $('#dob_usr').parent().datepicker('setEndDate', '-17y'); });
	    $('#employee_status').on("select2:select", function (e) { empStatusDateHide(); }); 
	    $('#reason_for_leaving').on("select2:select", function (e) { reasonLeavingNotes(); });        
	    
	    $("#preffered_region").on("change", function () {
	    	getDeposFromRegion(3,$("#preffered_region").val(),2,'#preffered_depo');	    	
	    });   
	    $('#employment_end_date,#employment_start_date').parent().datepicker().on('hide', function(e) {
	        calculateLengthOfService();
	    }); 
	    	
	    preffered_shift_patterns_options();
	    leftSideInfoDisplay();
		empStatusDateHide();   
		reasonLeavingNotes();
		calculateLengthOfService();
		getDeposFromRegion(3,$("#preffered_region").val(),2,'#preffered_depo');
	});

	function getDeposFromRegion( org_lvl, id, rtnOrg_lvl, selector ){
		href = '/Ajax/Organisation/' + org_lvl+'/' + id +'/' + rtnOrg_lvl ;
		$.getJSON( href, data ,function( data ) {
            var relatedOptions = [];
            $.each( data, function( index, value ){
                var option = new Option(value,index );
                relatedOptions.push(option);
            });
			$( selector + " option[value]").remove();	          
			$( selector ).append(relatedOptions).val("").trigger("change");
        });
	}

	function preffered_shift_patterns_options(){
	$('.preffered_shift_patterns').each( function (){ 
			if ( $(this).is(":checked") ){
				$(this).closest('div.row').find('div:nth-child(2) .input-group').show();
			}else{
				$(this).closest('div.row').find('div:nth-child(2) .input-group').hide();
			}
			
		}); 
	}

	function leftSideInfoDisplay(){
		var name = $('#firstname_usr').val() +  ' ' + $('#lastname_usr').val();
		$('.leftSideDriverName').html(name);
		var lp_number = $('#lp_number').val();
		$('.leftSideLpNumber').html(lp_number);
		var location = '';
		$('.leftSideLocation').html(location);
		var mobile_usr = $('#mobile_usr').val();
		$('.leftSideTel').html(mobile_usr);
		var note = 'Please ensure that we have the correct mobile phone number at all times';
		$('.leftSideNotice').html(note);
	}

	function empStatusDateHide(){		

		//$('#employment_start_date').parents('.form-group').hide();
		$('#employment_end_date').parents('.form-group').hide();
		$('#probation_end_period').parents('.form-group').hide();
		$('#termination_date').parents('.form-group').hide();
		var empStatusVal = parseInt($('#employee_status').val());

		switch(empStatusVal) {
		    case 1:
		        $('#probation_end_period').parents('.form-group').show();
		        break;
		    case 2:
		        $('#probation_end_period').parents('.form-group').show();
		        break;
		    case 3:
		    	$('#probation_end_period').parents('.form-group').show();
		    	$('#employment_end_date').parents('.form-group').show();
		        break;
		    case 4:
		    	$('#probation_end_period').parents('.form-group').show();
		    	$('#employment_end_date').parents('.form-group').show();
		    	break;
		    case 5:  
		    	$('#probation_end_period').parents('.form-group').show();
		    	$('#termination_date').parents('.form-group').show();
		    	break;  
		}
	}

	function reasonLeavingNotes(){
		$('#leaving_notes').parents('.form-group').hide();
		var reasonLeaving = parseInt($('#reason_for_leaving').val());
		if ( reasonLeaving >= 1 ){
			$('#leaving_notes').parents('.form-group').show();
		}
	}

	function calculateLengthOfService(){
		var endDate = null; var years = ''; var months = ''; var days = ''; var andMonths = ''; var andDays = '';
		var empStatusVal = parseInt($('#employee_status').val());
		var startDate = moment($('#employment_start_date').val(), "YYYY-MM-DD");
		if ( empStatusVal == 3 || empStatusVal == 4  ) {
			endDate = moment($('#employment_end_date').val(), "YYYY-MM-DD");
		}else{
			endDate = moment(); //$('#employment_end_date').val(), "YYYY-MM-DD"
		}
		var diffDuration = moment.duration(endDate.diff(startDate));
		
		if (diffDuration.years() > 0 ) { 
			years = diffDuration.years() + ' Year'; 
			if ( diffDuration.years() > 1 ) { years += 's '; } else { years += ' '; }
		}
		if (diffDuration.months() > 0 ) { 
			months = diffDuration.months() + ' Month'; 
			if ( diffDuration.months() > 1 ) { months += 's '; } else { months += ' '; }
			if (years != '') { andMonths = ' And '; } 
		}
		if (diffDuration.days() > 0 ) { 
			days = diffDuration.days() + ' Day'; 
			if ( diffDuration.days() > 1 ) { days += 's '; } else { days += ' '; }
			if (months != '') { andDays = ' And '; andMonths = ''; }			 
		}
		$('#length_of_service').val(years + andMonths + months + andDays + days);
	}
</script>


