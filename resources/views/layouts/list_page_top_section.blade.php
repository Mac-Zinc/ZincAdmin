<div class="portlet-title">
    <div class="caption">
        <i class="fa fa-pencil font-darkgreen"></i>
        <span class="caption-subject font-dark sbold uppercase">{{$table['table_title']}}</span>
    </div>
    
    <div class='filterBar'>
        <div class="btn-group">
            @if(isset($table['add_form_url']))
            <button data-url="{{$table['add_form_url']}}" class="btn green add_new_organisation add_new_button" id="add_new_organisation"> Add New
                <i class="fa fa-plus"></i>
            </button>
            @endif
        </div>   
        <div class="filterBarSub">
            <label class="bold">Search :</label> <span> <input type="text" size="40" name="search_by" class='search_by' placeholder=" @if( isset( $table['search_by_placeholder'] ) ){{$table['search_by_placeholder']}} @endif " /> </span> 
            @if( isset($organisation) || isset($regions) || isset($venues) )
            <label class="bold">Show :</label>
            @endif
            @if(isset($organisation))
            <select class="filterDropDown" name="filter_org">
                <option value="">Organisation</option>
                @foreach($organisation as $key=>$value)
                <option value='{{$key}}'>{{$value}}</option>
                @endforeach
            </select>
            @endif
            @if(isset($regions))
            <select class="filterDropDown" name="filter_reg">
                <option value="">Region</option>
                @foreach($regions as $key=>$value)
                <option value='{{$key}}'>{{$value}}</option>
                @endforeach
            </select>
            @endif
            @if(isset($venues))
            <select class="filterDropDown" name="filter_dep">
                <option value="">Depot</option>
                @foreach($venues as $key=>$value)
                <option value='{{$key}}'>{{$value}}</option>
                @endforeach
            </select>
            @endif
            
        </div>
    </div>
    <div class="tools"> </div>
   
    <div class="actions">
        <!--
        <div class="btn-group btn-group-devided" data-toggle="buttons">
            <label class="btn btn-transparent grey-salsa btn-outline btn-circle btn-sm active">
                <input type="radio" name="options" class="toggle" id="option1">Actions</label>
            <label class="btn btn-transparent grey-salsa btn-outline btn-circle btn-sm">
                <input type="radio" name="options" class="toggle" id="option2">Settings</label>
        </div>
        -->
        <div class="btn-group-2 pull-right">
            <a href="javascript:;" data-action="0" class="tool-action btn dark btn-outline">
                <i class="fa fa-print"></i> Print</a>
            <a href="javascript:;" data-action="1" class="tool-action btn green btn-outline">
                <i class="fa fa-file-pdf-o"></i> PDF</a>
            <a href="javascript:;" data-action="2" class="tool-action btn purple btn-outline">
                <i class="fa fa-share-square-o"></i> CSV</a>
        </div>
    </div>