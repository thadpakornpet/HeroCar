<?php $__env->startSection('content'); ?>

<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted"><?php echo app('translator')->getFromJson('logs.home'); ?> ·</span>
            <strong><?php echo app('translator')->getFromJson('logs.auth'); ?></strong>
        </span>
    </nav>
   
    <div class="cui-utils-content">
        <!-- START: tables/basic-tables -->
        <section class="card">
                <div class="card-header">
                <span class="cui-utils-title">
                        <strong>
                                <?php echo app('translator')->getFromJson('logs.auth'); ?>
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
                                       <tr>
                                            <th>
                                                <?php echo app('translator')->getFromJson('logs.name'); ?>
                                            </th>
                                            <th>
                                                <?php echo app('translator')->getFromJson('logs.description'); ?>
                                            </th>
                                            
                                            <th>
                                                <?php echo app('translator')->getFromJson('logs.status'); ?>
                                            </th>
                                            <?php if(Auth::user()->typeofuser == 4): ?>
                                            <th class="text-center">
                                                <?php echo app('translator')->getFromJson('logs.manage'); ?>
                                            </th>
                                        </tr>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td>
                                                <?php echo e($type->name); ?>

                                            </td>
                                            <td>
                                                <?php echo $type->remark; ?>

                                            </td>
                                            
                                            <td>
                                               <?php if($type->status == 0): ?>
                                            <font color="green">Active</font>
                                                <?php endif; ?>
                                                <?php if($type->status == 1): ?>
                                                <font color="red">Inactive</font>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if(Auth::user()->typeofuser == 4): ?>
                                                <a title="แก้ไข" href="<?php echo route('type.edit',$type); ?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                                               
                                                
                                                <?php endif; ?>
                                                
                                            </td>
                                        </tr>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    ไม่มีข้อมูล
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
                        <?php echo e($types->render()); ?>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    function deleteRow(id){
        var r = confirm("คุณค้องการลบข้อมูล ?");
        if(r){
            $("#formDelete"+id).submit();
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\educationhero\resources\views/users/index_type.blade.php ENDPATH**/ ?>