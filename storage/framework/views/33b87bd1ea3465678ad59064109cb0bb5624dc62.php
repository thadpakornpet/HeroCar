<?php $__env->startSection('style'); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
<?php $__env->stopSection(); ?>
<form action="<?php echo e(url('/sold')); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="modal-content">
        <div class="modal-header">
            <h4><?php echo app('translator')->getFromJson('sold.addsold'); ?></h4>
        </div>
        <div class="modal-body">
            <fieldset class="border p-4">
                <legend class="w-auto"><?php echo app('translator')->getFromJson('sold.about'); ?></legend>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label><?php echo app('translator')->getFromJson('sold.make'); ?> :</label>
                            <select class="form-control" name="makeid" required style="font-family: 'Pridi', serif;" onchange="infomodel(this.value);">
                                <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                                <?php $__currentLoopData = $makes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $make): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($make->id); ?>,<?php echo e($make->country_id); ?>"><?php echo e($make->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label><?php echo app('translator')->getFromJson('sold.model'); ?> :</label>
                            <select class="form-control" name="modelid" required style="font-family: 'Pridi', serif;" id="model" onchange="infobodytype(this.value);">
                                <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label><?php echo app('translator')->getFromJson('sold.country'); ?> :</label>
                            <select class="form-control" name="countryid" required style="font-family: 'Pridi', serif;" id="country">
                                <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label><?php echo app('translator')->getFromJson('sold.body'); ?> :</label>
                            <select class="form-control" name="bodyid" required style="font-family: 'Pridi', serif;" id="bodytype">
                                <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label><?php echo app('translator')->getFromJson('sold.tran'); ?> :</label>
                            <select class="form-control" name="tranid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                                <?php $__currentLoopData = $trans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tran->id); ?>"><?php echo e($tran->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label><?php echo app('translator')->getFromJson('sold.drive'); ?> :</label>
                            <select class="form-control" name="driveid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                                <?php $__currentLoopData = $drives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drive): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($drive->id); ?>"><?php echo e($drive->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label><?php echo app('translator')->getFromJson('sold.engine'); ?> :</label>
                            <select class="form-control" name="engineid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                                <?php $__currentLoopData = $engines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $engine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($engine->id); ?>"><?php echo e($engine->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label><?php echo app('translator')->getFromJson('sold.fuel'); ?> :</label>
                            <select class="form-control" name="fuelid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                                <?php $__currentLoopData = $fuels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fuel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($fuel->id); ?>"><?php echo e($fuel->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label><?php echo app('translator')->getFromJson('sold.color'); ?> :</label>
                            <select class="form-control" name="colorid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                                <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($color->id); ?>"><?php echo e($color->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label><?php echo app('translator')->getFromJson('sold.locense'); ?> :</label>
                            <input type="text" class="form-control" name="licenseno" required
                                   style="font-family: 'Pridi', serif;">
                        </div>
                        <div class="col-md-3">
                            <label><?php echo app('translator')->getFromJson('sold.year'); ?> :</label>
                            <input type="text" class="form-control" name="year" required
                                   style="font-family: 'Pridi', serif;">
                        </div>
                        <div class="col-md-3">
                            <label><?php echo app('translator')->getFromJson('sold.mile'); ?> :</label>
                            <input type="text" class="form-control" name="mile" required
                                   style="font-family: 'Pridi', serif;">
                        </div>
                        <div class="col-md-3">
                            <label><?php echo app('translator')->getFromJson('sold.price'); ?> :</label>
                            <input type="text" class="form-control" name="price" required
                                   style="font-family: 'Pridi', serif;">
                        </div>
                    </div>
                </div>
            </fieldset>
            
            <br/>
            <fieldset class="border p-4">
                <legend class="w-auto"><?php echo app('translator')->getFromJson('sold.feature'); ?></legend>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <textarea name="feature" placeholder="กรุณาระบุอุปกรณ์เสริม (หากมี)" class="form-control"
                                      rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </fieldset>

            <br/>
            <fieldset class="border p-4">
                <legend class="w-auto"><?php echo app('translator')->getFromJson('sold.note'); ?></legend>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <textarea name="note" placeholder="บันทึกข้อมูลเกี่ยวกับรายละเอียดของรถที่คุณต้องการบอกผู้ซื้อ" class="form-control"
                                      rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn width-200 btn-primary" id="submit-all">
                <i class="fa fa-send mr-2"></i> <?php echo app('translator')->getFromJson('sold.addsold'); ?>
            </button>
        </div>
    </div>
</form>
<?php $__env->startSection('script'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script>
    function preview_image()
    {
        var total_file=document.getElementById("upload_file").files.length;
        for(var i=0;i<total_file;i++)
        {
            $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"' width='150' height='150'>");
        }
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function infomodel(data) {
        var data = data.split(',');
        $.ajax({
            url: "<?php echo e(url('infosold/model')); ?>",
            data: {id:data[0],country:data[1]},
            type: 'POST',
            success: function(data) {
                console.log(data['models']);
                data['models'].forEach(function (element) {
                    $('#model').append(
                        "<option value='" + element.id + ","+ element.bodytype +"'>" + element.name + "</option>"
                    )
                });
                data['countrys'].forEach(function (element) {
                    $('#country').append(
                        "<option value='" + element.id + "'>" + element.name + "</option>"
                    )
                });
            },
            error: function (e) {
                console.log(e)
            }
        })
    }

    function infobodytype(data) {
        var data = data.split(',');
        $.ajax({
            url: "<?php echo e(url('infosold/bodytype')); ?>",
            data: {id:data[1]},
            type: 'POST',
            success: function(data) {
                data['bodytypes'].forEach(function (element) {
                    $('#bodytype').html(
                        "<option value='" + element.id + "'>" + element.name + "</option>"
                    )
                });
            },
            error: function (e) {
                console.log(e)
            }
        })
    }
</script>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\HeroCar\resources\views/sold/_form.blade.php ENDPATH**/ ?>