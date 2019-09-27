<?php $__env->startSection('content'); ?>
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted"><?php echo app('translator')->getFromJson('logs.home'); ?> ·</span>
            <strong><?php echo app('translator')->getFromJson('logs.listofuser'); ?></strong>
        </span>
    </nav>
    
    <div class="cui-utils-content">
        <!-- START: tables/basic-tables -->
        <section class="card">
            <div class="card-header">
                <span class="cui-utils-title">
                    <strong>
                        <?php if(count($users)>0): ?>
                        <?php echo app('translator')->getFromJson('logs.list'); ?>
                        <?php echo e(($users->currentPage() - 1) * 20 + 1); ?> -
                        <?php echo e(min( $users->total(), $users->currentPage() * 20)); ?>

                        <?php echo app('translator')->getFromJson('logs.from'); ?>
                        <?php echo e($users->total()); ?>

                        <?php else: ?>
                        <?php echo app('translator')->getFromJson('logs.listofuser'); ?>
                        <?php endif; ?>
                    </strong>
                </span>
                
                
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-5">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <?php echo app('translator')->getFromJson('logs.name'); ?>
                                        </th>
                                        <th>
                                            <?php echo app('translator')->getFromJson('logs.email'); ?>
                                        </th>
                                        <th>
                                            <?php echo app('translator')->getFromJson('logs.phone'); ?>
                                        </th>
                                        <th>
                                            <?php echo app('translator')->getFromJson('logs.address'); ?>
                                        </th>
                                        <th>
                                            <?php echo app('translator')->getFromJson('logs.status'); ?>
                                        </th>
                                        <?php if(Auth::user()->typeofuser == 4 || Auth::user()->typeofuser == 5): ?>
                                        <th class="text-center">
                                            <?php echo app('translator')->getFromJson('logs.manage'); ?>
                                        </th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <?php echo e($user->name); ?>

                                        </td>
                                        <td>
                                            <?php echo $user->email; ?>

                                        </td>
                                        <td>
                                            <?php echo $user->phone1; ?>

                                        </td>
                                        <td>
                                            <?php echo $user->address1; ?>

                                        </td>
                                        <td>
                                            <?php if($user->status == 0): ?> <font color="green" class="btn btn-info btn-sm">Active</font> <?php elseif($user->status == 1): ?> <font color="red" class="btn btn-danger btn-sm">Inactive</font> <?php else: ?> <font color="gray" class="btn btn-warning btn-sm">Pending</font> <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if(Auth::user()->typeofuser == 5): ?>
                                            <a href="<?php echo route('users.show',$user); ?>" title="รายละเอียด" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                            <?php endif; ?>


                                            <?php if(Auth::user()->typeofuser == 4): ?>
                                            <a href="<?php echo route('users.show',$user); ?>" title="รายละเอียด" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>

                                            <a title="แก้ไข" href="<?php echo route('users.edit',$user); ?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>

                                            <a title="ลบ" onclick="deleteRow('<?php echo $user->id; ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            <?php endif; ?>
                                            <form method="POST" class="hidden" id="formDelete<?php echo $user->id; ?>" action="<?php echo route('users.destroy',$user); ?>">
                                                <?php echo csrf_field(); ?>

                                                <?php echo e(method_field('DELETE')); ?>

                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <?php echo app('translator')->getFromJson('logs.empty'); ?>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <?php echo e($users->render()); ?>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    function deleteRow(id) {
        var r = confirm("คุณค้องการลบข้อมูล ?");
        if (r) {
            $("#formDelete" + id).submit();
        }
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\educationhero\resources\views/users/index.blade.php ENDPATH**/ ?>