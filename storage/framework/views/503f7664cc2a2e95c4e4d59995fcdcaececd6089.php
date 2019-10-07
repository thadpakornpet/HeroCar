<?php $__env->startSection('content'); ?>
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
      <span class="font-size-18 d-block">
        <span class="text-muted"><?php echo app('translator')->getFromJson('logs.home'); ?> ·</span>
        <strong><?php echo app('translator')->getFromJson('master.calendar'); ?></strong>
      </span>
    </nav>

    <div class="cui-utils-content">
      <!-- START: apps/calendar -->
<section class="card">
<div class="card-header">
<div class="pull-right">
  <div class="dropdown mt-2 d-inline-block">
    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createtask">
      <i class="icmn-database mr-2"></i>
        <?php echo app('translator')->getFromJson('logs.create'); ?>
    </a>
  </div>
</div>
</div>
<div class="card-body">
<div class="cui-apps-calendar" id="cui-apps-calendar"></div>
</div>
</section>
<!-- END: apps/calendar -->
<div class="modal fade" id="createtask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="form-validation" name="form-validation" method="POST" action="<?php echo e(route('tasks.store')); ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong><?php echo app('translator')->getFromJson('master.titlecalendar'); ?></strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <label for="name" class="col-md-2 control-label"><?php echo app('translator')->getFromJson('master.namecalendar'); ?></label>

                                <div class="col-md-10">
                                    <input id="name" type="text" style="font-family: 'Pridi', serif;" class="form-control" name="name" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-2 control-label"><?php echo app('translator')->getFromJson('master.taskdescription'); ?></label>

                                <div class="col-md-10">
                                    <textarea class="form-control" style="font-family: 'Pridi', serif;" name="description"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-2 control-label"><?php echo app('translator')->getFromJson('master.taskdate'); ?></label>

                                <div class="col-md-10">
                                    <input id="name" type="date" style="font-family: 'Pridi', serif;" class="form-control" name="task_date" data-date-format="yy-mm-dd" required autofocus>
                                </div>
                            </div>
                          <input type="hidden" name="userid" value="<?php echo e(Auth::user()->id); ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson('logs.create'); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- START: page scripts -->
<script>
;(function($) {
'use strict'
$(function() {
  ///////////////////////////////////////////////////
  // FULL CALENDAR
  $('.cui-apps-calendar').fullCalendar({
    //aspectRatio: 2,
    locale: '<?php echo e(app()->getLocale()); ?>',
    timezone: 'Asia/Bangkok',
    height: 800,
    html: true,
    header: {
      left: 'prev, next',
      center: 'title',
      right: 'month, agendaWeek, agendaDay',
    },
    // buttonIcons: {
    //   prev: 'none fa fa-arrow-left',
    //   next: 'none fa fa-arrow-right',
    //   prevYear: 'none fa fa-arrow-left',
    //   nextYear: 'none fa fa-arrow-right',
    // },
    editable: true,
    eventLimit: true, // allow "more" link when too many events
    viewRender: function(view, element) {
      if (!/Mobi/.test(navigator.userAgent) && jQuery().jScrollPane) {
        $('.fc-scroller').jScrollPane({
          autoReinitialise: true,
          autoReinitialiseDelay: 100,
        })
      }
    },
    events: [
        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                {
                     id : '<?php echo e($task->id); ?>',
                     description : '<?php echo e($task->description); ?> - <?php echo e($task->users->name); ?>',
                    title : '<?php echo e($task->name); ?>',
                    start : '<?php echo e($task->task_date); ?>',
                    url : '<?php echo e(route('tasks.edit', $task->id)); ?>'
                },
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    ],
    eventRender: function(event, element) {
      $(element).tooltip({title: event.description});
    },
    eventDrop:function(event){
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
     var id = event.id;
     $.ajax({
      url:"<?php echo e(url('tasks/updated')); ?>",
      type:"POST",
      data:{start:start, id:id},
      success:function()
      {
	      $.notify(
          {
            message: 'Success',
          },
          {
            type: 'success',
          },
        );
        location.reload();
      },
     });
    },
  })
})
})(jQuery)
</script>
<!-- END: page scripts -->
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HeroCar\resources\views/tasks/index.blade.php ENDPATH**/ ?>