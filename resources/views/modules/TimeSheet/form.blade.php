	
@include("layouts.breadcrums")

<div class=''>
<div class='msgDisplayArea'></div>
	
	@include("layouts.current_week_bar")
	<!--<div class='tabML'>
		<ul class="nav nav-tabs">
		<?php $active = 'active'; ?>
		@for( $j = 0; $j < 7 ; $j++)
			<li class="{{$active}}"><a class='' data-toggle="tab" href='#tab_{{$j}}' aria-expanded="false">{{ date('d-m-Y', strtotime($startNEndDate[$j]['fullDate'])) }}</a></li>
			<?php $active = ''; ?>
		@endfor	
		<!--	
			<li class='active'><a class="" data-toggle="tab" href='#tab2' aria-expanded="true">Current Week</a></li>
			<li><a class="" data-toggle="tab" href='#tab3' aria-expanded="false">Next Week</a></li>
		- ->	
		</ul>
	</div>-->
	<div class="tab-content">
	<input type="hidden" name="_token" value="{{ csrf_token() }}" class='csrf_token'>
		<!--
		<?php $active = 'active'; ?>
		@for( $j = 0; $j < 7 ; $j++)
		<div id='tab_{{$j}}' class="tab-pane {{$active}}"> -->
		<form class='form_{{$j}}' name='form_{{$j}}'>		
		<?php $active = ''; ?>
		<input type="hidden" placeholder="" name="id" class="form-control id" value='{{$currentWeekTimeSheet[$startNEndDate[$j]["fullDate"]][0]->id}}' readonly="readonly">
			<div class="row">
	            <div class="col-md-1">
	                <div class="form-group">
	                    <label class="control-label tab-header">Shift Date </label>
	                    <?php // $currentWeekTimeSheet[$startNEndDate[$j]['fullDate']][0]->shift_date ; ?>
	                    <input type="text" placeholder="DD/MM/YYYY" name="shift_date"  class="form-control shift_date" value='{{$currentWeekTimeSheet[$startNEndDate[$j]["fullDate"]][0]->shift_date}}' readonly="readonly">
	                    <!--<span class="help-block"> This is inline help </span>-->
	                </div>
	            </div>
	            <div class="col-md-1">
	                <div class="form-group">
	                    <label class="control-label tab-header">Shift Start Time</label>
	                    <input type="text" placeholder="HH:MM" name="shift_start_time" class="form-control shift_start_time timepicker timepicker-24" value='{{$currentWeekTimeSheet[$startNEndDate[$j]["fullDate"]][0]->shift_start_time}}'>
	                    <!--<span class="help-block"> This is inline help </span>-->
	                </div>
	            </div>
	            <div class="col-md-1">
					<div class="form-group">
                		<label class="control-label tab-header">Shift End Time</label>
                		<input type="text" placeholder="HH:MM" name="shift_end_time" class="form-control shift_end_time timepicker timepicker-24" value='{{$currentWeekTimeSheet[$startNEndDate[$j]["fullDate"]][0]->shift_end_time}}'>
                		<!--<span class="help-block"> This is inline help </span>-->
            		</div>
	            </div> 
				<div class="col-md-1">
	                <div class="form-group">
	                    <label class="control-label tab-header">Break(fixed)</label>
	                    <input type="text" placeholder="00:00" name="break" class="form-control break"  data-defaultTime = 'false' 
	                    value = "{{$currentWeekTimeSheet[$startNEndDate[$j]['fullDate']][0]->break}}"   >
	                    
	                    <!--<span class="help-block"> This is inline help </span>-->
	                </div>
	            </div>
	            <div class="col-md-1">
		            <div class="form-group">
	                    <label class="control-label tab-header">POA</label>
	                    <input type="text" placeholder="HH:MM" name="poa" class="form-control poa timepicker timepicker-24" value='{{$currentWeekTimeSheet[$startNEndDate[$j]["fullDate"]][0]->poa}}'>
	                    <!--<span class="help-block"> This is inline help </span>-->
	                </div>
	            </div>
               <div class="col-md-2">
	                <div class="form-group">
	                    <label class="control-label tab-header">Night Out Pay (Y/N)</label><br>
	                    <input type="checkbox" name="name" id="name" value='1' class="">YES
	                    <input type="checkbox" name="name" id="name" value='0' class=" ">No
	                    <!--<span class="help-block"> This is inline help </span>-->
	                </div>
	            </div>
	            <div class="col-md-1">
	                <div class="form-group">
	                    <label class="control-label tab-header">Expenses</label>
	                    <span><br>&pound;<input type="text" placeholder="0.00" name="expenses" class="form-control expenses" value='{{$currentWeekTimeSheet[$startNEndDate[$j]["fullDate"]][0]->expenses}}'></span>
	                    <!--<span class="help-block"> This is inline help </span>-->
	                </div>
	            </div>                                     
	        </div>
	        
	    </form>    
		<!--</div>
		@endfor	-->
		<button class='saveTimeSheets'>Save</button>
	</div>

</div>

<script src="../assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>

<script src="../assets/global/scripts/globalize.culture.en-GB.js" type="text/javascript"></script>



<script type="text/javascript">
$(document).ready(function() {
	$('.expenses').spinner({
		numberFormat: "n",
		min : 0 ,
		max : 1000,
		step : 0.10,
		culture: "en-GB"
	});

	$('.break').timepicker({    
	    autoclose: true,
	    minuteStep: 1,
	    showSeconds: false,
	    showMeridian: false,
	    defaultTime : false,	    
	    
	}).on('changeTime.timepicker', function(e) {    
    var h= e.time.hours;
    var m= e.time.minutes;    
    m+=h*60;    
    if( m > 59)
        $(this).timepicker('setTime', '00:00');
  });
	//$( ".break" ).spinner( "value", 50 );
});
</script>
