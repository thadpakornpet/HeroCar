<form action="<?php echo e(url('/sold')); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="modal-content">
        <div class="modal-header">
            <h4>ประกาศขายรถ</h4>
        </div>
        <div class="modal-body">
            <fieldset class="border p-4">
                <legend class="w-auto">เกี่ยวกับรถ</legend>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>ยี่ห้อ :</label>
                            <select class="form-control" name="makeid" required style="font-family: 'Pridi', serif;" onchange="infomodel(this.value);">
                                <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                                <?php $__currentLoopData = $makes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $make): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($make->id); ?>,<?php echo e($make->country_id); ?>"><?php echo e($make->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>รุ่นรถ :</label>
                            <select class="form-control" name="modelid" required style="font-family: 'Pridi', serif;" id="model" onblur="infobodytype(this.value);">
                                <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>ประเทศผลิต :</label>
                            <select class="form-control" name="countryid" required style="font-family: 'Pridi', serif;" id="country">
                                <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
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
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>ระบบเกียร์ :</label>
                            <select class="form-control" name="tranid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                                <?php $__currentLoopData = $trans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tran->id); ?>"><?php echo e($tran->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>ขับเคลื่อน :</label>
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
                            <label>เครื่องยนต์ :</label>
                            <select class="form-control" name="engineid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                                <?php $__currentLoopData = $engines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $engine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($engine->id); ?>"><?php echo e($engine->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>เชื้อเพลิง :</label>
                            <select class="form-control" name="fuelid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                                <?php $__currentLoopData = $fuels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fuel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($fuel->id); ?>"><?php echo e($fuel->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>สี :</label>
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
                            <label>ทะเบียนรถ :</label>
                            <input type="text" class="form-control" name="licenseno" required
                                   style="font-family: 'Pridi', serif;">
                        </div>
                        <div class="col-md-3">
                            <label>ปีรถ :</label>
                            <input type="text" class="form-control" name="year" required
                                   style="font-family: 'Pridi', serif;">
                        </div>
                        <div class="col-md-3">
                            <label>ระยะไมล์ :</label>
                            <input type="text" class="form-control" name="mile" required
                                   style="font-family: 'Pridi', serif;">
                        </div>
                        <div class="col-md-3">
                            <label>ราคา :</label>
                            <input type="text" class="form-control" name="price" required
                                   style="font-family: 'Pridi', serif;">
                        </div>
                    </div>
                </div>
            </fieldset>

            <br/>
            <fieldset class="border p-4">
                <legend class="w-auto">รูปภาพของรถ</legend>
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
                                      rows="5"></textarea>
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
                                      rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn width-200 btn-primary" id="submit-all">
                <i class="fa fa-send mr-2"></i> ลงทะเบียนประกาศ
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
                data['models'].forEach(function (element) {
                    $('#model').html(
                        "<option value='" + element.id + ","+ element.bodytype +"'>" + element.name + "</option>"
                    )
                });
                data['countrys'].forEach(function (element) {
                    $('#country').html(
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