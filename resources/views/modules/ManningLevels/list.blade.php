<style type="text/css">
	span.weekNav {
    	float: right;
	}
	div.weekTitleBar {
    	background-color: #d3d3d3;
    	padding: 5px 10px;
    	font-weight: bold;
	}
	span.filterAttachRight{
		float: right;
	}
	div.filterBar {
    	padding-top: 6px;
    	padding-bottom: 6px;
    	font-weight: 600;
    	font-size: small;
	}
	span.columnML {
	    display: table-cell;
	    width: 60px;
	    border-style: solid;
	    border-width: 1px;
	    padding: 5px;
	}
	div.listRowsContainer{
		padding-top: 10px;
    	padding-bottom: 6px;
	}
	div.tabML{

	}
	div.rowML {
    	display: table;
	}
	span.MLColourCode {
	    display: inline-block;
	    width: 31px;
	    height: 15px;
	    padding-left: 5px;
	    padding-right: 5px;
	}
	span.MLGreen {
    	background-color: green;
	}
	span.MLRed {
    	background-color: red;
	}
	span.MLOrange {
    	background-color: orange;
	}
	span.MLMoreData {
	    display: inline-block;
	    height: 15px;
	    width: 14px;
	}
	.ui-dialog .ui-dialog-content {
	    position: relative;
	    border: 0;
	    padding: 0 !important; 
	    background: none;
	    overflow: initial !important; 
	    min-height: 100px;
	}
	.ui-dialog .ui-dialog-buttonpane {
		padding: 0 !important;
	}
	.no-close .ui-dialog-titlebar-close {
	    display: none;
	}
	.rowMLData>span.columnML {
   		max-height: 65px;
    	min-height: 65px;
	}
	.buttonMLQuickView{
		width:100%;
		height: 30px;
		font-size: smaller;
	}
	.z-index {
    	z-index: 1;
	}
	.z-index li {
	    font-size: smaller;
	}
	.show_hide {
		display:none;
	}
	div.MLQuickEdit.show_hide.MLQuickEditOpen {
	    border-style: solid;
	    border-width: 1px;
	    width: 1050px;
	}
	.MLQuickEditRow > span {
	    float: left;
	    width: 95.2px;
	    font-weight: bold;
	    font-size: smaller;
	    text-align: center;
	}
	input.MLQuickEditRowInput {
	    width: 90px;
	    border-radius: 5px;
	    height: 25px;
	}
	.MLQuickEditRow {
	    display: table;
	    padding-top: 10px;
	    padding-bottom: 10px;
	}
	div.MLQuickEditRow > span > button {
	    width: 40px;
	    font-size: 9px;
	    padding: 2px;
	    margin-left: 3px;
	    margin-right: 3px;
	}
	hr.newHr {
	    border-top: 1px solid black! important;
	    margin: 0px !important;
	}
	span.weekNavPrevious {
    	margin-right: 25px;
	}
	span.weekNavNext {
    	margin-left: 25px;
	}
	span.weekNav>span>a {
    	color: black !important;
    	font-weight: 500;
	}
	span.weekNav>span>a:hover {
    	color: blue !important;
    	text-decoration: none;
	}
	span.MLDriverLP {
    	display: block !important;
	}
	span.columnML.shrink {
	    width: 40.5px
	}
	.shrink span.MLColourCode {
	    width: 14px;
	}
	.rowML span.columnML:first-child {
	    width: 200px;
	}
	.rowMLHeader span.columnML {
	    vertical-align: middle;
	}
	.sorting {
	    background: url(/assets/global/plugins/datatables/images/sort_both.png) center right no-repeat;
	}
</style>
@include("Layouts.breadcrums")
<div class=''>
	<div class="weekTitleBar"> <i class="icon-user"></i> CURRENT MANNING LEVEL 
		<span class="weekNav">
			<span class="weekNavPrevious"><a href='List/ManningLevels/{{$currentWeekNo - 1 }}' ><< WEEK {{$currentWeekNo - 1 }}</a> </span>
			<span class="weekNavCurrent">WEEK {{$currentWeekNo}} </span>
			<span class="weekNavNext"><a href='List/ManningLevels/{{$currentWeekNo + 1 }}' > WEEK {{$currentWeekNo + 1 }} >></a></span>
		<span>
	</div>
	<div class='filterBar'>
		<span class=''>Show 
			<select name='' class=''>
				<option value='1'>1</option>
				<option value='10'>10</option>
				<option value='50'>50</option>
				<option value='100'>100</option>
				<option value='150'>150</option>
			</select> results
		</span>
		<span class=''>Filters 
			<select>
				<option value=''>Select a Region</option>
				@foreach($regions as $key=>$value)
				<option value='{{$key}}'>{{$value}}</option>
				@endforeach
			</select> 
			<select>
				<option value=''>Select an Organisation</option>
				@foreach($organisations as $key=>$value)
				<option value='{{$key}}'>{{$value}}</option>
				@endforeach
			</select>
		</span>
		<span class='filterAttachRight'>Driver/LP Number Quick Find <input type="text" name=""/></span>
	</div>
	<!--<div class='tabML'>
		<ul class="nav nav-tabs">
			<li><a class="" data-toggle="tab" href='#tab1' aria-expanded="false">Previous Week</a></li>
			<li class='active'><a class="" data-toggle="tab" href='#tab2' aria-expanded="true">Current Week</a></li>
			<li><a class="" data-toggle="tab" href='#tab3' aria-expanded="false">Next Week</a></li>
		</ul>
	</div>-->
	<div class='listRowsContainer'>
		@include("modules.ManningLevels.listRows")
	</div>
	<div id="dialog-confirm" title="Save Conformation" style='display:none;'>
  		<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Are you sure you want to save?</p>
	</div>
</div>