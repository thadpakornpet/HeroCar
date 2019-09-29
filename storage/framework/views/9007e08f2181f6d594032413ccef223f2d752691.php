<form action="<?php echo e(url('/sold/soldedit')); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="modal-content">
        <div class="modal-header">
            <h4>แก้ไขประกาศขายรถ</h4>
        </div>
        <div class="modal-body">
            <fieldset class="border p-4">
                <legend class="w-auto">เกี่ยวกับรถ</legend>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>ยี่ห้อ :</label>
                            <select class="form-control" name="makeid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                                <?php $__currentLoopData = $makes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $make): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($make->id); ?>" <?php if($sold->makeid == $make->id): ?> selected <?php endif; ?>><?php echo e($make->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>รุ่นรถ :</label>
                            <select class="form-control" name="modelid" required style="font-family: 'Pridi', serif;" id="model">
                                <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                                <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($model->id); ?>" <?php if($sold->modelid == $model->id): ?> selected <?php endif; ?>><?php echo e($model->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>ประเทศผลิต :</label>
                            <select class="form-control" name="countryid" required style="font-family: 'Pridi', serif;" id="country">
                                <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                                <?php $__currentLoopData = $countrys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->id); ?>" <?php if($sold->countryid == $country->id): ?> selected <?php endif; ?>><?php echo e($country->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>รูปแบบรถ :</label>
                            <select class="form-control" name="bodyid" required style="font-family: 'Pridi', serif;" id="bodytype">
                                <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                                <?php $__currentLoopData = $bodys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $body): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($body->id); ?>" <?php if($sold->bodyid == $body->id): ?> selected <?php endif; ?>><?php echo e($body->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>ระบบเกียร์ :</label>
                            <select class="form-control" name="tranid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                                <?php $__currentLoopData = $trans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tran->id); ?>" <?php if($sold->tranmisstionid == $tran->id): ?> selected <?php endif; ?>><?php echo e($tran->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>ขับเคลื่อน :</label>
                            <select class="form-control" name="driveid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                                <?php $__currentLoopData = $drives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drive): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($drive->id); ?>" <?php if($sold->drivetypeid == $drive->id): ?> selected <?php endif; ?>><?php echo e($drive->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>เครื่องยนต์ :</label>
                            <select class="form-control" name="engineid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                                <?php $__currentLoopData = $engines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $engine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($engine->id); ?>" <?php if($sold->enginetypeid == $engine->id): ?> selected <?php endif; ?>><?php echo e($engine->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>เชื้อเพลิง :</label>
                            <select class="form-control" name="fuelid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                                <?php $__currentLoopData = $fuels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fuel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($fuel->id); ?>" <?php if($sold->fueltype == $fuel->id): ?> selected <?php endif; ?>><?php echo e($fuel->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>สี :</label>
                            <select class="form-control" name="colorid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                                <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($color->id); ?>" <?php if($sold->colorid == $color->id): ?> selected <?php endif; ?>><?php echo e($color->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label>ทะเบียนรถ :</label>
                            <input type="text" class="form-control" name="licenseno" required
                                   style="font-family: 'Pridi', serif;" value="<?php echo e($sold->licenseno); ?>">
                        </div>
                        <div class="col-md-3">
                            <label>ปีรถ :</label>
                            <input type="text" class="form-control" name="year" required
                                   style="font-family: 'Pridi', serif;" value="<?php echo e($sold->year); ?>">
                        </div>
                        <div class="col-md-3">
                            <label>ระยะไมล์ :</label>
                            <input type="text" class="form-control" name="mile" required
                                   style="font-family: 'Pridi', serif;" value="<?php echo e($sold->miles); ?>">
                        </div>
                        <div class="col-md-3">
                            <label>ราคา :</label>
                            <input type="text" class="form-control" name="price" required
                                   style="font-family: 'Pridi', serif;" value="<?php echo e($sold->price); ?>">
                        </div>
                    </div>
                </div>
            </fieldset>

            <br/>
            <fieldset class="border p-4">
                <legend class="w-auto">รูปภาพของรถ</legend>
                <div class="form-group">
                    <div class="col-md-12">
                        <?php if(isset($imgs)): ?>
                            <font color="red">ลบคลิปที่รูป &nbsp;</font>
                        <?php $__currentLoopData = $imgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <img id="targetPhoto" src="<?php echo e(asset('imgcar/'.$img->image)); ?>"
                                     alt="" width="120" height="120" onclick="img(<?php echo e($img->id); ?>);"/>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="file" id="upload_file" name="upload_file[]" onchange="preview_image();" multiple/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div id="image_preview"></div>
                    </div>
                </div>
            </fieldset>

            <br/>
            <fieldset class="border p-4">
                <legend class="w-auto">เสริม</legend>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <textarea name="feature" placeholder="กรุณาระบุอุปกรณ์เสริม (หากมี)" class="form-control"
                                      rows="5"><?php if(isset($fea)): ?><?php echo e($fea->name); ?><?php endif; ?></textarea>
                        </div>
                    </div>
                </div>
            </fieldset>

            <br/>
            <fieldset class="border p-4">
                <legend class="w-auto">Note</legend>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <textarea name="note" placeholder="บันทึกข้อมูลเกี่ยวกับรายละเอียดของรถที่คุณต้องการบอกผู้ซื้อ" class="form-control"
                                      rows="5" ><?php echo e($sold->soldnote); ?></textarea>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="id" value="<?php echo e($sold->id); ?>">
            <button type="submit" class="btn width-200 btn-primary" id="submit-all">
                <i class="fa fa-send mr-2"></i> แก้ไขประกาศขายรถ
            </button>
        </div>
    </div>
</form>
<?php $__env->startSection('script'); ?>
<script>
    function preview_image()
    {
        var total_file=document.getElementById("upload_file").files.length;
        for(var i=0;i<total_file;i++)
        {
            $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"' width='150' height='150'>");
        }
    }

    function img(img) {
        swal(
            {
                title: 'คุณต้องการลบ?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn-danger',
                confirmButtonText: 'ยืนยันการลบ',
                cancelButtonText: 'ยกเลิก',
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
                        url: "<?php echo e(url('sold/deleteimg')); ?>",
                        data: {id: img},
                        type: 'POST',
                        success: function () {
                            swal({
                                title: 'ลบเรียบร้อยแล้ว!',
                                type: 'success',
                                confirmButtonClass: 'btn-success',
                            });
                            window.location.reload();
                        },
                        error: function () {
                            swal({
                                title: 'เกิดข้อผิดพลาด ไม่อนุญาตทำรายการ',
                                type: 'error',
                                confirmButtonClass: 'btn-danger',
                            })
                        }
                    })
                } else {
                    swal({
                        title: 'การลบล้มเหลว',
                        type: 'error',
                        confirmButtonClass: 'btn-danger',
                    })
                }
            },
        )
    }
</script>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\HeroCar\resources\views/sold/_edit.blade.php ENDPATH**/ ?>