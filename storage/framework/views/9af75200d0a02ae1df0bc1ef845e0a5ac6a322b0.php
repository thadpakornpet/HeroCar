<?php $__env->startSection('content'); ?>
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted"><?php echo app('translator')->getFromJson('logs.home'); ?> ·</span>
            <strong><?php echo app('translator')->getFromJson('master.calendar'); ?></strong>
        </span>
    </nav>

    <div class="cui-utils-content">
        <!-- START: tables/basic-tables -->
        <section class="card">
            <div class="card-header">
                <span class="cui-utils-title">
                    <strong>
                        <i class="fa fa-calendar">&nbsp;<?php echo app('translator')->getFromJson('master.calendar'); ?></i>
                    </strong>
                </span>
                <a class="btn btn-info btn-sm pull-right" href="<?php echo route('tasks.index'); ?>"><i class="fa fa-arrow-left"></i>&nbsp;<?php echo app('translator')->getFromJson('logs.back'); ?></a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form class="form-horizontal" action="<?php echo e(route('tasks.update',$task)); ?>" method="post">
                            <?php echo e(method_field('PUT')); ?>

                                    <?php echo e(csrf_field()); ?>

                                    Task name:
                                    <br />
                                    <input class="form-control" style="font-family: 'Pridi', serif;" type="text" name="name" value="<?php echo e($task->name); ?>" />
                                    <br /><br />
                                    Task description:
                                    <br />
                                    <textarea class="form-control" style="font-family: 'Pridi', serif;" name="description"><?php echo e($task->description); ?></textarea>
                                    <br /><br />
                                    <!-- Start time:
                                    <br />
                                    <input type="text" name="task_date" class="date form-control"  value="<?php echo e($task->task_date); ?>" />
                                    <br /><br /> -->
                                    <input class="btn btn-primary" type="submit" value="Save" />
                                    <input class="btn btn-danger" type="button" onclick="deleteRow('<?php echo $task->id; ?>')" value="Delete" />



                            </form>
                            <form method="POST" class="hidden" id="formDelete<?php echo $task->id; ?>" action="<?php echo route('tasks.destroy',$task->id); ?>">
                                                <?php echo csrf_field(); ?>

                                                <?php echo e(method_field('DELETE')); ?>

                                    </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    function deleteRow(id){
        var r = confirm("คุณค้องการลบข้อมูล ?"+id);
        if(r){
            $("#formDelete"+id).submit();
        }
    }
</script>
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd"
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HeroCar\resources\views/tasks/edit.blade.php ENDPATH**/ ?>