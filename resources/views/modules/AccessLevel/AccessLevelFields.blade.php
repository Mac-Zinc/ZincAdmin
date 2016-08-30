@if ($fields)
<div class='row'><div class='col-md-3'><label class="control-label">Fields</label></div></div>

<div class='form-group accessLevelFieldsDiv'>	
	
		@foreach ($fields as $key=>$fieldName)
		<div class="mt-checkbox-list row">
			<div class="col-md-3">
			<span class='fieldName'>{{$fieldName['name']}} : </span> 
			<input type="hidden" value='{{ trim($key,"'") }}' class='fieldId'>
			<input type="hidden" name = '{{ trim($key,"'") }}' value="{{$fieldName['flags']}}" class='binaryVal'>
			</div>
			<div class="col-md-1">
		    <label class="mt-checkbox mt-checkbox-outline"> Read
		        <input type="checkbox" class='read' @if($fieldName['flags'][0] == 1) checked='checked' @endif > 
		        <span></span>
		    </label>
		    </div>
		    <div class="col-md-1">
		    <label class="mt-checkbox mt-checkbox-outline"> Write
		        <input type="checkbox" class='write' @if($fieldName['flags'][1] == 1) checked='checked' @endif >
		        <span></span>
		    </label>
		    </div>
		    <div class="col-md-1">
		    <label class="mt-checkbox mt-checkbox-outline"> Add
		        <input type="checkbox" class='add' @if($fieldName['flags'][2] == 1) checked='checked' @endif >
		        <span></span>
		    </label>
		    </div>
		    <div class="col-md-1">
		    <label class="mt-checkbox mt-checkbox-outline"> Delete
		        <input type="checkbox" class='delete' @if($fieldName['flags'][3] == 1) checked='checked' @endif >
		        <span></span>
		    </label>
		    </div>
		    <div class="col-md-2">
		    <label class="mt-checkbox mt-checkbox-outline"> No Access
		        <input type="checkbox" class='noAccess' @if($fieldName['flags'][4] == 1) checked='checked' @endif >
		        <span></span>
		    </label>
		    </div>
		    <div class="col-md-1">
			<span class='errLog'></span>
			</div>
		</div>
		@endforeach
	
</div>
<div class="row">
<div class="col-md-3">
<label class="col-md-3 control-label fixwidth">Select All</label>
</div>
<div class="col-md-1">
	<label class="mt-checkbox mt-checkbox-outline"> Read
        <input type="checkbox" class='readAll'>
        <span></span>
    </label>
</div>
<div class="col-md-1">    
    <label class="mt-checkbox mt-checkbox-outline"> Write
        <input type="checkbox" class='writeAll'>
        <span></span>
    </label>
</div>
<div class="col-md-1">    
    <label class="mt-checkbox mt-checkbox-outline"> Add
        <input type="checkbox" class='addAll'>
        <span></span>
    </label>
</div>
<div class="col-md-1">    
    <label class="mt-checkbox mt-checkbox-outline"> Delete
        <input type="checkbox" class='deleteAll'>
        <span></span>
    </label>
</div>
<div class="col-md-2">    
    <label class="mt-checkbox mt-checkbox-outline"> No Access
        <input type="checkbox" class='noAccessAll'>
        <span></span>
    </label>
</div>    

<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn green">Submit</button>
            <button type="button" class="btn default">Cancel</button>
        </div>
    </div>
</div>
@endif