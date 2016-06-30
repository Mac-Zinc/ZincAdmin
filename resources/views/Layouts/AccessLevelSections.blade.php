
@if ($section)
	<div class="form-group accessLevelSectionSelectDiv">
		<label class="col-md-3 control-label">Section</label>
		<div class="col-md-9">
	    	<select class="form-control edited" id="accessLevelSectionSelect">
	       		<option value="">Please Select a Section</option>
	        
	        	@foreach ($section as $key=>$sectionName)
	        	<option value={{$key}}>{{$sectionName}}</option>
	       		@endforeach
	       
	    	</select>
	    </div>	   
	</div>
@endif	
<div class="accessLevelSectionFields"></div>