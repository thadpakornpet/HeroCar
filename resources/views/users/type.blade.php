@if(!empty($user->id))
    <input type="hidden" name="id" value="{!! $user->id !!}">
@endif
<?php

$name =    !empty($user->id) ?  old('name',$user->name) : old('name','');
$remake =    !empty($user->id) ?  old('remake',$user->remake) : old('remake','');


?>
<a class="btn btn-info btn-sm" href="{!! route('users.index') !!}"><i class="fa fa-arrow-left"></i>&nbsp;กลับ</a>
@if(!empty($user->id))
    <form action="{!! route( 'users.update',$user) !!}" method="post" class="form-horizontal">
        {{ method_field('PUT') }}
@else
    <form action="{!! route('users.store') !!}" method="post" class="form-horizontal">
@endif
    {!! csrf_field() !!}
    



    <div class="form-group">
        <label for="" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 text-required">ชื่อ : </label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="name" value="{!! $name !!}">
        </div>
    </div>
    
  

    <div class="form-group">
        <label for="" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 text-required">หมายเหตุ : </label>
        <div class="col-sm-6">
            <textarea class="form-control" name="remake" rows="3">{!! $remake !!}</textarea>
        </div>
    </div>
   

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="reset" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i>&nbsp;ยกเลิก</button>
            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i>&nbsp;บันทึก</button>
        </div>
    </div>

</form>