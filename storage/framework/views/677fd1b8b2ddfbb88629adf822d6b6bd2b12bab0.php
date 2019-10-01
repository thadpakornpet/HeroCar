<?php $__env->startSection('content'); ?>
    <div class="cui-layout-content">
        <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted"><?php echo app('translator')->getFromJson('logs.home'); ?> ·</span>
            <strong><?php echo app('translator')->getFromJson('sold.home'); ?></strong>
        </span>
        </nav>

        <div class="cui-utils-content">
            <!-- START: tables/basic-tables -->
            <section class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-5">
                                <table class="table table-responsive-xl" id="example1">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th><?php echo app('translator')->getFromJson('sold.id'); ?></th>
                                        <th><?php echo app('translator')->getFromJson('sold.license'); ?></th>
                                        <th><?php echo app('translator')->getFromJson('sold.make'); ?></th>
                                        <th><?php echo app('translator')->getFromJson('sold.model'); ?></th>
                                        <th><?php echo app('translator')->getFromJson('sold.body'); ?></th>
                                        <th><?php echo app('translator')->getFromJson('sold.country'); ?></th>
                                        <th><?php echo app('translator')->getFromJson('sold.price'); ?></th>
                                        <th><?php echo app('translator')->getFromJson('sold.status'); ?></th>
                                        <th><?php echo app('translator')->getFromJson('sold.create'); ?></th>
                                        <th><?php echo app('translator')->getFromJson('sold.update'); ?></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(isset($solds)): ?>
                                        <?php $__currentLoopData = $solds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sold): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <button class="btn btn-sm btn-rounded btn-outline-primary" onclick="getinfo(<?php echo e($sold->id); ?>)";>
                                                        <?php echo app('translator')->getFromJson('sold.detail'); ?>
                                                    </button>
                                                </td>
                                                <td><?php echo e($sold->id); ?></td>
                                                <td><?php echo e($sold->licenseno); ?></td>
                                                <td><?php echo e($sold->getNameMake->name); ?></td>
                                                <td><?php echo e($sold->getNameModel->name); ?></td>
                                                <td><?php echo e($sold->getNameBodyType->name); ?></td>
                                                <td><?php if(str_replace('_', '-', app()->getLocale()) == "th"): ?> <?php echo e($sold->getNameCountry->name); ?> <?php else: ?> <?php echo e($sold->getNameCountry->name_short); ?> <?php endif; ?></td>
                                                <td><?php echo e(number_format($sold->price)); ?></td>
                                                <td>
                                                    <?php if($sold->status == 0): ?>
                                                        <button class="btn btn-warning btn-sm" style="width: 70px">Pending</button>
                                                    <?php endif; ?>
                                                    <?php if($sold->status == 1): ?>
                                                        <button class="btn btn-success btn-sm" style="width: 70px">Active</button>
                                                    <?php endif; ?>
                                                    <?php if($sold->status == 2): ?>
                                                        <button class="btn btn-primary btn-sm" style="width: 70px">Sold</button>
                                                    <?php endif; ?>
                                                    <?php if($sold->status == 3): ?>
                                                        <button class="btn btn-secondary btn-sm" style="width: 70px">Cancel</button>
                                                    <?php endif; ?>
                                                        <?php if($sold->status == 4): ?>
                                                            <button class="btn btn-danger btn-sm" style="width: 70px">Reject</button>
                                                        <?php endif; ?>
                                                </td>
                                                <td><?php echo e($sold->created_at); ?></td>
                                                <td><?php echo e($sold->updated_at); ?></td>
                                                <td>
                                                    <?php if(auth()->check() && auth()->user()->hasRole('owner')): ?>
                                                    <?php if($sold->status == 0 || $sold->status == 1): ?>
                                                        <button class="btn btn-rounded btn-sm btn-outline-secondary" onclick="soldedit(<?php echo e($sold->id); ?>);">
                                                            <?php echo app('translator')->getFromJson('sold.edit'); ?>
                                                        </button>
                                                        <button class="btn btn-rounded btn-sm btn-outline-danger"
                                                                onclick="solddelete(<?php echo e($sold->id); ?>);"><?php echo app('translator')->getFromJson('sold.delete'); ?>
                                                        </button>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if(auth()->check() && auth()->user()->hasRole('super')): ?>
                                                    <button class="btn btn-rounded btn-sm btn-outline-success" onclick="approve(<?php echo e($sold->id); ?>,1);">
                                                        <?php echo app('translator')->getFromJson('sold.approve'); ?>
                                                    </button>
                                                    <button class="btn btn-rounded btn-sm btn-outline-warning" onclick="approve(<?php echo e($sold->id); ?>,4);">
                                                        <?php echo app('translator')->getFromJson('sold.inapprove'); ?>
                                                    </button>
                                                    <button class="btn btn-rounded btn-sm btn-outline-danger"
                                                            onclick="solddelete(<?php echo e($sold->id); ?>);"><?php echo app('translator')->getFromJson('sold.delete'); ?>
                                                    </button>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        ;
        <?php if(Auth::user()->hasRole('super')): ?>
        function approve(a,b) {
            swal(
                {
                    title: '<?php echo app('translator')->getFromJson("sold.continue"); ?>?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: '<?php echo app('translator')->getFromJson("sold.confirm"); ?>',
                    cancelButtonText: '<?php echo app('translator')->getFromJson("sold.cancel"); ?>',
                    closeOnConfirm: false,
                    closeOnCancel: false,
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "<?php echo e(url('sold/approve')); ?>",
                            data: {a: a,b:b},
                            type: 'POST',
                            success: function () {
                                swal({
                                    title: '<?php echo app('translator')->getFromJson("sold.success"); ?>!',
                                    type: 'success',
                                    confirmButtonClass: 'btn-success',
                                });
                                window.location.reload();
                            },
                            error: function () {
                                swal({
                                    title: '<?php echo app('translator')->getFromJson("sold.error"); ?>',
                                    type: 'error',
                                    confirmButtonClass: 'btn-danger',
                                })
                            }
                        })
                    } else {
                        swal({
                            title: '<?php echo app('translator')->getFromJson("sold.error"); ?>',
                            type: 'error',
                            confirmButtonClass: 'btn-danger',
                        })
                    }
                },
            )
        }
        <?php endif; ?>
        ;
        function soldedit(id) {
            if(id){
                window.location = "<?php echo e(url('sold/edit')); ?>" + '/' +id;
            } else {
                swal({
                    title: '<?php echo app('translator')->getFromJson("sold.not"); ?>',
                    type: 'error',
                    confirmButtonClass: 'btn-danger',
                });
            }
        }
        ;
        function getinfo(id) {
            if(id){
                <?php if(Auth::user()->hasRole('super')): ?>
                window.open("<?php echo e(url('sold/detail')); ?>" + '/' +id, '_blank');
                <?php else: ?>
                window.location = "<?php echo e(url('sold/detail')); ?>" + '/' +id;
                <?php endif; ?>
            } else {
                swal({
                    title: '<?php echo app('translator')->getFromJson("sold.not"); ?>',
                    type: 'error',
                    confirmButtonClass: 'btn-danger',
                });
            }
        }
        ;
        function solddelete(id) {
            swal(
                {
                    title: '<?php echo app('translator')->getFromJson("sold.continue"); ?>?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: '<?php echo app('translator')->getFromJson("sold.confirm"); ?>',
                    cancelButtonText: '<?php echo app('translator')->getFromJson("sold.cancel"); ?>',
                    closeOnConfirm: false,
                    closeOnCancel: false,
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "<?php echo e(url('sold/delete')); ?>",
                            data: {id: id},
                            type: 'POST',
                            success: function () {
                                swal({
                                    title: '<?php echo app('translator')->getFromJson("sold.success"); ?>!',
                                    type: 'success',
                                    confirmButtonClass: 'btn-success',
                                });
                                window.location.reload();
                            },
                            error: function () {
                                swal({
                                    title: '<?php echo app('translator')->getFromJson("sold.error"); ?>',
                                    type: 'error',
                                    confirmButtonClass: 'btn-danger',
                                })
                            }
                        })
                    } else {
                        swal({
                            title: '<?php echo app('translator')->getFromJson("sold.not"); ?>',
                            type: 'error',
                            confirmButtonClass: 'btn-danger',
                        })
                    }
                },
            )
        }
        ;
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
                "oPaginate": {
                    "sFirst": "หน้าแรก",
                    "sPrevious": "ก่อนหน้า",
                    "sNext": "ถัดไป",
                    "sLast": "หน้าสุดท้าย"
                }
            }
            <?php endif; ?>
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HeroCar\resources\views/sold/list.blade.php ENDPATH**/ ?>