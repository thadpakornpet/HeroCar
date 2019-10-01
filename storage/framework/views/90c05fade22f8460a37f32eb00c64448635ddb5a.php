<?php $__env->startSection('content'); ?>
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted">Home ·</span>
            <strong>Body Type</strong>
        </span>
    </nav>

    <div class="cui-utils-content">
        <!-- START: tables/basic-tables -->
        <section class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-5">
                            <form action="<?php echo e(url('model/edit')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4>แก้ไขรุ่นรถ</h4>
                                    </div>
                                    <div class="modal-body">
                                            <div class="form-group">
                                                    <label>ชื่อรุ่นรถ</label>
                                            <input type="text" class="form-control" style="font-family: 'Pridi', serif;" placeholder="ชื่อรุ่นรถ" name="name" required value="<?php echo e($model->name); ?>"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>รูปแบบรภ</label>
                                                    <select name="bodytype" style="font-family: 'Pridi', serif;" class="form-control" required>
                                                            <?php $__currentLoopData = $body; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($b->id); ?>" <?php if($model->bodytype == $b->id): ?> selected <?php endif; ?>><?php echo e($b->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                </div>
                                                <div class="form-group">
                                                        <label>ยี่ห้อรถ</label>
                                                        <select name="makeid" style="font-family: 'Pridi', serif;" class="form-control" required>
                                                                <?php $__currentLoopData = $make; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($m->id); ?>" <?php if($model->makeid == $m->id): ?> selected <?php endif; ?>><?php echo e($m->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="id" value="<?php echo e($model->id); ?>">
                                        <a href="<?php echo e(url('tables/model')); ?>" class="btn width-200 btn-danger">กลับ</a>
                                        <button type="submit" class="btn width-200 btn-primary">
                                            <i class="fa fa-send mr-2"></i> บันทึก
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HeroCar\resources\views/tables/model_edit.blade.php ENDPATH**/ ?>