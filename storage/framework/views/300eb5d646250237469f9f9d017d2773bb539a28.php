<?php $__env->startSection('content'); ?>
    <div class="cui-layout-content">
        <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted"><?php echo app('translator')->getFromJson('logs.home'); ?> ·</span>
            <strong>ประกาศขายรถ</strong>
        </span>
        </nav>

        <div class="cui-utils-content">
            <div class="card">
                <div class="card-header">
    <span class="cui-utils-title">
      <strong>รายละเอียด
      </strong>
    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cui-ecommerce-catalog-item">
                                <div class="cui-ecommerce-catalog-item-img">
                                    <a href="javascript: void(0);">
                                        <?php if(isset($imgf)): ?>
                                        <img id="targetPhoto" src="<?php echo e(asset('imgcar/'.$imgf->image)); ?>"
                                             alt=""/>
                                        <?php endif; ?>
                                    </a>
                                </div>
                            </div>
                            <div class="cui-ecommerce-product-photos clearfix">
                                <?php if(isset($imgs)): ?>
                                    <?php $__currentLoopData = $imgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="cui-ecommerce-product-photos-item">
                                    <img src="<?php echo e(asset('imgcar/'.$img->image)); ?>" alt="" width="80" height="80"/>
                                </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <ul class="breadcrumb breadcrumb-custom">
                                <li class="breadcrumb-item">
                                    สถานะ
                                    <?php if($sold->status == 0): ?>
                                        <button class="btn btn-warning btn-sm">Pending</button>
                                    <?php endif; ?>
                                    <?php if($sold->status == 1): ?>
                                        <button class="btn btn-success btn-sm">Active</button>
                                    <?php endif; ?>
                                    <?php if($sold->status == 2): ?>
                                        <button class="btn btn-primary btn-sm">Sold</button>
                                    <?php endif; ?>
                                    <?php if($sold->status == 3): ?>
                                        <button class="btn btn-secondary btn-sm">Cancel</button>
                                    <?php endif; ?>
                                    <?php if($sold->status == 4): ?>
                                        <button class="btn btn-danger btn-sm">Reject</button>
                                    <?php endif; ?>
                                </li>
                            </ul>
                            <div class="cui-ecommerce-product-sku">
                                SOLD ID : <?php echo e($sold->id); ?>

                            </div>
                            <h4 class="cui-ecommerce-product-main-title">
                                <strong>รถ <?php echo e($sold->getNameMake->name); ?> รุ่น <?php echo e($sold->getNameModel->name); ?></strong>
                            </h4>
                            <div class="cui-ecommerce-product-price">
                                THB <?php echo e(number_format($sold->price)); ?>

                            </div>
                            <div class="cui-ecommerce-product-info">
                                <div class="nav-tabs-horizontal">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a
                                                class="nav-link active"
                                                href="javascript: void(0);"
                                                data-toggle="tab"
                                                data-target="#tab1"
                                                role="tab"
                                            >เกี่ยวกับรถ</a
                                            >
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                class="nav-link"
                                                href="javascript: void(0);"
                                                data-toggle="tab"
                                                data-target="#tab2"
                                                role="tab"
                                            >บันทึกคนขาย</a
                                            >
                                        </li>
                                        <?php if(isset($fea)): ?>
                                            <li class="nav-item">
                                                <a
                                                    class="nav-link"
                                                    href="javascript: void(0);"
                                                    data-toggle="tab"
                                                    data-target="#tab3"
                                                    role="tab"
                                                >อุปกรณ์หรืออะไหล่เสริม</a
                                                >
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                    <div class="tab-content pt-3 pb-3">
                                        <div class="tab-pane active" id="tab1">
                                            <dl class="dl-horizontal user-profile-dl">
                                                <br/>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <strong>รูปแบบรถ :</strong> <?php echo e($sold->getNameBodyType->name); ?>

                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>ประเทศ :</strong> <?php echo e($sold->getNameCountry->name); ?>

                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>ทะเบียน :</strong> <?php echo e($sold->licenseno); ?>

                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <strong>ขับเคลื่อน :</strong> <?php echo e($sold->getNameDrive->name); ?>

                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>เกียร์ :</strong> <?php echo e($sold->getNameTran->name); ?>

                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>เครื่องยนต์ :</strong> <?php echo e($sold->getNameEngine->name); ?>

                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <strong>เชื้อเพลิง :</strong> <?php echo e($sold->getNameFuel->name); ?>

                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>สี :</strong> <?php echo e($sold->getNameColor->name); ?>

                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>ปี :</strong> <?php echo e($sold->year); ?>

                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <strong>ไมล์ :</strong> <?php echo e($sold->miles); ?>

                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>ประกาศเมื่อ :</strong> <?php echo e($sold->created_at); ?>

                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>ปรับปรุงเมื่อ :</strong> <?php echo e($sold->updated_at); ?>

                                                    </div>
                                                </div>
                                            </dl>
                                        </div>
                                        <div class="tab-pane" id="tab2">
                                            <p>
                                                <?php echo e($sold->soldnote); ?>

                                            </p>
                                        </div>
                                        <?php if(isset($fea)): ?>
                                            <div class="tab-pane" id="tab3">
                                                <p>
                                                    <?php echo e($fea->name); ?>

                                                </p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- START: page scripts -->
            <script>
                ;(function ($) {
                    'use strict'
                    $(function () {
                        // Heart toggle
                        $('.cui-ecommerce-catalog-item-like').on('click', function () {
                            $(this).toggleClass('cui-ecommerce-catalog-item-like-selected')
                        })

                        // Active photo toggle
                        $('.cui-ecommerce-product-photos-item').on('click', function () {
                            $('#targetPhoto').attr(
                                'src',
                                $(this)
                                    .find('img')
                                    .attr('src'),
                            )
                            $('.cui-ecommerce-product-photos-item').removeClass(
                                'cui-ecommerce-product-photos-item-active',
                            )
                            $(this).addClass('cui-ecommerce-product-photos-item-active')
                        })

                        // Tooltip
                        $('[data-toggle=tooltip]').tooltip()

                        // Select 2
                        $('.select2').select2()
                    })
                })(jQuery)
            </script>
            <!-- END: page scripts -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HeroCar\resources\views/sold/details.blade.php ENDPATH**/ ?>