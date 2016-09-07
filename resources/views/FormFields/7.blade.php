<?php 
if(isset($moduleFields->{$sec}->{ "displayValue_".$fieldId })){    
    $value = "<img src='images/{$moduleFields->{$sec}->{ "displayValue_".$fieldId }}'>";
    $fileTypeClass = 'fileinput-exists';  
}else{ $value = ''; $fileTypeClass = 'fileinput-new';}

?>
<style type="text/css">
    .img-circle-imp{
        border-radius:50% !important;
    }
</style>
<div class="fileinput {{$fileTypeClass}}" data-provides="fileinput">
    <div class="img-circle-imp fileinput-preview thumbnail driverImgDisplay " data-trigger="fileinput" style=""> 
    	<?php echo $value; ?>
    </div>
    <div>
        <span class="btn red btn-outline btn-file">
            <span class="fileinput-new"> Select image </span>
            <span class="fileinput-exists"> Change </span>
            <input name="{{$fields->tbl_fld_tbl_col_name}}" type="file"> 
        </span>
        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
    </div>
</div>