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
                                <strong><?php echo app('translator')->getFromJson('logs.pleaseregister'); ?></strong>
                            </h4>
                            <br />
                            <form id="form-validation" name="form-validation" method="POST" action="<?php echo e(route('register')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group row <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                    <label for="name" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('logs.name'); ?></label>

                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                        <?php if($errors->has('name')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>


                                <div class="form-group row <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                    <label for="Email" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('logs.email'); ?> </label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                                        <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                    <label for="password" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('logs.password'); ?></label>

                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        <?php if($errors->has('password')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('logs.cpassword'); ?></label>

                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>




                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('logs.phone'); ?> #1</label>

                                    <div class="col-md-12">
                                        <input id="phone1" type="text" class="form-control" name="phone1" required>
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('logs.phone'); ?> #2</label>

                                    <div class="col-md-12">
                                        <input id="phone2" type="text" class="form-control" name="phone2" required>
                                    </div>
                                </div>





                                <h3><center><?php echo app('translator')->getFromJson('logs.addressuser'); ?></center></h3>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('logs.address'); ?></label>

                                    <div class="col-md-12">
                                        <textarea id="Address" type="text" class="form-control" name="address1" required></textarea>
                                    </div>
                                </div>




                                <div class="form-group row">
                                    <label for="Road" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('logs.road'); ?></label>

                                    <div class="col-md-12">
                                        <input id="road1" type="text" class="form-control" name="road1" required>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="subdistrict1" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('logs.subdis'); ?></label>

                                    <div class="col-md-12">
                                        <input id="subdistrict1" type="text" class="form-control" name="subdistrict1" required>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="district1" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('logs.dis'); ?></label>

                                    <div class="col-md-12">
                                        <input id="district1" type="text" class="form-control" name="district1" required>
                                    </div>
                                </div>



                                <div class="form-group row">

                                    <label for="province1" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('logs.pro'); ?></label>

                                    <div class="col-md-12">
                                        <input id="province1" type="text" class="form-control" name="province1" required>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="zipcode" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('logs.zip'); ?></label>

                                    <div class="col-md-12">
                                        <input id="zipcode" type="text" class="form-control" name="zipcode1" required>
                                    </div>
                                </div>


                                <h3><center><?php echo app('translator')->getFromJson('logs.addresspresent'); ?></center></h3>




                                <div class="form-group row">
                                    <label for="address2" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('logs.address'); ?></label>

                                    <div class="col-md-12">
                                        <textarea id="address2" type="text" class="form-control" name="address2" required></textarea>
                                    </div>
                                </div>




                                <div class="form-group row">
                                    <label for="road2" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('logs.road'); ?></label>

                                    <div class="col-md-12">
                                        <input id="road2" type="text" class="form-control" name="road2" required>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="subdistrict2" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('logs.subdis'); ?></label>

                                    <div class="col-md-12">
                                        <input id="subdistrict2" type="text" class="form-control" name="subdistrict2" required>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="district2" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('logs.dis'); ?></label>

                                    <div class="col-md-12">
                                        <input id="district2" type="text" class="form-control" name="district2" required>
                                    </div>
                                </div>



                                <div class="form-group row">

                                    <label for="province2" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('logs.pro'); ?></label>

                                    <div class="col-md-12">
                                        <input id="province2" type="text" class="form-control" name="province2" required>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="zipcode2" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('logs.zip'); ?></label>

                                    <div class="col-md-12">
                                        <input id="zipcode2" type="text" class="form-control" name="zipcode2" required>
                                    </div>
                                </div>
                                <div class="form-actions right">
                                    <button type="submit" class="btn btn-primary mr-5"><?php echo app('translator')->getFromJson('logs.signup'); ?></button>
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
<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\educationhero\resources\views/auth/register.blade.php ENDPATH**/ ?>