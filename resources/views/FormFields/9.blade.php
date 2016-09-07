<?php $dropDownOptions = $moduleFields->{$sec}->{ "dropDownOptions_".$fieldId }; 
if(isset($moduleFields->{$sec}->{ "displayValue_".$fieldId })){
	$value = $moduleFields->{$sec}->{ "displayValue_".$fieldId }; 
}else{ $value = ''; }
$selected = 'selected="selected"';
?>
@if(isset($moduleFields->{$sec}->{"is_edit_".$fieldId}))
<select class="form-control {{$fields->tbl_fld_class}}" name="{{$fields->tbl_fld_tbl_col_name}}" id="{{$fields->tbl_fld_tbl_col_name}}" >

	@if($fields->tbl_fld_place_holder != '')
	<!--<option value="">{{$fields->tbl_fld_place_holder}}</option>-->
	@endif
	@foreach($dropDownOptions as $key => $keyValue)

	<option value='{{$keyValue->value}}' @if($keyValue->value == $value) {{$selected}}@endif>{{$keyValue->text}}</option>
	@endforeach
	
</select>
<script type="text/javascript">
//minimumResultsForSearch: Infinity
  $('#{{$fields->tbl_fld_tbl_col_name}}').select2({
  	width: null,
  	placeholder : '{{$fields->tbl_fld_place_holder}}'
  });
</script>
@elseif(isset($moduleFields->{$sec}->{"is_read_".$fieldId}))
@foreach($dropDownOptions as $key => $keyValue)

@if($keyValue->value == $value) 
<label class='readonlyType'>{{$keyValue->text}}</label>
@endif

@endforeach
@endif