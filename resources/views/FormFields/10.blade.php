<select class="form-control tag-field {{$fields->tbl_fld_class}}" name="{{$fields->tbl_fld_tbl_col_name}}" id="{{$fields->tbl_fld_tbl_col_name}}" >
	@foreach ($days as $key=>$day)
	<option value='{{$key}}'>{{$day}}</option>
	@endforeach
</select>