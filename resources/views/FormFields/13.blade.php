<?php 
if(isset($moduleFields->{$sec}->{ "displayValue_".$fieldId })){
    $value = $moduleFields->{$sec}->{ "displayValue_".$fieldId }; 
}else{ $value = ''; }

?>
@if(isset($moduleFields->{$sec}->{"is_edit_".$fieldId}))
<div class="input-group date date-picker {{$fields->tbl_fld_class}}" >
    <input type="text" class="form-control" readonly="" name="{{$fields->tbl_fld_tbl_col_name}}" id="{{$fields->tbl_fld_tbl_col_name}}" placeholder="{{$fields->tbl_fld_place_holder}}" value='{{$value}}' data-date-format='yyyy-mm-dd'/>
    <span class="input-group-btn">
        <button class="btn default" type="button">
            <i class="fa fa-calendar"></i>
        </button>
    </span>
</div>



<script type="text/javascript">
var ComponentsDateTimePickers_{{$fields->tbl_fld_id}} = function () {
	var handleDatePickers = function () {

        if (jQuery().datepicker) {
            $('.input-group.date').datepicker({
                rtl: App.isRTL(),
                orientation: "auto",
                format: "yyyy-mm-dd",
                autoclose: true                
            });
            //$('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }

        /* Workaround to restrict daterange past date select: http://stackoverflow.com/questions/11933173/how-to-restrict-the-selectable-date-ranges-in-bootstrap-datepicker */
    
        // Workaround to fix datepicker position on window scroll
        $( document ).scroll(function(){
            $('#form_modal2 .date-picker').datepicker('place'); //#modal is the id of the modal
        });
    }
    return {
        //main function to initiate the module
        init: function () {
            handleDatePickers();            
        }
    };
}();

if (App.isAngularJsApp() === false) { 
    jQuery(document).ready(function() {    
        ComponentsDateTimePickers_{{$fields->tbl_fld_id}}.init(); 
    });
}
</script>
@elseif(isset($moduleFields->{$sec}->{"is_read_".$fieldId}))
<label class='readonlyType'>{{$value}}</label>
@endif