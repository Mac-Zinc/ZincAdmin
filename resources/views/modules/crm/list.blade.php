   <style>
       .font-darkgreen{
            color: #006400 !important;
       }
       .btn.btn-outline.blue {
            background: #3598dc none repeat scroll 0 0;
            border-color: #3598dc;
            color: #fff !important;
        }
        .tool-action {
            margin-right: 20px;
        }
        .filterBar {
            display: inline-block;
            margin-left: 20px;
        }
   </style>
   @include("layouts.breadcrums")
   <input type="hidden" name="_token" value="{{ csrf_token() }}" class='csrf_token'>
   <div>
       <div>            
            <div class="portlet light portlet-fit portlet-datatable ">
                @include("layouts.list_page_top_section")                    
            </div>
            <div class="portlet-body">
                <div class="table-container">                        
                    <table class="table table-striped table-bordered table-hover table-checkable" id="crm_table">
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
        dataTableControler = initAjaxDatatablesCRMTable('crm_table','ListRowsAjax/CRM');
    });
    </script>
