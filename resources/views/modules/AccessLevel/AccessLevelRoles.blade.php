@include("layouts.breadcrums")
<div class="msgDisplayArea"></div>
<form class='accessLevelForm'>
<input type="hidden" name="_token" value="{{ csrf_token() }}" class='csrf_token'>

<div class="form-group row">
	<div class='col-md-3'><label class="control-label">Access Permissions Type</label></div>    
    <div class="col-md-4">
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
	<div class="form-group accessLevelRoleSelectDiv hidden row">
	<div class='col-md-3'><label class="control-label">User Level</label></div>
		
		<div class="col-md-3">
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
	<div class="form-group accessLevelUserTypeSelectDiv hidden row">
		<div class='col-md-3'><label class="control-label">User Type</label></div>
		<div class="col-md-3">
	    	<select class="form-control edited" id="accessLevelUserTypeSelect">
	        	<option value="">Please Select a User Type</option>
	        
	        	@foreach ($usertype as $key=>$val)
	        	<option value={{$key}}>{{$val}}</option>
	       		@endforeach
	       
	    	</select>
	    </div>	   
	</div>
@endif
@if ($allusers)
	<div class="form-group accessLevelUsersSelectDiv hidden row">
		<div class='col-md-3'><label class="control-label">User </label></div>
		<div class="col-md-3">
	    	<select class="form-control edited" id="accessLevelUserSelect">
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

