<?php $__env->startSection('style'); ?>
<style>
    *[data-href] {
  cursor: pointer;
}
td a {
  display:inline-block;
  min-height:100%;
  width:100%;
  padding: 10px; /* add your padding here */
}
td {
  padding:0;
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted"><?php echo app('translator')->getFromJson('mails.home'); ?> ·</span>
            <strong><?php echo app('translator')->getFromJson('mails.hmail'); ?></strong>
        </span>
    </nav>
    <div class="cui-utils-content">

        <!-- START: apps/mail -->
        <div class="card">
            <div class="card-body">
                <table class="table table-hover nowrap" id="example1">
                    <thead>
                        <tr>
                            <th class="width-150" width="20%"><?php echo app('translator')->getFromJson('mails.to'); ?></th>
                            <th  width="20%"><?php echo app('translator')->getFromJson('mails.subject'); ?></th>
                            <th class="no-sort width-10"  width="5%"></th>
                            <th class="no-sort width-50"  width="15%"><?php echo app('translator')->getFromJson('mails.by'); ?></th>
                            <th class="no-sort width-50"  width="10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($mails)): ?>
                        <?php $__currentLoopData = $mails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-href="<?php echo e(url('mails/inbox/'.$mail->id)); ?>">
                            <td><?php echo e($mail->toemail); ?></td>
                            <td><?php echo e($mail->title); ?></td>
                            <td><?php if($mail->attachment): ?><i class="icmn-attachment text-default"></i><?php endif; ?></td>
                            <td><?php echo e($mail->users->name); ?></td>
                            <td><?php echo e($mail->created_at); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('mails.to'); ?></th>
                            <th><?php echo app('translator')->getFromJson('mails.subject'); ?></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- START: compose mail modal -->

    </div>
</div>
<!-- END: compose mail modal -->
<!-- END: apps/mail -->
<!-- START: page scripts -->
<script>

    ;
    $('*[data-href]').on("click",function(){
  window.location = $(this).data('href');
  return false;
});
$("td > a").on("click",function(e){
  e.stopPropagation();
})
            ;
    $(function () {
        $('.select2').select2()
        $('.select2-tags').select2({
            tags: true,
        })

        $('.selectpicker').selectpicker()
    })
            ;
    (function ($) {
        'use strict'
        $(function () {
            ///////////////////////////////////////////////////
            // SIDEBAR CURRENT STATE
            $('.cui-apps-messaging-tab').on('click', function () {
                $('.cui-apps-messaging-tab').removeClass('cui-apps-messaging-tab-selected')
                $(this).addClass('cui-apps-messaging-tab-selected')
            })

            ///////////////////////////////////////////////////
            // TEXT EDITOR
            $(function () {
                $('.summernote').summernote({
                    height: 200,
                })
            })

            ///////////////////////////////////////////////////
            // DATATABLES
            $('#example1').DataTable({
                responsive: true,
                order: [],
                columnDefs: [
                    {
                        targets: 'no-sort',
                        orderable: false,
                    },
                ],
                lengthMenu: [[20, 50, 100, -1], [20, 50, 100, '<?php if(str_replace('_', '-', app()->getLocale()) == "th"): ?> ทั้งหมด <?php else: ?> All <?php endif; ?>']],
                <?php if(str_replace('_', '-', app()->getLocale()) == "th"): ?>
                oLanguage: {
                    "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                    "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                    "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
                    "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                    "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
                    "sSearch": "ค้นหา :",
                    "oPaginate" : {
                        "sFirst":    "หน้าแรก",
                        "sPrevious": "ก่อนหน้า",
                        "sNext":     "ถัดไป",
                        "sLast":     "หน้าสุดท้าย"
                    }
                }
                <?php endif; ?>
            })
        })
    })(jQuery)
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HeroCar\resources\views/mails.blade.php ENDPATH**/ ?>