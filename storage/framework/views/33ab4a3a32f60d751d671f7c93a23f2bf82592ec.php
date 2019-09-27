<?php if(Auth::user()->typeofuser != 6): ?>
<?php $__env->startSection('content'); ?>
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted"><?php echo app('translator')->getFromJson('logs.home'); ?> ·</span>
            <strong><?php echo app('translator')->getFromJson('logs.logs'); ?></strong>
        </span>
    </nav>

    <div class="cui-utils-content">
        <!-- START: tables/basic-tables -->
        <section class="card">
            <div class="card-header">
                <span class="cui-utils-title">
                    <strong>
                        <?php if(count($users1)>0): ?>
                        <?php echo app('translator')->getFromJson('logs.list'); ?>
                        <?php echo e(($users1->currentPage() - 1) * 20 + 1); ?> -
                        <?php echo e(min( $users1->total(), $users1->currentPage() * 20)); ?>

                        <?php echo app('translator')->getFromJson('logs.from'); ?>
                        <?php echo e($users1->total()); ?>

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
                                            <?php echo app('translator')->getFromJson('logs.userid'); ?>
                                        </th>
                                        <th>
                                            <?php echo app('translator')->getFromJson('logs.remark'); ?>
                                        </th>
                                        <th>
                                            <?php echo app('translator')->getFromJson('logs.ipaddress'); ?>
                                        </th>
                                        <th>
                                            <?php echo app('translator')->getFromJson('logs.agent'); ?>
                                        </th>
                                        <th>
                                            <?php echo app('translator')->getFromJson('logs.createat'); ?>
                                        </th><th>
                                            <?php echo app('translator')->getFromJson('logs.updateat'); ?>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $users1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <?php echo e($user1->user->name); ?>

                                        </td>
                                        <td>
                                            <?php echo $user1->remark; ?>

                                        </td>
                                        <td>
                                            <?php echo $user1->ipaddress; ?>

                                        </td>
                                        <td>
                                            <?php echo e($user1->agen['name']); ?>

                                        </td>
                                        <td>
                                            <?php echo $user1->created_at; ?>

                                        </td>
                                        <td>
                                            <?php echo $user1->updated_at; ?>

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
                        <?php echo e($users1->render()); ?>

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
<?php else: ?>
<?php $__env->startSection('content'); ?>
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted">หน้าแรก ·</span>
            <strong>รายการผู้ใช้งาน</strong>
        </span>
    </nav>


    <div class="cui-utils-content">
        <!-- START: tables/basic-tables -->
        <section class="card">
            <div class="card-header">
                <span class="cui-utils-title">
                    <strong>
                        Your User!!
                    </strong>
                </span>
            </div>
        </section>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php endif; ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HeroTemplate\resources\views/users/index_logs.blade.php ENDPATH**/ ?>