@if ($fields)
<label class="col-md-3 control-label">Fields</label>
<div class='form-group accessLevelFieldsDiv'>
	
	<span>
		@foreach ($fields as $key=>$fieldName)
		<div class="mt-checkbox-list">
			<span class='fieldName'>{{$fieldName}} : </span> 
			<input type="hidden" value='{{ trim($key,"'") }}' class='fieldId'>
			<input type="hidden" name = '{{ trim($key,"'") }}' value="0" class='binaryVal'>
		    <label class="mt-checkbox mt-checkbox-outline"> Read
		        <input type="checkbox" class='read'> 
		        <span></span>
		    </label>
		    <label class="mt-checkbox mt-checkbox-outline"> Write
		        <input type="checkbox" class='write'>
		        <span></span>
		    </label>
		    <label class="mt-checkbox mt-checkbox-outline"> Add
		        <input type="checkbox" class='add'>
		        <span></span>
		    </label>
		    <label class="mt-checkbox mt-checkbox-outline"> Delete
		        <input type="checkbox" class='delete'>
		        <span></span>
		    </label>
		    <label class="mt-checkbox mt-checkbox-outline"> No Access
		        <input type="checkbox" class='noAccess'>
		        <span></span>
		    </label>
			<span class='errLog'></span>
		</div>
		@endforeach
	</span>
</div>

<label class="col-md-3 control-label fixwidth">Select All</label>
<div class='form-group'>
	<label class="mt-checkbox mt-checkbox-outline"> Read
        <input type="checkbox" class='readAll'>
        <span></span>
    </label>
    <label class="mt-checkbox mt-checkbox-outline"> Write
        <input type="checkbox" class='writeAll'>
        <span></span>
    </label>
    <label class="mt-checkbox mt-checkbox-outline"> Add
        <input type="checkbox" class='addAll'>
        <span></span>
    </label>
    <label class="mt-checkbox mt-checkbox-outline"> Delete
        <input type="checkbox" class='deleteAll'>
        <span></span>
    </label>
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