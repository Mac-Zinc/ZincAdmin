<div class="weekTitleBar"> 
	@if(isset($headerType))
		@if($headerType == 1)
		<i class="icon-user"></i> CURRENT MANNING LEVEL 
		@endif
		@if($headerType == 2)
		<i class="icon-user"></i> WEEK {{$currentWeekNo}} : {{$startNEndDate[0]['date']}} {{$startNEndDate[0]['month']}} - {{$startNEndDate[6]['date']}} {{$startNEndDate[6]['month']}} {{$currentWeekYear}}
		@endif
	@endif
	<span class="weekNav">
		<span class="weekNavPrevious"><a href='{{$weekNavURL}}/{{$currentWeekNo - 1 }}' ><< WEEK {{$currentWeekNo - 1 }}</a> </span>
		<input type="hidden" class="currentWeekNo dataTableExtraParams" name="currentWeekNo" value='{{$currentWeekNo}}'>
		<input type="hidden" class="currentWeekYear dataTableExtraParams" name="currentWeekYear" value='{{$currentWeekYear}}'>
		<span class="weekNavCurrent">WEEK {{$currentWeekNo}} </span>
		@if($showNextWeek)
		<span class="weekNavNext"><a href='{{$weekNavURL}}/{{$currentWeekNo + 1 }}' > WEEK {{$currentWeekNo + 1 }} >></a></span>
		@endif
	<span>
</div>