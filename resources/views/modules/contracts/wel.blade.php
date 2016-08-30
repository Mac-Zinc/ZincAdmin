<?php $fileInclude = $moduleFields->fileInclude; //var_dump($fileInclude) ?>
@include("layouts.script_file_include")
<style>
    .tab-header{font-weight: bold;}
    .row{margin: unset !important;}
    .select2-container--bootstrap .select2-search--dropdown .select2-search__field, .select2-container--bootstrap .select2-selection, 
    .select2-container--bootstrap.select2-container--focus .select2-selection, .select2-container--bootstrap.select2-container--open .select2-selection {    
    border: 1px solid black;
    border-radius: 10px; 
    }
    .select2-selection--multiple .select2-selection__choice {
    background-color: #e4e4e4;
    border: 1px solid #aaa;
    border-radius: 4px;
    cursor: default;
    float: left;
    margin-right: 5px;
    margin-top: 5px;
    padding: 0 5px;
    }
    .select2-selection--multiple .select2-selection__rendered li {
    list-style: outside none none;
    }
    .select2-results__option[aria-selected="true"] {
    background-color: #ddd;
    }
    .customFormActionNav {
    margin-left: unset !important;
    }
    .ui-timepicker-wrapper {
    width: 9em !important;    
    }
</style>
@include("layouts.breadcrums")
<div id="contracts_form_wiz" class="portlet light ">
    <!--<div class="portlet-title">
        <div class="caption">
            <i class=" icon-layers font-red"></i>
            <span class="caption-subject font-red bold uppercase"> Form Wizard -
                <span class="step-title"> Step 1 of 4 </span>
            </span>
        </div>
        <div class="actions">
            <a href="javascript:;" class="btn btn-circle btn-icon-only btn-default">
                <i class="icon-cloud-upload"></i>
            </a>
            <a href="javascript:;" class="btn btn-circle btn-icon-only btn-default">
                <i class="icon-wrench"></i>
            </a>
            <a href="javascript:;" class="btn btn-circle btn-icon-only btn-default">
                <i class="icon-trash"></i>
            </a>
        </div>
    </div>-->
    <div class="portlet-body form">
        <form method="POST" id="contracts_form" action="#" class="form-horizontal1" novalidate="novalidate">
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
                            <?php $tabNo = 5; ?>
                            <div class="row hidden">
                                <?php $sec = $sections[$tabNo]; $fieldId = 150; ?>
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
                                <?php $sec = $sections[$tabNo]; $fieldId = 13; ?>
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
                                <?php $sec = $sections[$tabNo]; $fieldId = 14; ?>
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
                                <h5 class="control-label tab-header">Timesheet Subbmissions</h5>
                                <?php $sec = $sections[$tabNo]; $fieldId = 21; ?>
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
                                <?php $sec = $sections[$tabNo]; $fieldId = 23; ?>
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
                                <?php $sec = $sections[$tabNo]; $fieldId = 22; ?>
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
                                <?php $sec = $sections[$tabNo]; $fieldId = 157; ?>
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
                                <?php $sec = $sections[$tabNo]; $fieldId = 15; ?>
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
                                <?php $sec = $sections[$tabNo]; $fieldId = 16; ?>
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
                                <?php $sec = $sections[$tabNo]; $fieldId = 20;; ?>
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
                                <?php $sec = $sections[$tabNo]; $fieldId = 17; ?>
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
                                <?php $sec = $sections[$tabNo]; $fieldId = 18; ?>
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
                                <?php $sec = $sections[$tabNo]; $fieldId = 19; ?>
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
                        <div class="tab-pane" id="tab_2">
                            <?php $tabNo = 6; ?> 
                            <div class="row">
                                <?php $sec = $sections[$tabNo]; $fieldId = 41; ?>
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
                                <?php $sec = $sections[$tabNo]; $fieldId = 152; ?>
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
                            <h5 class="bold">Self Bill Upload</h5>
                            <div class="row">
                                <?php $sec = $sections[$tabNo]; $fieldId = 24; ?>
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
                                <?php $sec = $sections[$tabNo]; $fieldId = 25; ?>
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
                                <?php $sec = $sections[$tabNo]; $fieldId = 26; ?>
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
                            <h5 class="bold">Missing Information</h5>
                            <div class="row">
                                <?php $sec = $sections[$tabNo]; $fieldId = 27; ?>
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
                                <?php $sec = $sections[$tabNo]; $fieldId = 28; ?>
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
                                <?php $sec = $sections[$tabNo]; $fieldId = 29; ?>
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
                            <h5 class="bold">Purchase Order</h5>
                            <div class="row">
                                <?php $sec = $sections[$tabNo]; $fieldId = 30; ?>
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
                                <?php $sec = $sections[$tabNo]; $fieldId = 31; ?>
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
                                <?php $sec = $sections[$tabNo]; $fieldId = 32; ?>
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
                        <div class="tab-pane" id="tab_3">
                            <?php $tabNo = 12; ?>
                            <div class="row">
                                <?php $sec = $sections[$tabNo]; $fieldId = 33; ?>
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
                                <?php $sec = $sections[$tabNo]; $fieldId = 34; ?>
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
                                <?php $sec = $sections[$tabNo]; $fieldId = 35; ?>
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
                                <?php $sec = $sections[$tabNo]; $fieldId = 37; ?>
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
                                <?php $sec = $sections[$tabNo]; $fieldId = 38; ?>
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
                                <?php $sec = $sections[$tabNo]; $fieldId = 39; ?>
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
                                <?php $sec = $sections[$tabNo]; $fieldId = 40; ?>
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
                                <?php $sec = $sections[$tabNo]; $fieldId = 151; ?>
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
                                <?php $sec = $sections[$tabNo]; $fieldId = 153; ?>
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
                @include("layouts.form_page_action_controls")
            </div>
        </form>
    </div>
</div>
<script type="text/javascript"> NewFormWizard.init('contracts_form','Save/Contract'); </script>