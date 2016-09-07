<div class="tab-content">
	<!--<div class='container'>
		<div class='row'>
			<div class='col-md-2'><span class='bold sorting'>Driver</span></div>
			<?php $class='shrink'; ?>
			<div class='col-md-3'>
				<div class='row'>		
			@for( $j = 0; $j < 21 ; $j++)
				@if( $j == 7 )
				</div></div><div class='col-md-4'><div class='row'>
				@endif
				@if( $j == 14)
				</div></div><div class='col-md-3'><div class='row'>
				@endif
				<div class='col-md-2 {{$class}}'><span class='bold'>{{(int)$startNEndDate[$j]['date']}}</span><span> {{$startNEndDate[$j]['day']}} </span></div>
				@if( $j == 6)
				<?php  $class=''; ?>
				@elseif ( $j == 13)
				<?php  $class='shrink'; ?>
				@endif	
			@endfor
				</div>
			</div>
			
			
		</div>
	</div>-->
	
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
		@foreach($drivers as $drivervalue)
		<div class="rowML rowMLData">
			<span class='columnML'>
				<span class='bold'>{{$drivervalue->firstname_usr}}</span>
				<span class='MLDriverLP'>{{$drivervalue->lp_number}}</span>
			</span>
			<?php $class='shrink'; ?>		
			@for( $j = 0; $j < 21 ; $j++)			
				
				<?php
					$d1 = $startNEndDate[$j]['date'];
					$d2 = $drivervalue->id_usr;
					if(isset($ManningLevelsData[$d2][$d1]['mannig_lvl_day'])){
						$d3 = $ManningLevelsData[$d2][$d1]['mannig_lvl_day'];
						$d5 = $ManningLevelsData[$d2][$d1]['id'];
					}else{
						$d3 = 5;
						$d5 = -1;
					}
					
					$d4 = $MLForDayClr[$d3] ;
					
				?>
				
				<span class='columnML {{$class}}' data-date="{{$startNEndDate[$j]['date']}}">
				@if($d5 != -1)
					<span class='MLColourCode {{$d4}}' data-mlforday='{{$d3}}'></span>
					@if( $currentWeekNo >= date('W'))
						@if ($j > 6 && $j < 14)
						<span class='MLMoreData' data-rotate='0' data-rowid = '{{$d5}}'>
						    <i class='icon-social-youtube'></i>
						</span>
						
						<span>
							<button class='buttonMLQuickView' >{{$MLForDay[$d3]}}</button>
							<ul class='z-index'>
								@for( $k = 1; $k < count($MLForDay) ; $k++)
								<li data-value='{{$k}}' class='buttonLiMLQuickView'>{{$MLForDay[$k]}}</li>
								@endfor
								
							</ul>
							<select class='MLQuickView hidden' data-previous='1' data-rowid = '{{$d5}}'>
								@for( $k = 1; $k < count($MLForDay) ; $k++)
								<option value='{{$k}}'>{{$MLForDay[$k]}}</option>
								@endfor							
							</select>
						</span>
						@endif
					@endif					
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
			<div class='overlay hidden'> This Record is being edited by other user and currently Locked for edit</div>
			<div class='MLQuickEditRow header'>
				<span>Start Time</span>
				<span>Full Name</span>
				<span>Job Type</span>
				<span>Rate</span>
				<span>Depot</span>
				<span>Shift Pattern</span>
				<span>Region</span>
				<span>Preferred Depot</span>
				<span>Time Sheet</span>
				<span>Self Bill</span>
				<span>Invoiced</span>
				<span>&nbsp;</span>
			</div>
			<hr class="newHr">
			<div class='MLQuickEditRow dataRow'>
				<span class="input-group"><input type="text" name="start_time" class='MLQuickEditRowInput start_time timepicker timepicker-24' readonly="readonly"></span>
				<span><input type="text" name="full_name" class='MLQuickEditRowInput full_name' readonly="readonly"></span>
				<span><input type="text" name="job_type" class='MLQuickEditRowInput job_type' readonly="readonly"></span>
				<span><input type="text" name="rate" class='MLQuickEditRowInput rate' readonly="readonly"></span>
				<span>
					<select name="depot" class='MLQuickEditRowInput depot'>
						@foreach($allDepot as $depoKey => $depoValue)
						<option value='{{$depoKey}}'>{{$depoValue}}</option>
						@endforeach
					</select>					
				</span>
				<span><input type="text" name="shift_pattern" class='MLQuickEditRowInput shift_pattern' readonly="readonly"></span>
				<span><input type="text" name="region" class='MLQuickEditRowInput region' readonly="readonly"></span>
				<span><input type="text" name="preffered_depot" class='MLQuickEditRowInput preffered_depot' readonly="readonly"></span>
				<span><select name='timesheet' class='MLQuickEditRowInput timesheet'><option value='1'>Yes</option><option value='0'>No</option></select></span>
				<span><select name='self_bill' class='MLQuickEditRowInput self_bill'><option value='1'>Yes</option><option value='0'>No</option></select></span>
				<span><select name='invoiced' class='MLQuickEditRowInput invoiced'><option value='1'>Yes</option><option value='0'>No</option></select></span>
				<span><button>Save</button><button>Cancel</button></span>
			</div>
		</div>
		@endforeach	
	</div>
	{{ $drivers->links() }}
	
</div>		
<script>
	$('.buttonMLQuickView').button({
        text: true         
    }).click(function() {
        var menu = $( this ).next().show();
    	$( document ).one( "click", function() {
        	menu.hide();
        });
        return false;
    }).next().hide().menu();

    function getPageData(pNo){
    
    return	{   _token : $('.csrf_token').val(),                            
                page  : pNo,
                recPerPage : $('.recPerPage').val(),
                currentWeekNo : $('.currentWeekNo').val(),
                currentWeekYear : $('.currentWeekYear').val(),
                driverLPFilter : $('.driverLPFilter').val()

        	}
    }
</script>