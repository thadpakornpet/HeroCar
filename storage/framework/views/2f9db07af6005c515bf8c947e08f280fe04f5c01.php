<?php $__env->startSection('content'); ?>
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted"><?php echo app('translator')->getFromJson('logs.home'); ?> ·</span>
            <strong><?php echo app('translator')->getFromJson('logs.description'); ?></strong>
        </span>
    </nav>
    <?php echo $__env->make('errors._list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="cui-utils-content">
        <!-- START: apps/profile -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="width-100 text-center pull-right hidden-md-down">
                            <h2><a class="btn btn-info btn-sm pull-right" href="<?php echo route('users.index'); ?>"><i class="fa fa-arrow-left"></i>&nbsp;<?php echo app('translator')->getFromJson('logs.back'); ?></a></h2>
                        </div>
                        <h2>
                            <span class="text-black">
                                <strong><?php echo e($user->name); ?></strong>
                            </span>
                            <small class="text-muted"><?php echo e($user->typeofuser_1->name); ?></small>
                        </h2>
                        <p class="mb-1"><?php echo e($user->email); ?></p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3 text-black">
                            <strong><?php echo app('translator')->getFromJson('logs.information'); ?></strong>
                        </h5>
                        <dl class="row">
                                    <dt class="col-xl-1"></dt>
                                    <dt class="col-xl-2"><?php echo app('translator')->getFromJson('logs.phone'); ?></dt>
                                    <dd class="col-xl-3">
                                        <span class="badge badge-default"><?php echo e($user->phone1); ?></span>
                                        <span class="badge badge-default"><?php echo e($user->phone2); ?></span>
                                    </dd>
                                    <dt class="col-xl-1"></dt>
                                    <dt class="col-xl-2"><?php echo app('translator')->getFromJson('logs.address'); ?>#1</dt>
                                    <dd class="col-xl-3">
                                        <?php echo e($user->address1); ?> <?php echo e($user->road1); ?> <?php echo e($user['subdistrict1']); ?> <?php echo e($user['district1']); ?> <?php echo e($user->province1); ?> <?php echo e($user->zipcode1); ?>

                                    </dd>
                                    
                                    <dt class="col-xl-1"></dt>
                                    <dt class="col-xl-2"><?php echo app('translator')->getFromJson('logs.provider'); ?></dt>
                                    <dd class="col-xl-3"><?php echo e($user->typeuser); ?></dd>
                                    
                                    <dt class="col-xl-1"></dt>
                                    <dt class="col-xl-2"><?php echo app('translator')->getFromJson('logs.address'); ?>#2</dt>
                                    <dd class="col-xl-3">
                                        <?php echo e($user->address2); ?> <?php echo e($user->road2); ?> <?php echo e($user['subdistrict2']); ?> <?php echo e($user['district2']); ?> <?php echo e($user->province2); ?> <?php echo e($user->zipcode2); ?>

                                    </dd>

                                    
                                    <dt class="col-xl-1"></dt>
                                    <dt class="col-xl-2"><?php echo app('translator')->getFromJson('logs.invite'); ?></dt>
                                    <dd class="col-xl-3"><?php echo e($user->invite); ?></dd>
                                    
                                    <dt class="col-xl-1"></dt>
                                    <dt class="col-xl-2"><?php echo app('translator')->getFromJson('logs.register'); ?></dt>
                                    <dd class="col-xl-3"><?php echo e($user->register); ?></dd>
        
                                    <dt class="col-xl-1"></dt>
                                    <dt class="col-xl-2"><?php echo app('translator')->getFromJson('logs.createat'); ?></dt>
                                    <dd class="col-xl-3"><?php echo e($user->created_at); ?></dd>
                                    <dt class="col-xl-1"></dt>
                                    <dt class="col-xl-2"><?php echo app('translator')->getFromJson('logs.updateat'); ?></dt>
                                    <dd class="col-xl-3"><?php echo e($user->updated_at); ?></dd>
                            
                        </dl>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="width-150" width="20%"><?php echo app('translator')->getFromJson('mails.to'); ?></th>
                                    <th  width="20%"><?php echo app('translator')->getFromJson('mails.subject'); ?></th>
                                    <th  width="20%"><?php echo app('translator')->getFromJson('mails.description'); ?></th>
                                    <th class="no-sort width-10"  width="5%"></th>
                                    <th class="no-sort width-50"  width="10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($mails)): ?>
                                <?php $__currentLoopData = $mails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($mail->toemail); ?></td>
                                    <td><?php echo e($mail->title); ?></td>
                                    <td><?php echo e($mail->remark); ?></td>
                                    <td><?php if($mail->attachment): ?><a href="<?php echo e(url('/mails/getDownload/'.$mail->attachment)); ?>"><i class="icmn-attachment text-default"></i></a><?php endif; ?></td>
                                    <td><?php echo e($mail->created_at); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th><?php echo app('translator')->getFromJson('mails.to'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('mails.subject'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('mails.description'); ?></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: apps/profile -->
    </div>
</div>

<script>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\educationhero\resources\views/users/show.blade.php ENDPATH**/ ?>