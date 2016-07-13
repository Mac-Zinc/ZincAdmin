<div class="tab-content">

	
	<div id='tab2' class="tab-pane active">
		<div class="rowML rowMLHeader">
			<span class='columnML'><span class='bold sorting'>Driver</span></span>
			<?php $class='shrink'; ?>		
			@for( $j = 0; $j < 21 ; $j++)
				<span class='columnML {{$class}}'><span class='bold'>{{(int)$startNEndDate[$j]['date']}}</span><span> {{$startNEndDate[$j]['day']}} </span></span>
				@if( $j == 6)
				<?php  $class=''; ?>
				@elseif ( $j == 13)
				<?php  $class='shrink'; ?>
				@endif	
			@endfor		
		</div>
		@foreach($drivers as $driverkey=>$drivervalue)
		<div class="rowML rowMLData">
			<span class='columnML'>
				<span class='bold'>{{$drivervalue['name']}}</span>
				<span class='MLDriverLP'>{{$drivervalue['LP']}}</span>
			</span>
			<?php $class='shrink'; ?>		
			@for( $j = 0; $j < 21 ; $j++)			
				<span class='columnML {{$class}}' data-date="{{$startNEndDate[$j]['date']}}">
					<span class='MLColourCode MLGreen'></span>
					@if ($j > 6 && $j < 14)
					<span class='MLMoreData' data-rotate='0'>
					    <i class='icon-social-youtube'></i>
					</span>
					<span>
						<button class='buttonMLQuickView'>OK</button>
						<ul class='z-index'>
							<li data-value='1' class='buttonLiMLQuickView'>OK</li>
							<li data-value='2' class='buttonLiMLQuickView'>RDW</li>
							<li data-value='3' class='buttonLiMLQuickView'>SICK DAY</li>
						</ul>
						<select class='MLQuickView hidden' data-previous='1'>
							<option value='1'>OK</option>
							<option value='2'>RDW</option>
							<option value='3'>SICK DAY</option>
						</select>
					</span>
					@endif
					@if( $j == 6)
					<?php  $class=''; ?>
					@elseif ( $j == 13)
					<?php  $class='shrink'; ?>
					@endif
				</span>
			@endfor			
		</div>
		<div class='MLQuickEdit show_hide'>
			<div class='MLQuickEditRow'>
				<span>Start Time</span>
				<span>Full Name</span>
				<span>Job Type</span>
				<span>Rate</span>
				<span>Depot</span>
				<span>Region</span>
				<span>Preferred Depot</span>
				<span>Time Sheet</span>
				<span>Self Bill</span>
				<span>Invoiced</span>
				<span>&nbsp;</span>
			</div>
			<hr class="newHr">
			<div class='MLQuickEditRow'>
				<span><input type="text" name="" class='MLQuickEditRowInput'></span>
				<span><input type="text" name="" class='MLQuickEditRowInput'></span>
				<span><input type="text" name="" class='MLQuickEditRowInput'></span>
				<span><input type="text" name="" class='MLQuickEditRowInput'></span>
				<span><input type="text" name="" class='MLQuickEditRowInput'></span>
				<span><input type="text" name="" class='MLQuickEditRowInput'></span>
				<span><input type="text" name="" class='MLQuickEditRowInput'></span>
				<span><select><option value='1'>Yes</option><option value='0'>No</option></select></span>
				<span><select><option value='1'>Yes</option><option value='0'>No</option></select></span>
				<span><select><option value='1'>Yes</option><option value='0'>No</option></select></span>
				<span><button>Save</button><button>Cancel</button></span>
			</div>
		</div>
		@endforeach	
	</div>
	
	<div class='paginationNav'>
		<span class='paginationPrevious'></span>
		<span></span>
		<span class='paginationNext'></span>
	</div>

</div>		
<script>
	$('.buttonMLQuickView').button({
        text: true,
        label: "OK"          
    }).click(function() {
        var menu = $( this ).next().show().position({
        	my: "left top",
            at: "left bottom",
            of: this
        });
    	$( document ).one( "click", function() {
        	menu.hide();
        });
        return false;
    }).next().hide().menu();
</script>