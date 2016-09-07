<?php $dropDownOptions = $moduleFields->{$sec}->{ "dropDownOptions_".$fieldId }; 
if(isset($moduleFields->{$sec}->{ "displayValue_".$fieldId })){
	$dropDownOptionsSaved = $moduleFields->{$sec}->{ "displayValue_".$fieldId }; 
}else{ $dropDownOptionsSaved = null; }
$selected = 'selected="selected"';
$newColNameVal = explode(':',$fields->tbl_fld_tbl_col_name);
//var_dump($dropDownOptionsSaved);
?>
@if(isset($moduleFields->{$sec}->{"is_edit_".$fieldId}))
<select class="form-control select2-multiple select2-hidden-accessible {{$fields->tbl_fld_class}}" name="{{$newColNameVal[0]}}[]" id="{{$newColNameVal[0]}}" multiple="multiple">
@if($dropDownOptionsSaved)
@foreach($dropDownOptionsSaved as $key => $keyValue)
<option value='{{$keyValue->value}}' {{$selected}}> {{$keyValue->text}} </option>
@endforeach	
@endif
</select>


<script type="text/javascript">
$.fn.select2.defaults.set("theme", "bootstrap");
TagField_{{$fields->tbl_fld_id}} =  {
	data : [
			@foreach($dropDownOptions as $key => $keyValue)
				{ id: {{$keyValue->value}}, text: '{{$keyValue->text}}' }, 
			@endforeach
			],
	bind : function () {	       
		$("#{{$newColNameVal[0]}}").select2({
		//$(".tag-field1").select2({	
		  data: this.data,
		  tags: true,
		  placeholder: '{{$fields->tbl_fld_place_holder}}',
          width: null
		});
		$('.select2-container').removeAttr('style');	
        
    },
    init : function(){        
        TagField_{{$fields->tbl_fld_id}}.bind();       
    }
};


//jQuery(document).ready(function() {    
    TagField_{{$fields->tbl_fld_id}}.init(); 
//});

</script>
@elseif(isset($moduleFields->{$sec}->{"is_read_".$fieldId}))
<label class='readonlyType'>{{$value}}</label>
@endif