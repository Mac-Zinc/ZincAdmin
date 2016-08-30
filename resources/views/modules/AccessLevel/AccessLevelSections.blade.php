
@if ($section)
	<div class="form-group accessLevelSectionSelectDiv row">
		<div class='col-md-3'><label class="control-label">Section</label></div>
		
		<div class="col-md-3">
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