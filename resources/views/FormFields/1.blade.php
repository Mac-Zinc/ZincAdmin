<?php 
if(isset($moduleFields->{$sec}->{ "displayValue_".$fieldId })){
	$value = $moduleFields->{$sec}->{ "displayValue_".$fieldId }; 
}else{ $value = ''; }

?>
<input type="text" placeholder="{{$fields->tbl_fld_place_holder}}" name="{{$fields->tbl_fld_tbl_col_name}}" id="{{$fields->tbl_fld_tbl_col_name}}" class="form-control {{$fields->tbl_fld_class}}" value='{{$value}}'
@if($fields->tbl_fld_max_length != null)
maxlength = '{{$fields->tbl_fld_max_length}}'
@endif
>