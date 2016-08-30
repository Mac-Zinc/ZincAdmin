<?php $dropDownOptions = $moduleFields->{$sec}->{ "dropDownOptions_".$fieldId }; 
if(isset($moduleFields->{$sec}->{ "displayValue_".$fieldId })){
	$value = $moduleFields->{$sec}->{ "displayValue_".$fieldId }; 
}else{ $value = 0; }
$Checked = ( $value == 1 ) ? 'Checked="Checked"' : '';
$chkBoxOffTxt = $dropDownOptions[0]->text;
$chkBoxOnTxt = $dropDownOptions[1]->text;
?>

<div class="form-group">
	<input type="checkbox" {{$Checked}} data-test-val = '{{$value}}' data-off-text="&nbsp;{{$chkBoxOffTxt}}&nbsp;" data-on-text="&nbsp;{{$chkBoxOnTxt}}&nbsp;"  class="form-control make-switch {{$fields->tbl_fld_class}}" name="{{$fields->tbl_fld_tbl_col_name}}" id="{{$fields->tbl_fld_tbl_col_name}}">
</div>

<script type="text/javascript">
	jQuery(document).ready(function() { 
		$('#{{$fields->tbl_fld_tbl_col_name}}').bootstrapSwitch({
			size : 'mini',			
		});
	});
</script>
