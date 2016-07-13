<style type="text/css">
	span.weekNav {
    	float: right;
	}
	div.weekTitleBar {
    	background-color: #d3d3d3;
    	padding: 5px 10px;
    	font-weight: bold;
	}
</style>	
@include("Layouts.breadcrums")

<div class=''>
	<div class="weekTitleBar"> <i class="icon-user"></i> WEEK {{$currentWeekNo}} : {{$startNEndDate['current'][0]['date']}} {{$startNEndDate['current'][0]['month']}} - {{$startNEndDate['current'][6]['date']}} {{$startNEndDate['current'][6]['month']}} {{$currentWeekYear}} 
		<span class="weekNav"><a href='javascript:;'><<</a> WEEK {{$currentWeekNo}} <a href='javascript:;'>>></a><span>
	</div>
	<div class=''>
		<div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label tab-header">Shift Date</label>
                    <input type="text" placeholder="Enter Text" name="name" id="name" class="form-control ">
                    <!--<span class="help-block"> This is inline help </span>-->
                </div>
            </div>                                        
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label tab-header">Shift Start Time</label>
                    <input type="text" placeholder="Enter Text" name="name" id="name" class="form-control ">
                    <!--<span class="help-block"> This is inline help </span>-->
                </div>
                <div class="form-group">
                    <label class="control-label tab-header">Shift End Time</label>
                    <input type="text" placeholder="Enter Text" name="name" id="name" class="form-control ">
                    <!--<span class="help-block"> This is inline help </span>-->
                </div>
            </div>                                        
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label tab-header">Break(fixed)</label>
                    <input type="text" placeholder="Enter Text" name="name" id="name" class="form-control ">
                    <!--<span class="help-block"> This is inline help </span>-->
                </div>
            </div>                                        
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label tab-header">POA</label>
                    <input type="text" placeholder="Enter Text" name="name" id="name" class="form-control ">
                    <!--<span class="help-block"> This is inline help </span>-->
                </div>
            </div>                                        
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label tab-header">Night Out Pay</label>
                    <input type="text" placeholder="Enter Text" name="name" id="name" class="form-control ">
                    <!--<span class="help-block"> This is inline help </span>-->
                </div>
            </div>                                        
        </div>
	</div>
</div>