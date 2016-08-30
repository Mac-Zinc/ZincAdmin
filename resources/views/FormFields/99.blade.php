<?php 
$fcol_name = $fields->tbl_fld_id;
$gridModuleFields = $moduleFields->{$sec}->{ "gridFields_".$fieldId }; 
$gridTab = $moduleFields->{$sec}->{ "gridFields_block_".$fieldId };
$tableContent = $moduleFields->{$sec}->{ "gridFields_table_content_".$fieldId };
 
?>
<!--<div class='row'>
    @foreach ($gridFields as $key=>$gridFieldId)
        <?php $gSec = $gridSections[$gridTab]; $fieldId = $gridFieldId; ?>
        @if(isset($gridModuleFields->{$gSec}->{ "field_".$fieldId }))
        <?php $fields = $gridModuleFields->{$gSec}->{ "field_".$fieldId } ;?>
        <div class='col-md-3'>
            <div class="form-group">
                        <label class="control-label tab-header">{{$fields->tbl_fld_col_disp_name}}</label>
                        @include("FormFields.$fields->tbl_fld_fld_type_id")
                        <!--<span class="help-block"> This is inline help </span>- ->
             </div>
        </div>
        @endif
    @endforeach 
</div> -->
<style type="text/css">
    .gridTable tr td:nth-child(-n+2) ,  .gridTable tr th:nth-child(-n+2){
        display: none;
    }
</style>
<!-- END PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light portlet-fit ">            
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <button id="sample_editable_1_{{$fcol_name}}_new" class="btn green gridAddNewBtn"> Add New
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        
                    </div>
                </div>
				<div class="msgDisplayArea"></div>
                <div class ='hidden-msg hidden'>This section will be available only after the user is added</div>
                <table class="table table-striped table-hover table-bordered gridTable" id="sample_editable_1_{{$fcol_name}}" data-gridfieldid='{{$gridUrl["gridfieldid"]}}'>
                    <thead>
                        <tr>
                        @foreach ($gridFields as $key=>$gridFieldId)
					        <?php $gSec = $gridSections[$gridTab]; $fieldId = $gridFieldId; ?>
                            <?php //var_dump($gridSections); ?>

					        @if(isset($gridModuleFields->{$gSec}->{ "field_".$fieldId }))
					        <?php $fields = $gridModuleFields->{$gSec}->{ "field_".$fieldId } ;?>					        
					            <th>{{$fields->tbl_fld_col_disp_name}}</th>
					        @endif
					    @endforeach 
								<th>Edit</th><th>Delete</th>               
                        </tr>
                    </thead>
                   <tbody>   
					    @foreach ($tableContent as $key=>$table_content)
					    <tr>
					    @foreach ($gridFields as $key=>$gridFieldId)
					        <?php $gSec = $gridSections[$gridTab]; $fieldId = $gridFieldId; ?>
					        @if(isset($gridModuleFields->{$gSec}->{ "field_".$fieldId }))
					        <?php $fields = $gridModuleFields->{$gSec}->{ "field_".$fieldId } ; $k = $fields->tbl_fld_tbl_col_name;?>					        
					            <td> {{$table_content->$k}} </td>
					        @endif
					    @endforeach	                        
                        <?php   //$fieldId = $gridFields[0];  $fields = $gridModuleFields->{$gSec}->{ "field_".$fieldId } ; $k = $fields->tbl_fld_tbl_col_name;?>
					    		<td><a class="edit" href="">Edit</a></td>
					    		<td><a class="delete" href="">Delete</a></td>   
					    </tr>
					    @endforeach
					   
					      
					</tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>


<script type="text/javascript">
	var TableDatatablesEditable_{{$fcol_name}} = function () {

    var handleTable = function () {

    	var tblSelector = 'sample_editable_1_{{$fcol_name}}';
    	var table = $('#'+tblSelector);
    	var edit_table_column_count = $('#'+tblSelector +' tr:first th').length;
    	var tableWrapper = $('#'+tblSelector +'_wrapper');
    	var tblRowNew = '#'+tblSelector +'_new'
        function restoreRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);

            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                oTable.fnUpdate(aData[i], nRow, i, false);
            }

            oTable.fnDraw();
        }

        function editRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
			for (var i = 0; i < edit_table_column_count-2; i++) {
                 jqTds[i].innerHTML = '<input type="text" class="form-control " value="' + aData[i] + '">';
            }
                eUrl = $(nRow).find('td .edit').attr('href');
                dUrl = $(nRow).find('td .delete').attr('href');
			 jqTds[edit_table_column_count-2].innerHTML = '<a class="edit" href="' + eUrl +'">Save</a>';
			 jqTds[edit_table_column_count-1].innerHTML = '<a class="cancel" href="' + dUrl +'">Cancel</a>';
           /* jqTds[0].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[0] + '">';
            jqTds[1].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[1] + '">';
            jqTds[2].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[2] + '">';
            jqTds[3].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[3] + '">';
            jqTds[4].innerHTML = '<a class="edit" href="">Save</a>';
            jqTds[5].innerHTML = '<a class="cancel" href="">Cancel</a>';*/
        }

        function saveRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
			for (var i = 0; i < edit_table_column_count-2; i++) {
                 oTable.fnUpdate(jqInputs[i].value, nRow, i, false);
            }
                eUrl = $(nRow).find('td .edit').attr('href');
                dUrl = $(nRow).find('td .cancel').attr('href');
			oTable.fnUpdate('<a class="edit" href="' + eUrl +'">Edit</a>', nRow, edit_table_column_count-2, false);
            oTable.fnUpdate('<a class="delete" href="' + dUrl +'">Delete</a>', nRow, edit_table_column_count-1, false);
			/*
            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
            oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
            oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 4, false);
            oTable.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 5, false);
			*/
            oTable.fnDraw();
        }

        function cancelEditRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            for (var i = 0; i < edit_table_column_count-2; i++) {
                 oTable.fnUpdate(jqInputs[i].value, nRow, i, false);
            }
			oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, edit_table_column_count-2, false);
			oTable.fnDraw();
        }

       

        var oTable = table.dataTable({

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
            "searching": false,
            "lengthChange": false,
            "lengthMenu": [
                [5, -1],
                [5, "All"] // change per page values here
            ],

            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},

            // set the initial value
            "pageLength": 5,

            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            }],
            "order": [
                [0, "asc"]
            ] // set first column as a default sort by asc
        });

        

        var nEditing = null;
        var nNew = false;

        $(tblRowNew).click(function (e) {
            e.preventDefault();
            if (nNew && nEditing) {
                if (confirm("Previose row not saved. Do you want to save it ?")) {
                    saveRow(oTable, nEditing); // save
                    $(nEditing).find("td:first").html("Untitled");
                    nEditing = null;
                    nNew = false;

                } else {
                    oTable.fnDeleteRow(nEditing); // cancel
                    nEditing = null;
                    nNew = false;
                    
                    return;
                }
            }
            var row         = {};

            for (var i = 0; i < edit_table_column_count; i++) {
                row[i] = '';
            }
            var aiNew = oTable.fnAddData(row);
            var nRow = oTable.fnGetNodes(aiNew[0]);
			
            editRow(oTable, nRow);
            nEditing = nRow;
            nNew = true;
        });

        table.on('click', '.delete', function (e) {
            e.preventDefault();

            if (confirm("Are you sure to delete this row ?") == false) {
                return;
            }

            var nRow = $(this).parents('tr')[0];
            oTable.fnDeleteRow(nRow);
            alert("Deleted! Do not forget to do some ajax to sync with backend :)");
        });

        table.on('click', '.cancel', function (e) {
            e.preventDefault();
            if (nNew) {
                oTable.fnDeleteRow(nEditing);
                nEditing = null;
                nNew = false;
            } else {
                restoreRow(oTable, nEditing);
                nEditing = null;
            }
        });

        table.on('click', '.edit', function (e) {
            e.preventDefault();
            nNew = false;
            
            /* Get the row as a parent of the link that was clicked on */
            var nRow = $(this).parents('tr')[0];

            if (nEditing !== null && nEditing != nRow) {
                /* Currently editing - but not this row - restore the old before continuing to edit mode */
                restoreRow(oTable, nEditing);
                editRow(oTable, nRow);
                nEditing = nRow;
            } else if (nEditing == nRow && this.innerHTML == "Save") { 
                          
                //alert("Updated! Do not forget to do some ajax to sync with backend :)");
                newhref = 'Edit';
                modLink = $('.modLinkModifier').val();
                gridFieldId = $(table).data('gridfieldid');
                rowPKey = $(this).parents('tr').find('td:first>input').val();
                //console.log(rowPKey);
                if( rowPKey == null || rowPKey == '' ){
                    rowPKey = 'New';
                }
                pkey = $('.primaryKey').val(); // gridRefrence and FormPrimary Key
                var gData = [];
                edRow = $(this).parents('tr');
                $(edRow).children().each(function(){                    
                    gData.push($(this).find('input').val()) ;
                });
                if(pkey != '' ){
                     newhref =  newhref + '/' + modLink + '/' + gridFieldId + '/' + rowPKey + '/' + pkey;
                }
                
                $.post( newhref, {info : gData}, function( response ) {
                    if(response.status == 1){
                        $(this).parents('.portlet-body').find('.msgDisplayArea').html('<div class="alertGridMsg alert-success fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Save Complete!</strong></div>');    
                        $(edRow).find('td:first input').val(response.returnInfo);
                        $(edRow).find('td:nth-child(2) input').val(pkey);
                        /* Editing this row and want to save it */
                        saveRow(oTable, nEditing);
                        nEditing = null;            
                
                    }else{  
                        $(this).parents('.portlet-body').find('.msgDisplayArea').html('<div class="alertGridMsg alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Save Failed!</strong></div>');
                        //editRow(oTable, nRow);
                    } 
                    $(".alertGridMsg").alert();
                    $(".alertGridMsg").fadeTo(2000, 500).slideUp(500, function(){
                        $(".alertGridMsg").alert('close');
                    })           
                });
            } else {
                /* No edit in progress - let's start one */
                editRow(oTable, nRow);
                nEditing = nRow;
            }
        });
    }

    return {

        //main function to initiate the module
        init: function () {
            handleTable();
        }

    };

}();

jQuery(document).ready(function() {
    TableDatatablesEditable_{{$fcol_name}}.init();

    if ($('.primaryKey').val() == ''){
        $('.gridAddNewBtn').hide();
    }
});
</script>
