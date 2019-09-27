<?php $__env->startSection('content'); ?>
<div class="cui-layout-content">
    <div
        class="cui-login"
        style="background-image: url(<?php echo e(asset('cleanui/components/pages/common/img/login/1.jpeg')); ?>)"
        >
        <div class="cui-login-header">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cui-login-header-menu">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item"><a href="<?php echo e(route('register')); ?>"><?php echo app('translator')->getFromJson('login.register'); ?></a></li>
                            <li class="list-inline-item"><a href="<?php echo e(route('login')); ?>"><?php echo app('translator')->getFromJson('login.login'); ?></a></li>
                            <li class="ropdown-toggle text-nowrap list-inline-item" data-toggle="dropdown" aria-expanded="false"><a href="javascript: void(0);"><?php echo app('translator')->getFromJson('login.language'); ?></a></li>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="<?php echo e(url('locale/th')); ?>"><?php echo app('translator')->getFromJson('login.th'); ?></a>
                                <a class="dropdown-item" href="<?php echo e(url('locale/en')); ?>"><?php echo app('translator')->getFromJson('login.en'); ?></a>
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
                                <strong><?php echo app('translator')->getFromJson('logs.linkreset'); ?></strong>
                            </h4>
                            <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
                            <br />
                            <form id="form-validation" name="form-validation" method="POST" action="<?php echo e(route('password.request')); ?>">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="token" value="<?php echo e($token); ?>">
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('logs.email'); ?></label>

                                    <input id="email" type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" value="<?php echo e($email ?? old('email')); ?>" required autocomplete="email" autofocus>

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

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('logs.password'); ?></label>
                                    <input id="password" type="password" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password" required autocomplete="new-password">

                                    <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('logs.cpassword'); ?></label>

                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    <?php if ($errors->has('password_confirmation')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password_confirmation'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>

                                <div class="form-actions right">
                                    <button type="submit" class="btn btn-primary mr-5"><?php echo app('translator')->getFromJson('logs.linkresetb'); ?></button>
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

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\educationhero\resources\views/auth/passwords/reset.blade.php ENDPATH**/ ?>