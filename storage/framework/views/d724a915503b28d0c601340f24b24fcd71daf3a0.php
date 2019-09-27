<?php $__env->startSection('content'); ?>
<div class="cui-layout-content">
        <div class="cui-login-header">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cui-login-header-menu">
                        <ul class="list-unstyled list-inline">
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
                                <strong>
                                    <?php if(app()->getLocale() == 'th'): ?>
                                    ลงทะเบียนโดยการเชิญชวน
                                    <?php else: ?>
                                    Register by invited
                                    <?php endif; ?>
                                </strong>
                            </h4>
                            <br />
                            <form id="form-validation" name="form-validation" method="POST" action="<?php echo e(url('registerinvate')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group row <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                        <label for="name" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('logs.name'); ?></label>

                                        <div class="col-md-8">
                                            <input id="name" type="text" style="font-family: 'Pridi', serif;" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                            <?php if($errors->has('name')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('name')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>


                                    <div class="form-group row <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                        <label for="Email" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('logs.email'); ?> </label>

                                        <div class="col-md-8">
                                            <input id="email" type="email" style="font-family: 'Pridi', serif;" class="form-control" name="email" value="<?php echo e($user->email); ?>" required>

                                            <?php if($errors->has('email')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>

                                    </div>

                                    <div class="form-group row <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                        <label for="password" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('logs.password'); ?></label>

                                        <div class="col-md-8">
                                            <input id="password" type="password" class="form-control" name="password" required>

                                            <?php if($errors->has('password')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>

                                    </div>

                                    <div class="form-group row <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">

                                            <label for="password-confirm" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('logs.cpassword'); ?></label>

                                            <div class="col-md-8">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                            </div>
                                        </div>


                                <input type="hidden" name="token" value="<?php echo e($user->password); ?>">

                                    <div class="form-group row pull-right">
                                            <button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson('logs.signup'); ?></button>
                                        </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

$(document).ready(function () {
    $('#subdistrict1').change(function() {
        $('#zipcode1').val($(this).find(':selected').data('zip'));
});

$('#province1').change(function() {
    $.ajax({
       method: "GET",
       url: "<?php echo e(route('get_amphures')); ?>",
       data: {
        province: $("#province1").val(),
              },
       success: function(data) {
        $('#district1').find('option').remove()
           console.log(data);
        data.forEach(function(element) {
            $('#district1').append(
                "<option value='"+element.name_th+"'>"+element.name_th+"</option>"
            )
});
       }
   });
});
$('#district1').change(function() {
    $.ajax({
       method: "GET",
       url: "<?php echo e(route('get_dis')); ?>",
       data: {
        district: $("#district1").val(),
              },
       success: function(data) {
           console.log(data);
           $('#subdistrict1').find('option').remove()
        data.forEach(function(element) {
            $('#subdistrict1').append(
                "<option  data-zip='"+element.zip_code+"' value='"+element.name_th+"'>"+element.name_th+"</option>"
            )
});
       }
   });
});


});


</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HeroTemplate\resources\views/invited.blade.php ENDPATH**/ ?>