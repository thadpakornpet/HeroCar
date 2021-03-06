<?php $__env->startSection('content'); ?>
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <!-- <span class="text-muted">Home ·</span> -->
            <span class="text-muted"><?php echo app('translator')->getFromJson('country.home'); ?> ·</span>

            <strong><?php echo app('translator')->getFromJson('country.country'); ?></strong>

        </span>
    </nav>

    <div class="cui-utils-content">
        <!-- START: tables/basic-tables -->
        <section class="card">
            <div class="card-header">
                <span class="cui-utils-title">
                    <strong>
                        <?php if(count($users)>0): ?>
                        <?php echo app('translator')->getFromJson('country.list'); ?>

                        <?php echo e(($users->currentPage() - 1) * 20 + 1); ?> -
                        <?php echo e(min( $users->total(), $users->currentPage() * 20)); ?>

                        <?php echo app('translator')->getFromJson('country.form'); ?>

                        <?php echo e($users->total()); ?>

                        <?php else: ?>
                        <?php echo app('translator')->getFromJson('country.countryList'); ?>

                        <?php endif; ?>
                    </strong>
                </span>

                <?php if(auth()->check() && auth()->user()->hasRole('super')): ?>

                <a href="" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#createcountry">&nbsp;<?php echo app('translator')->getFromJson('country.add'); ?></a>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-5">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                        <?php echo app('translator')->getFromJson('country.fullname'); ?>

                                        </th>
                                        <th>
                                        <?php echo app('translator')->getFromJson('country.shotname'); ?>

                                        </th>
                                        <?php if(auth()->check() && auth()->user()->hasRole('super')): ?>
                                        <th class="text-center">
                                        <?php echo app('translator')->getFromJson('country.manage'); ?>

                                        </th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <?php echo e(str_replace('ประเทศ', '', $user->name)); ?>

                                        </td>
                                        <td>
                                            <?php echo $user->name_short; ?>

                                        </td>
                                        <td class="text-center">
                                            <?php if(auth()->check() && auth()->user()->hasRole('super')): ?>
                                            <a title="แก้ไข" href="<?php echo e(url('tables/country/'.$user->id.'/edit')); ?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>

                                            <a title="ลบ" onclick="deleteRow('<?php echo $user->id; ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            <?php endif; ?>
                                        <form method="POST" class="hidden" id="formDelete<?php echo $user->id; ?>" action="<?php echo e(url('tables/country/delete')); ?>">
                                                <?php echo csrf_field(); ?>

                                                <input type="hidden" value="<?php echo e($user->id); ?>" name="id">
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="5" class="text-center">
                                        <?php echo app('translator')->getFromJson('country.error'); ?>

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

<div class="modal fade modal-size-large" id="createcountry" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
<form action="<?php echo e(url('country/create')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="modal-content">
            <div class="modal-header">
                <h4><?php echo app('translator')->getFromJson('country.create'); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" style="font-family: 'Pridi', serif;" placeholder="<?php echo app('translator')->getFromJson('country.fullname'); ?>" name="name" required/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" style="font-family: 'Pridi', serif;" placeholder="<?php echo app('translator')->getFromJson('country.shotname'); ?>" name="name_short" required/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn width-200 btn-primary">
                    <i class="fa fa-send mr-2"></i><?php echo app('translator')->getFromJson('country.submit'); ?>
                </button>
            </div>
        </div>
    </form>
</div>
</div>

<script>
    function deleteRow(id) {
        var r = confirm("<?php echo app('translator')->getFromJson('country.confirm'); ?>?");
        if (r) {
            $("#formDelete" + id).submit();
        }
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HeroCar\resources\views/tables/country.blade.php ENDPATH**/ ?>