<?php $__env->startSection('content'); ?>
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted"><?php echo app('translator')->getFromJson('logs.home'); ?> ·</span>
            <strong><?php echo app('translator')->getFromJson('logs.sub'); ?></strong>
        </span>
    </nav>
    <?php echo $__env->make('errors._list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="cui-utils-content">
        <!-- START: tables/basic-tables -->
        <section class="card">
            <div class="card-header">
                <span class="cui-utils-title">
                    <strong>
                        <i class="fa fa-user">&nbsp;<?php echo app('translator')->getFromJson('logs.createsub'); ?></i>
                    </strong>
                </span>
                <a class="btn btn-info btn-sm pull-right" href="<?php echo route('sub.index'); ?>"><i class="fa fa-arrow-left"></i>&nbsp;<?php echo app('translator')->getFromJson('logs.back'); ?></a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <?php echo $__env->make('users._form_sub', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\educationhero\resources\views/users/create_sub.blade.php ENDPATH**/ ?>