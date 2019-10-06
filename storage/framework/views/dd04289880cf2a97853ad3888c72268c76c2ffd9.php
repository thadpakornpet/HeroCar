<?php
$name = !empty($user->id) ? old('name', $user->name) : old('name', '');
$email = !empty($user->id) ? old('email', $user->email) : old('email', '');
if(isset($user->getprofiles->phone1)){
  $phone1 = $user->getprofiles->phone1;
} else {
  $phone1 = '';
}
if(isset($user->getprofiles->phone2)){
  $phone2 = $user->getprofiles->phone2;
} else {
  $phone2 = '';
}
if(isset($user->getprofiles->address1)){
  $address1 = $user->getprofiles->address1;
} else {
  $address1 = '';
}
if(isset($user->getprofiles->address2)){
  $address2 = $user->getprofiles->address2;
} else {
  $address2 = '';
}
if(isset($user->getprofiles->road1)){
  $road1 = $user->getprofiles->road1;
} else {
  $road1 = '';
}
if(isset($user->getprofiles->subdistrict1)){
  $subdistrict1 = $user->getprofiles->subdistrict1;
} else {
  $subdistrict1 = '';
}
if(isset($user->getprofiles->district1)){
  $district1 = $user->getprofiles->district1;
} else {
  $district1 = '';
}
if(isset($user->getprofiles->province1)){
  $province1 = $user->getprofiles->province1;
} else {
  $province1 = '';
}
if(isset($user->getprofiles->zipcode1)){
  $zipcode1 = $user->getprofiles->zipcode1;
} else {
  $zipcode1 = '';
}

if(isset($user->getprofiles->road2)){
  $road2 = $user->getprofiles->road2;
} else {
  $road2 = '';
}
if(isset($user->getprofiles->subdistrict2)){
  $subdistrict2 = $user->getprofiles->subdistrict2;
} else {
  $subdistrict2 = '';
}
if(isset($user->getprofiles->district2)){
  $district2 = $user->getprofiles->district2;
} else {
  $district2 = '';
}
if(isset($user->getprofiles->province2)){
  $province2 = $user->getprofiles->province2;
} else {
  $province2 = '';
}
if(isset($user->getprofiles->zipcode2)){
  $zipcode2 = $user->getprofiles->zipcode2;
} else {
  $zipcode2 = '';
}
//$phone1 = !empty($user->id) ? old('phone1', $user->getprofiles->phone1) : old('phone1', '');
//$phone2 = !empty($user->id) ? old('phone2', $user->getprofiles->phone2) : old('phone2', '');
// $address1 = !empty($user->id) ? old('address1', $user->getprofiles->address1) : old('address1', '');
//
// $road1 = !empty($user->id) ? old('road', $user->getprofiles->road1) : old('road1', '');
// $subdistrict1 = !empty($user->id) ? old('subdistrict1', $user->getprofiles->subdistrict1) : old('subdistrict1', '');
// $district1 = !empty($user->id) ? old('district1', $user->getprofiles->district1) : old('district1', '');
// $province1 = !empty($user->id) ? old('province1', $user->getprofiles->province1) : old('province1', '');
// $zipcode1 = !empty($user->id) ? old('zipcode1', $user->getprofiles->zipcode1) : old('zipcode1', '');
//
//
// $address2 = !empty($user->id) ? old('address2', $user->getprofiles->address2) : old('address2', '');
// $road2 = !empty($user->id) ? old('road', $user->getprofiles->road2) : old('road2', '');
// $subdistrict2 = !empty($user->id) ? old('subdistrict2', $user->getprofiles->subdistrict2) : old('subdistrict2', '');
// $district2 = !empty($user->id) ? old('district2', $user->getprofiles->district1) : old('district2', '');
// $province2 = !empty($user->id) ? old('province2', $user->getprofiles->province2) : old('province2', '');
// $zipcode2 = !empty($user->id) ? old('zipcode2', $user->getprofiles->zipcode2) : old('zipcode2', '');
?>
<?php if(!empty($user->id)): ?>
<form action="<?php echo e(route( 'users.update',$user)); ?>" method="post" class="form-horizontal">
    <?php echo e(method_field('PUT')); ?>

    <?php else: ?>
    <form action="<?php echo route('users.store'); ?>" method="post" class="form-horizontal">
        <?php endif; ?>
        <?php echo csrf_field(); ?>


        <div class="form-group row">
            <label class="col-md-1 col-form-label text-required"><?php echo app('translator')->getFromJson('logs.email'); ?> : </label>
            <div class="col-sm-5">
                <input type="email" style="font-family: 'Pridi', serif;" class="form-control" name="email" value="<?php echo $email; ?>">
            </div>

            <label class="col-md-1 col-form-label text-required"><?php echo app('translator')->getFromJson('logs.name'); ?> : </label>
            <div class="col-sm-5">
                <input type="text"  style="font-family: 'Pridi', serif;"class="form-control" name="name" value="<?php echo $name; ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6">
                <br/>
                <h3><?php echo app('translator')->getFromJson('logs.addressuser'); ?></h3>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-required"><?php echo app('translator')->getFromJson('logs.phone'); ?> : </label>
                            <div class="col-sm-10">
                                <input type="text" style="font-family: 'Pridi', serif;" class="form-control" name="phone1" value="<?php echo $phone1; ?>">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="" class="col-md-2 col-form-label text-required"><?php echo app('translator')->getFromJson('logs.address'); ?> : </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" style="font-family: 'Pridi', serif;" name="address1" rows="3"><?php echo $address1; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-2 col-form-label text-required"><?php echo app('translator')->getFromJson('logs.road'); ?> : </label>
                            <div class="col-sm-10">
                                <input type="text" style="font-family: 'Pridi', serif;" class="form-control" name="road1" value="<?php echo $road1; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="10" class="col-md-2 col-form-label text-required"><?php echo app('translator')->getFromJson('logs.pro'); ?> : </label>
                            <div class="col-sm-10">
                                <select class="form-control" style="font-family: 'Pridi', serif;" required id="province1" name="province1">
                                    <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                                    <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option  value="<?php echo $value->name_th; ?>"  <?php if($province1 != ''): ?><?php echo $user->getprofiles->province1 == $value->name_th ? 'selected' : ''; ?><?php endif; ?>><?php echo $value->name_th; ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="10" class="col-md-2 col-form-label text-required"><?php echo app('translator')->getFromJson('logs.dis'); ?> : </label>
                            <div class="col-sm-10">
                                <select class="form-control" style="font-family: 'Pridi', serif;" required id="district1" name="district1">
                                    <?php if($district1 == null): ?>
                                    <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                                    <?php else: ?>
                                    <option value="<?php echo $district1; ?>" selected><?php echo $district1; ?></option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="10" class="col-md-2 col-form-label text-required"><?php echo app('translator')->getFromJson('logs.subdis'); ?> : </label>
                            <div class="col-sm-10">
                                <select class="form-control" style="font-family: 'Pridi', serif;" required id="subdistrict1" name="subdistrict1">
                                    <?php if($subdistrict1 == null): ?>
                                    <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                                    <?php else: ?>
                                    <option  value="<?php echo $subdistrict1; ?>" selected><?php echo $subdistrict1; ?></option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="10" class="col-md-2 col-form-label text-required"><?php echo app('translator')->getFromJson('logs.zip'); ?> : </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" style="font-family: 'Pridi', serif;" required id="zipcode1" name="zipcode1" value="<?php echo $zipcode1; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <br/>
                <h3><?php echo app('translator')->getFromJson('logs.addresspresent'); ?></h3>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="10" class="col-md-2 col-form-label text-required"><?php echo app('translator')->getFromJson('logs.phone'); ?> : </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" style="font-family: 'Pridi', serif;" name="phone2" value="<?php echo $phone2; ?>">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="10" class="control-label col-md-2 text-required"><?php echo app('translator')->getFromJson('logs.address'); ?> : </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" style="font-family: 'Pridi', serif;" name="address2" rows="3"><?php echo $address2; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="10" class="col-md-2 col-form-label text-required"><?php echo app('translator')->getFromJson('logs.road'); ?> : </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" style="font-family: 'Pridi', serif;" name="road2" value="<?php echo $road2; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="10" class="col-md-2 col-form-label text-required"><?php echo app('translator')->getFromJson('logs.pro'); ?> : </label>
                            <div class="col-sm-10">
                                <select class="form-control" required id="province2" style="font-family: 'Pridi', serif;" name="province2">
                                    <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                                    <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option  value="<?php echo $value->name_th; ?>" <?php if($province2 != ''): ?><?php echo $user->getprofiles->province2 == $value->name_th ? 'selected' : ''; ?><?php endif; ?>><?php echo $value->name_th; ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="10" class="col-md-2 col-form-label text-required"><?php echo app('translator')->getFromJson('logs.dis'); ?> : </label>
                            <div class="col-sm-10">
                                <select class="form-control" required id="district2" style="font-family: 'Pridi', serif;" name="district2">
                                    <?php if($district2 == null): ?>
                                    <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                                    <?php else: ?>
                                    <option value="<?php echo $district2; ?>" selected><?php echo $district2; ?></option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="10" class="col-md-2 col-form-label text-required"><?php echo app('translator')->getFromJson('logs.subdis'); ?> : </label>
                            <div class="col-sm-10">
                                <select class="form-control" required id="subdistrict2" style="font-family: 'Pridi', serif;" name="subdistrict2">
                                    <?php if($subdistrict2 == null): ?>
                                    <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                                    <?php else: ?>
                                    <option  value="<?php echo $subdistrict2; ?>" selected><?php echo $subdistrict2; ?></option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="10" class="col-md-2 col-form-label text-required"><?php echo app('translator')->getFromJson('logs.zip'); ?> : </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" style="font-family: 'Pridi', serif;" required name="zipcode2" id="zipcode2" value="<?php echo $zipcode2; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if(!empty($user->id)): ?>
        <input type="hidden" name="id" value="<?php echo $user->id; ?>">
        <?php endif; ?>

        <div class="form-group">
            <div class="pull-right">
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;<?php echo app('translator')->getFromJson('logs.cancle'); ?></button>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;<?php echo app('translator')->getFromJson('logs.save'); ?></button>
            </div>
        </div>

    </form>

    <script>

        $(document).ready(function () {
            $('#subdistrict1').change(function () {
                $('#zipcode1').val($(this).find(':selected').data('zip'));
            });
            $('#subdistrict2').change(function () {
                $('#zipcode2').val($(this).find(':selected').data('zip'));
            });
            $('#province1').change(function () {
                $.ajax({
                    method: "GET",
                    url: "<?php echo e(route('get_amphures')); ?>",
                    data: {
                        province: $("#province1").val(),
                    },
                    success: function (data) {
                        console.log(data);
                        data.forEach(function (element) {
                            $('#district1').append(
                                    "<option value='" + element.name_th + "'>" + element.name_th + "</option>"
                                    )
                        });
                    }
                });
            });
            $('#province2').change(function () {
                $.ajax({
                    method: "GET",
                    url: "<?php echo e(route('get_amphures')); ?>",
                    data: {
                        province: $("#province2").val(),
                    },
                    success: function (data) {
                        console.log(data);
                        data.forEach(function (element) {
                            $('#district2').append(
                                    "<option value='" + element.name_th + "'>" + element.name_th + "</option>"
                                    )
                        });
                    }
                });
            });
            $('#district1').change(function () {
                $.ajax({
                    method: "GET",
                    url: "<?php echo e(route('get_dis')); ?>",
                    data: {
                        district: $("#district1").val(),
                    },
                    success: function (data) {
                        console.log(data);
                        data.forEach(function (element) {
                            $('#subdistrict1').append(
                                    "<option  data-zip='" + element.zip_code + "' value='" + element.name_th + "'>" + element.name_th + "</option>"
                                    )
                        });
                    }
                });
            });
            $('#district2').change(function () {
                $.ajax({
                    method: "GET",
                    url: "<?php echo e(route('get_dis')); ?>",
                    data: {
                        district: $("#district2").val(),
                    },
                    success: function (data) {
                        console.log(data);
                        data.forEach(function (element) {
                            $('#subdistrict2').append(
                                    "<option  data-zip='" + element.zip_code + "' value='" + element.name_th + "'>" + element.name_th + "</option>"
                                    )
                        });
                    }
                });
            });

        });


    </script>
<?php /**PATH C:\xampp\htdocs\HeroCar\resources\views/users/_form_thai.blade.php ENDPATH**/ ?>