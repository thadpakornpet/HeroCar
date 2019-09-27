<?php $__env->startSection('content'); ?>
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted"><?php echo app('translator')->getFromJson('logs.home'); ?> ·</span>
            <strong><?php echo app('translator')->getFromJson('logs.edittype'); ?></strong>
        </span>
    </nav>
    
    <div class="cui-utils-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="width-100 text-center pull-right hidden-md-down">
                            <h2><a class="btn btn-info btn-sm pull-right" href="<?php echo route('type.index'); ?>"><i class="fa fa-arrow-left"></i>&nbsp;<?php echo app('translator')->getFromJson('logs.back'); ?></a></h2>
                        </div>
                        <h2>
                            <span class="text-black">
                                <strong><?php echo app('translator')->getFromJson('logs.edittype'); ?> <?php echo e($types->name); ?></strong>
                            </span>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <?php echo $__env->make('users._form_type_edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\educationhero\resources\views/users/update_type.blade.php ENDPATH**/ ?>