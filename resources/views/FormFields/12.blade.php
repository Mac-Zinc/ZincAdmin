<?php 
if(isset($moduleFields->{$sec}->{ "displayValue_".$fieldId })){
	$value = $moduleFields->{$sec}->{ "displayValue_".$fieldId }; 
}else{ $value = ''; }

?>
@if(isset($moduleFields->{$sec}->{"is_edit_".$fieldId}))
<div class="input-group " style="display: inline-flex; width: 68%">
<input type="text" placeholder="{{$fields->tbl_fld_place_holder}}" name="{{$fields->tbl_fld_tbl_col_name}}" id="{{$fields->tbl_fld_tbl_col_name}}" class="form-control timepicker {{$fields->tbl_fld_class}}" value='{{$value}}'><span class="input-group-btn"><button class="btn default" type="button"><i class="fa fa-clock-o"></i></button></span>
</div>
<script type="text/javascript">
	
	var ComponentsDateTimePickers_{{$fields->tbl_fld_id}} = function () {    

	    var handleTimePickers = function () {

	        if (jQuery().timepicker) {
	            $('.timepicker-default').timepicker({
	                autoclose: true,
	                showSeconds: true,
	                minuteStep: 1
	            });

	            $('.timepicker-no-seconds').timepicker({
	                autoclose: true,
	                minuteStep: 5
	            });

	            $('.timepicker-24').timepicker({
	                autoclose: true,
	                minuteStep: 5,
	                showSeconds: false,
	                showMeridian: false
	            });

	            // handle input group button click
	            $('.timepicker').parent('.input-group').on('click', '.input-group-btn', function(e){
	                e.preventDefault();
	                $(this).parent('.input-group').find('.timepicker').timepicker('showWidget');
	            });

	            // Workaround to fix timepicker position on window scroll
	            $( document ).scroll(function(){
	                $('#form_modal4 .timepicker-default, #form_modal4 .timepicker-no-seconds, #form_modal4 .timepicker-24').timepicker('place'); //#modal is the id of the modal
	            });
	        }
	    }
	    
	    return {
	        //main function to initiate the module
	        init: function () {            
	            handleTimePickers();           
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