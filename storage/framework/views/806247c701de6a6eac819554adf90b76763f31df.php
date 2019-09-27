
<form action="<?php echo route('type.store'); ?>" method="post" class="form-horizontal">
    <?php echo csrf_field(); ?>


    <div class="form-group row">
        <label for="" class="control-label col-md-1 text-required"><?php echo app('translator')->getFromJson('logs.type'); ?> : </label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="name" value="">
        </div>
        
        <label for="" class="control-label col-md-1 text-required"><?php echo app('translator')->getFromJson('logs.subname'); ?> : </label>
        <div class="col-sm-5">
            <select class="form-control" name="subtype" id="subtype">
                <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo $key; ?>" ><?php echo $value; ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        
    </div>
    
    <div class="form-group row">
        <label for="" class="control-label col-md-1 text-required"><?php echo app('translator')->getFromJson('logs.description'); ?> : </label>
        <div class="col-sm-11">
            <input type="text" class="form-control" name="remark" value="">
        </div>
    </div>
    <div class="form-group">
        <div class="pull-right">
            <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;<?php echo app('translator')->getFromJson('logs.cancle'); ?></button>
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;<?php echo app('translator')->getFromJson('logs.save'); ?></button>
        </div>
    </div>

</form><?php /**PATH C:\xampp\htdocs\educationhero\resources\views/users/_form_type.blade.php ENDPATH**/ ?>