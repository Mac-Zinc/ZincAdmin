<?php 
$checked = '';
if(isset($moduleFields->{$sec}->{ "displayValue_".$fieldId })){
	$value = $moduleFields->{$sec}->{ "displayValue_".$fieldId }; 
	if($value == 1 ){
		$checked = 'checked="checked"';
	}
}

?>
@if(isset($moduleFields->{$sec}->{"is_edit_".$fieldId}))
<div class="form-control1">
<input type="checkbox" {{$checked}} name="{{$fields->tbl_fld_tbl_col_name}}" id="{{$fields->tbl_fld_tbl_col_name}}" class=" {{$fields->tbl_fld_class}}" value='1'> {{$fields->advance_function}}
</div>
@elseif(isset($moduleFields->{$sec}->{"is_read_".$fieldId}))
<label class='readonlyType'>{{$fields->advance_function}}</label>
@endif