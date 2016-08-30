<?php 
if(isset($moduleFields->{$sec}->{ "displayValue_".$fieldId })){
	$value = $moduleFields->{$sec}->{ "displayValue_".$fieldId }; 
}else{ $value = ''; }

?>
<div class="input-group">
    <span class="input-group-addon">
        <i class="fa fa-envelope"></i>
    </span>
    <input type="text" class="form-control {{$fields->tbl_fld_class}}" placeholder="{{$fields->tbl_fld_place_holder}}" name="{{$fields->tbl_fld_tbl_col_name}}" id="{{$fields->tbl_fld_tbl_col_name}}" value='{{$value}}'> 
</div>