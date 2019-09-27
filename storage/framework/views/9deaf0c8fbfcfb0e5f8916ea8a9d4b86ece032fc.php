<?php $__env->startSection('content'); ?>
<div class="cui-layout-content">
        <div class="cui-login-header">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cui-login-header-menu">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item"><a href="<?php echo e(route('login')); ?>"><font color="black"><?php echo app('translator')->getFromJson('login.login'); ?></font></a></li>
                            <li class="ropdown-toggle text-nowrap list-inline-item" data-toggle="dropdown" aria-expanded="false"><a href="javascript: void(0);"><font color="black"><?php echo app('translator')->getFromJson('login.language'); ?></font></a></li>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="<?php echo e(url('locale/th')); ?>"><font color="black"><?php echo app('translator')->getFromJson('login.th'); ?></font></a>
                                <a class="dropdown-item" href="<?php echo e(url('locale/en')); ?>"><font color="black"><?php echo app('translator')->getFromJson('login.en'); ?></font></a>
                            </div>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="cui-login-block">
            <div class="row">
                <div class="col-xl-12">
                    <div class="cui-login-block-inner">
                        <div class="cui-login-block-form">
                            <h4 class="text-uppercase">
                                <strong><?php echo app('translator')->getFromJson('logs.reset'); ?></strong>
                            </h4>
                            <br />
                            <form id="form-validation" name="form-validation" method="POST" action="<?php echo e(route('password.email')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group row <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                    <label for="name" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('logs.email'); ?></label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

                                        <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                </div>

                                <div class="form-actions right">
                                    <button type="submit" class="btn btn-primary mr-5"><?php echo app('translator')->getFromJson('logs.resetb'); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HeroTemplate\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>