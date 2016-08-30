
@if ($modules)
	<div class="form-group accessLevelModuleSelectDiv row">
		<div class='col-md-3'><label class="control-label">Area</label></div>
		<div class="col-md-3">
	    	<select class="form-control edited" id="accessLevelModuleSelect">
	       		<option value="">Please Select an Area</option>
	        
	        	@foreach ($modules as $key=>$moduleName)
	        	<option value={{$key}}>{{$moduleName}}</option>
	       		@endforeach
	       
	    	</select>
	    </div>	   
	</div>
@endif	
<div class="accessLevelSection"></div>