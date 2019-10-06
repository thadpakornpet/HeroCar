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
                                <h2><a class="btn btn-info btn-sm pull-right" href="<?php echo route('users.index'); ?>"><i
                                            class="fa fa-arrow-left"></i>&nbsp;<?php echo app('translator')->getFromJson('logs.back'); ?></a></h2>
                                <?php endif; ?>
                            </div>
                            <h2>
                            <span class="text-black">
                                <strong><?php echo app('translator')->getFromJson('logs.edit'); ?> <?php echo e($user->name); ?> <?php echo e($user->Sirname); ?></strong>
                            </span>
                            </h2>
                        </div>
                    </div>
                    <?php if(auth()->check() && auth()->user()->hasRole('super')): ?>
                    <?php if($user->thai == "Y"): ?>
                        <div class="card">
                            <div class="card-body">
                                <?php echo $__env->make('users._form_thai', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="card">
                            <div class="card-body">
                                <?php echo $__env->make('users._form_nothai', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ALL-Plivilege')): ?>
                        <div class="card">
                            <div class="card-body">
                                <?php echo $__env->make('users._role', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php endif; ?>

                    <?php if(auth()->check() && auth()->user()->hasAnyRole('owner|user')): ?>
                    <?php if($user->thai == ""): ?>
                        <div class="card">
                            <div class="card-body">
                                <h3>
                                    <center>
                                        <span class="text-black"><?php echo app('translator')->getFromJson('master.thaipeople'); ?></span><br/><br/>
                                        <button type="button" class="btn btn-outline-success"
                                                onclick="address('Y');"><?php echo app('translator')->getFromJson('master.yes'); ?></button>
                                        <button type="button" class="btn btn-outline-danger"
                                                onclick="address('N');"><?php echo app('translator')->getFromJson('master.no'); ?></button>
                                    </center>
                                </h3>
                            </div>
                        </div>
                    <?php else: ?>
                        <?php if($user->thai == "Y"): ?>
                            <div class="card">
                                <div class="card-body">
                                    <?php echo $__env->make('users._form_thai', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="card">
                                <div class="card-body">
                                    <?php echo $__env->make('users._form_nothai', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if(auth()->check() && auth()->user()->hasRole('super')): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ALL-Plivilege')): ?>
                            <div class="card">
                                <div class="card-body">
                                    <?php echo $__env->make('users._role', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function address(a) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(url('user/updatethai')); ?>",
                data: {data: a},
                type: 'POST',
                success: function (data) {
                    console.log(data);
                    swal({
                        title: '<?php echo app('translator')->getFromJson("sold.success"); ?>!',
                        type: 'success',
                        confirmButtonClass: 'btn-success',
                    });
                    window.location.reload();
                },
                error: function (data) {
                    console.log(data);
                    swal({
                        title: '<?php echo app('translator')->getFromJson("sold.error"); ?>',
                        type: 'error',
                        confirmButtonClass: 'btn-danger',
                    })
                }
            })
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HeroCar\resources\views/users/update.blade.php ENDPATH**/ ?>