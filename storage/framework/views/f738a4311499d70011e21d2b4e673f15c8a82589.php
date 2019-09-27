<?php $__env->startSection('content'); ?>
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">

        <span class="font-size-18 d-block">
            <span class="text-muted"><?php echo app('translator')->getFromJson('logs.home'); ?> ·</span>
            <strong><?php echo app('translator')->getFromJson('mails.inbox'); ?> #<?php echo e($inbox->id); ?></strong>
        </span>
    </nav>
    <div class="cui-utils-content">
        <!-- START: components/mail-templates -->
        <section class="card">
            <div class="card-header">
                <div class="pull-right">
                    <a href="<?php echo e(url('/mails')); ?>" class="btn btn-primary">
                        <i class="dropdown-icon icmn-backward"></i>
                        <?php echo app('translator')->getFromJson('logs.back'); ?>
                    </a>
                </div>
                <span class="cui-utils-title">
                    <strong><?php echo e($inbox->title); ?></strong>
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="text-black"><strong><?php echo e($inbox->users->name); ?> [<?php echo e($inbox->users->email); ?>]</strong></h5>
                        <p class="text-muted"><?php echo app('translator')->getFromJson('mails.to'); ?> <?php echo e($inbox->toemail); ?></p>
                        <div class="mb-5">
                            <!-- Start Letter -->
                            <?php echo $inbox->remark; ?>

                            <!-- End Start Letter -->
                            <?php if($inbox->attachment): ?>
                            <hr/>
                            <a href="<?php echo e(url('mails/getDownload/'.$inbox->attachment)); ?>"><?php echo $inbox->attachment; ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END: components/mail-templates -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HeroTemplate\resources\views/inbox.blade.php ENDPATH**/ ?>