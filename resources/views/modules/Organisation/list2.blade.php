   @include("layouts.breadcrums")

   <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light portlet-fit ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-red"></i>
                        <span class="caption-subject font-red sbold uppercase">{{ $table['table_title'] }}</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <label class="btn btn-transparent red btn-outline btn-circle btn-sm active">
                                <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                            <label class="btn btn-transparent red btn-outline btn-circle btn-sm">
                                <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <button id="add_new_organisation" class="btn green add_new_organisation add_new_button" data-url='/Form/Organisation'> Add New
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group pull-right">
                                    <button class="btn green btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:;"> Print </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;"> Save as PDF </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;"> Export to Excel </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php echo "<script> var edit_table_column_count=".count($table['table_head']).";</script>";?>
				    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
				        <thead>
				            <tr>
								@foreach ($table['table_head'] as $key=>$table_head)
									<th> {{$table_head}} </th>
								@endforeach
				               
				            </tr>
				        </thead>
				        <tbody>
				            @if(isset($table['table_content']))
							@foreach ($table['table_content'] as $key=>$table_content)
							 <tr>
							@foreach ($table['table_head'] as $key2=>$table_head)
				               
				                @if ($table_content[$key2]=='Edit') 
									<td>
				                    <a class="edit" href="{{$table['table_content_url'][$key][$key2]}}">{{ $table_content[$key2] }}</a>
                                    <a class="menueClickHijack" href="/Form/Organisation/1">Form</a>
									</td>
								@elseif ($table_content[$key2]=='Delete')
									<td>
				                    <a class="delete" href="{{$table['table_content_url'][$key][$key2]}}">{{ $table_content[$key2] }}</a>
									</td>
								@else
									  <td> {{ $table_content[$key2]}} </td>
								@endif
								@endforeach
				            </tr>
							@endforeach
				            @endif
				              
				        </tbody>
				    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
	 <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
		 <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <script src="../assets/pages/scripts/table-datatables-editable.js" type="text/javascript"></script>