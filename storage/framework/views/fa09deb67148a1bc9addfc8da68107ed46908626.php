<?php $__env->startSection('content'); ?>
<div class="cui-layout-content">
    <div class="cui-login">
        <div class="cui-login-header">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cui-login-header-menu">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item"><a href="#" data-toggle="modal" data-target="#exampleModal"><font color="black"><?php echo app('translator')->getFromJson('login.register'); ?></font></a></li>
                            <li class="list-inline-item"><a href="<?php echo e(route('login')); ?>"><font color="black"><?php echo app('translator')->getFromJson('login.login'); ?></font></a></li>
                            <li class="ropdown-toggle text-nowrap list-inline-item" data-toggle="dropdown" aria-expanded="false"><a href="javascript: void(0);"><font color="black"><?php echo app('translator')->getFromJson('login.language'); ?></font></a></li>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="<?php echo e(url('locale/th')); ?>"><img src="<?php echo e(asset('thailand-flag.gif')); ?>" class="cui-avatar cui-avatar-border-white cui-avatar-25"> <font color="black"><?php echo app('translator')->getFromJson('login.th'); ?></font></a>
                                <a class="dropdown-item" href="<?php echo e(url('locale/en')); ?>"><img src="<?php echo e(asset('300px-Flag_of_the_United_Kingdom.svg.png')); ?>" class="cui-avatar cui-avatar-border-white cui-avatar-25"> <font color="black"><?php echo app('translator')->getFromJson('login.en'); ?></font></a>
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
                                <strong><?php echo app('translator')->getFromJson('login.pleaselogin'); ?></strong>
                            </h4>
                            <br />
                            <form id="form-validation" name="form-validation" method="POST" action="<?php echo e(route('login')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->getFromJson('login.username'); ?></label>
                                    <input
                                        id="validation-email"
                                        class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        placeholder="<?php echo app('translator')->getFromJson('login.username'); ?>"
                                        name="email" value="<?php echo e(old('email')); ?>"
                                        type="text"
                                        autofocus style="font-family: 'Pridi', serif;"
                                        />
                                </div>
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->getFromJson('login.password'); ?></label>
                                    <input
                                        id="validation-password"
                                        class="form-control password <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        name="password"
                                        type="password"
                                        placeholder="<?php echo app('translator')->getFromJson('login.password'); ?>" style="font-family: 'Pridi', serif;"
                                        />
                                </div>
                                <div class="form-group">
                                    <a
                                        href="<?php echo e(route('password.request')); ?>"
                                        class="pull-right cui-utils-link-blue cui-utils-link-underlined"
                                        ><?php echo app('translator')->getFromJson('login.forget'); ?></a
                                    >
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>/>
                                                   <?php echo app('translator')->getFromJson('login.remember'); ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-actions right">
                                    <button type="submit" class="btn btn-primary mr-5"><?php echo app('translator')->getFromJson('login.signin'); ?></button>
                                </div>
                                <div class="form-group">
                                    <span>
                                        <?php echo app('translator')->getFromJson('login.use'); ?>
                                    </span>
                                    <div class="mt-2">
                                        <a href="<?php echo e(url('/auth/redirect/facebook')); ?>" class="btn btn-icon">
                                            <i class="icmn-facebook"></i>
                                        </a>
                                        <a href="<?php echo e(url('/auth/redirect/google')); ?>" class="btn btn-icon">
                                            <i class="icmn-google"></i>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="form-validation" name="form-validation" method="POST" action="<?php echo e(route('register')); ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong><?php echo app('translator')->getFromJson('logs.pleaseregister'); ?></strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <?php echo csrf_field(); ?>
                            <div class="form-group row <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <label for="name" class="col-md-2 control-label"><?php echo app('translator')->getFromJson('logs.name'); ?></label>

                                <div class="col-md-10">
                                    <input id="name" type="text" style="font-family: 'Pridi', serif;" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                    <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group row <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <label for="Email" class="col-md-2 control-label"><?php echo app('translator')->getFromJson('logs.email'); ?> </label>

                                <div class="col-md-10">
                                    <input id="email" type="email" style="font-family: 'Pridi', serif;" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                                    <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                <label for="password" class="col-md-2 control-label"><?php echo app('translator')->getFromJson('logs.password'); ?></label>

                                <div class="col-md-10">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row <?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                                <label for="password-confirm" class="col-md-2 control-label"><?php echo app('translator')->getFromJson('logs.cpassword'); ?></label>

                                <div class="col-md-10">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                    <?php if($errors->has('password_confirmation')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson('logs.signup'); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HeroCar\resources\views/auth/login.blade.php ENDPATH**/ ?>