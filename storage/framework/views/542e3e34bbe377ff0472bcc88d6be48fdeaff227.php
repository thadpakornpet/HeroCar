    <form action="<?php echo route('sub.update',$types); ?>" method="post" class="form-horizontal">
    <?php echo e(method_field('PUT')); ?>

    <?php echo csrf_field(); ?>

    <input type="hidden" class="form-control" name="id" value="<?php echo e($types->id); ?>">

    <div class="form-group row">
        <label for="" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 text-required"><?php echo app('translator')->getFromJson('logs.subname'); ?> : </label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="name" value="<?php echo e($types->name); ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 text-required"><?php echo app('translator')->getFromJson('logs.possition'); ?> : </label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="location" value="<?php echo e($types->location); ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 text-required"><?php echo app('translator')->getFromJson('logs.description'); ?> : </label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="remark" value="<?php echo e($types->remark); ?>">
        </div>
    </div>

    <div class="form-group">
        <div class="pull-right">
            <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;<?php echo app('translator')->getFromJson('logs.cancle'); ?></button>
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;<?php echo app('translator')->getFromJson('logs.save'); ?></button>
        </div>
    </div>

</form><?php /**PATH C:\xampp\htdocs\educationhero\resources\views/users/_form_sub_edit.blade.php ENDPATH**/ ?>