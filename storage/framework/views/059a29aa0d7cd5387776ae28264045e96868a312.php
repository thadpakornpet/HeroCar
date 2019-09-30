<?php $__env->startSection('content'); ?>
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted"><?php echo app('translator')->getFromJson('logs.home'); ?> ·</span>
            <strong><?php echo app('translator')->getFromJson('logs.edit'); ?></strong>
        </span>
    </nav>

    <div class="cui-utils-content">
        <!-- START: tables/basic-tables -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="width-100 text-center pull-right hidden-md-down">
                          <?php if(auth()->check() && auth()->user()->hasRole('super')): ?>
                            <h2><a class="btn btn-info btn-sm pull-right" href="<?php echo route('users.index'); ?>"><i class="fa fa-arrow-left"></i>&nbsp;<?php echo app('translator')->getFromJson('logs.back'); ?></a></h2>
                            <?php endif; ?>
                        </div>
                        <h2>
                            <span class="text-black">
                                <strong><?php echo app('translator')->getFromJson('logs.edit'); ?> <?php echo e($user->name); ?> <?php echo e($user->Sirname); ?></strong>
                            </span>
                        </h2>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <?php echo $__env->make('users._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>

                <?php if(auth()->check() && auth()->user()->hasRole('super')): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ALL-Plivilege')): ?>
                <div class="card">
                    <div class="card-body">
                        <?php echo $__env->make('users._role', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
                <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HeroCar\resources\views/users/update.blade.php ENDPATH**/ ?>