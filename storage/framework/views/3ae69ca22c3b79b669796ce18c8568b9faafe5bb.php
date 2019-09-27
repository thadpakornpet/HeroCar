<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                        <div class="panel-heading">Create Tasks</div>
                        <div class="panel-body">
                                <form class="form-horizontal" action="<?php echo e(route('tasks.store')); ?>" method="post">
                                        <?php echo e(csrf_field()); ?>

                                        Task name:
                                        <br />
                                        <input class="form-control" type="text" name="name" />
                                        <br /><br />
                                        Task description:
                                        <br />
                                        <textarea class="form-control" name="description"></textarea>
                                        <br /><br />
                                        Start time:
                                        <br />
                                        <input type="text" name="task_date" class="date form-control" />
                                        <br /><br />
                                        <input class="btn btn-primary" type="submit" value="Save" />
                                      </form>
                        </div>
                </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd"
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\educationhero\resources\views/tasks/create.blade.php ENDPATH**/ ?>