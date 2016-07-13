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
@include("Layouts.breadcrums")
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
        <form method="POST" id="contracts_form" action="#" class="form-horizontal" novalidate="novalidate">
            <div class="form-wizard">
                <div class="form-body">
                    <ul class="nav nav-pills nav-justified steps">
                        <?php $count = 1; ?>
                        @foreach ($sections as $key=>$tabName)
                        <li >
                            <a class="step" data-toggle="tab" href='#tab{{ trim($count,"'") }}' aria-expanded="true">
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
                            <button data-dismiss="alert" class="close"></button> You have some form errors. Please check below. </div>
                        <div class="alert alert-success display-none">
                            <button data-dismiss="alert" class="close"></button> Your form validation is successful! </div>
                            <?php $count = 1; $active = "active" ?>
                        @foreach ($sections as $key=>$tabName)    
                        <div id='tab{{ trim($count,"'") }}' class="tab-pane {{$active}}">
                            <div>
                                <span class='tab-header'> 
                                    <i class="icon-pencil"></i> 
                                    <span class=""> STEP {{$count}}: </span> <?php $count++; $active='';?>
                                    {{strtoupper($tabName)}}
                                </span>
                            </div>
                            <div>
                                @foreach ($moduleFields->{$tabName} as $fields)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
                                                @include("FormFields.$fields->tbl_fld_fld_type_id")
                                                <!--<span class="help-block"> This is inline help </span>-->
                                            </div>
                                        </div>                                        
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9 customFormActionNav">
                        <!-- -->
                            <a class="btn default button-previous disabled" href="javascript:;" style="display: none;">
                                <i class="fa fa-angle-left"></i> Back </a>
                            <a class="btn btn-outline green button-next" href="javascript:;"> Continue
                                <i class="fa fa-angle-right"></i>
                            </a>
                            <a class="btn green button-submit" href="javascript:;" style="display: none;"> Submit
                                <i class="fa fa-check"></i>
                            </a>
                       
                                
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript"> NewFormWizard.init(); </script>