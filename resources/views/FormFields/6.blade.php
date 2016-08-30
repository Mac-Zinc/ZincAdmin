<?php 
if(isset($moduleFields->{$sec}->{ "displayValue_".$fieldId })){
	$value = $moduleFields->{$sec}->{ "displayValue_".$fieldId }; 
	if($value == 1 ){

	}
}

?>
<div class="form-control">
<input type="checkbox" name="{{$fields->tbl_fld_tbl_col_name}}" id="{{$fields->tbl_fld_tbl_col_name}}" class=" {{$fields->tbl_fld_class}}" value='1'> {{$fields->advance_function}}
</div>