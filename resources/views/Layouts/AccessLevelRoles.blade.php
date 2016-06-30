<h6> Access Permissions </h6>
<form class='accessLevelForm'>
<input type="hidden" name="_token" value="{{ csrf_token() }}" class='csrf_token'>

<div class="form-group">
    <label class="col-md-3 control-label">Access Permissions Type</label>
    <div class="col-md-9">
        <div class="mt-radio-inline">
            <label class="mt-radio">
                <input type="radio" name="apType" class="apType" value='1' > User Level
                <span></span>
            </label>
            <label class="mt-radio">
                <input type="radio" name="apType" class="apType" value='2' > User Type
                <span></span>
            </label>
            <label class="mt-radio">
                <input type="radio" name="apType" class="apType" value='3' > User
                <span></span>
            </label>
        </div>
    </div>
</div>

@if ($roles)
	<div class="form-group accessLevelRoleSelectDiv hidden">
		<label class="col-md-3 control-label">User Level</label>
		<div class="col-md-9">
	    	<select class="form-control edited" id="accessLevelRoleSelect">
	        	<option value="">Please Select a User Level</option>
	        
	        	@foreach ($roles as $key=>$val)
	        	<option value={{$key}}>{{$val}}</option>
	       		@endforeach
	       
	    	</select>
	    </div>	   
	</div>
@endif	
@if ($usertype)
	<div class="form-group accessLevelUserTypeSelectDiv hidden">
		<label class="col-md-3 control-label">User Type</label>
		<div class="col-md-9">
	    	<select class="form-control edited" id="accessLevelRoleSelect">
	        	<option value="">Please Select a User Type</option>
	        
	        	@foreach ($usertype as $key=>$val)
	        	<option value={{$key}}>{{$val}}</option>
	       		@endforeach
	       
	    	</select>
	    </div>	   
	</div>
@endif
@if ($allusers)
	<div class="form-group accessLevelUsersSelectDiv hidden">
		<label class="col-md-3 control-label">User </label>
		<div class="col-md-9">
	    	<select class="form-control edited" id="accessLevelRoleSelect">
	        	<option value="">Please Select a User</option>
	        
	        	@foreach ($allusers as $key=>$val)
	        	<option value={{$key}}>{{$val}}</option>
	       		@endforeach
	       
	    	</select>
	    </div>	   
	</div>
@endif
<div class='accessLevelSettingContainer'></div>
</form>

