<!--<input type="text" placeholder="Enter Text" class="form-control" id="firstName">-->

<select class="form-control tag-field {{$fields->tbl_fld_class}}" name="{{$fields->tbl_fld_tbl_col_name}}" id="{{$fields->tbl_fld_tbl_col_name}}" multiple="multiple"></select>

<script type="text/javascript">

var data = [{ id: 0, text: 'enhancement' }, { id: 1, text: 'bug' }, { id: 2, text: 'duplicate' }, { id: 3, text: 'invalid' }, { id: 4, text: 'wontfix' }];

$("#{{$fields->tbl_fld_tbl_col_name}}").select2({
  data: data,
  tags: true
})
</script>