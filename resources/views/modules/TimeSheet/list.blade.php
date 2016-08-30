@include("layouts.breadcrums")
<input type="hidden" name="_token" value="{{ csrf_token() }}" class='csrf_token'>
<div>
    @include("layouts.current_week_bar")
    
    <div>            
        <div class="portlet light portlet-fit portlet-datatable ">
            @include("layouts.list_page_top_section")
        </div>
            <div class="portlet-body">
                <div class="table-container">
                    <!-- 
                    <div class="table-actions-wrapper">
                        <span> </span>
                        <select class="table-group-action-input form-control input-inline input-small input-sm">
                            <option value="">Select...</option>
                            <option value="Cancel">Cancel</option>
                            <option value="Cancel">Hold</option>
                            <option value="Cancel">On Hold</option>
                            <option value="Close">Close</option>
                        </select>
                        <button class="btn btn-sm green table-group-action-submit"><i class="fa fa-check"></i> Submit</button>
                    </div>
                    -->                     
                     
                     <table class="table table-striped table-bordered table-hover table-checkable" id="timesheet_table">
                         <thead>                                
                             <tr role="row" class="heading">
                                 @foreach ($table['table_head'] as $key=>$table_head)
                                     <th> {{$table_head}} </th>
                                 @endforeach
                                
                             </tr>                                
                         </thead>
                         <tbody> </tbody>
                     </table>
                 </div>
             </div>                                       
    </div>
</div>



 <script type="text/javascript"> 
 var dataTableControler ;
 jQuery(document).ready(function() {
     dataTableControler = initAjaxDatatablesCRMTable('timesheet_table','ListRowsAjax/TimeSheet');
 });
 </script>