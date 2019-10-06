<h3>จัดการสิทธิ์การใช้งาน</h3><br/>
<?php
$collection_role = $user->getRoleNames();
$old_role = $collection_role->implode('-');

$collection_permision = $user->getPermissionNames();
$old_permission = $collection_permision->implode('-');
?>
    <form action="<?php echo e(url('users/roles')); ?>" method="post" class="form-horizontal">
        <?php echo csrf_field(); ?>

        <div class="form-group row">
            <label class="col-md-1 col-form-label text-required">Role : </label>
            <div class="col-sm-5">
              <select class="form-control" name="roles" required>
                  <option value=""></option>
                  <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($role->name); ?>" <?php if($old_role == $role->name): ?> selected <?php endif; ?>><?php echo e(strtoupper($role->name)); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>

            <label class="col-md-1 col-form-label text-required">Permission : </label>
            <div class="col-sm-5">
                <select class="form-control" name="permissions" required>
                    <option value=""></option>
                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($permission->name); ?>" <?php if($old_permission == $permission->name): ?> selected <?php endif; ?>><?php echo e($permission->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
        <input type="hidden" name="old_role" value="<?php echo e($old_role); ?>">
        <input type="hidden" name="old_permission" value="<?php echo e($old_permission); ?>">
        <div class="form-group">
            <div class="pull-right">
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;<?php echo app('translator')->getFromJson('logs.save'); ?></button>
            </div>
        </div>

    </form>
<?php /**PATH C:\xampp\htdocs\HeroCar\resources\views/users/_role.blade.php ENDPATH**/ ?>