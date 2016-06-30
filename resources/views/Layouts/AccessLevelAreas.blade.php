
@if ($modules)
	<div class="form-group accessLevelModuleSelectDiv">
		<label class="col-md-3 control-label">Area</label>
		<div class="col-md-9">
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