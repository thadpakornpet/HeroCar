<?php $__env->startSection('style'); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
<?php $__env->stopSection(); ?>

    <div class="modal-content">
        <div class="modal-header">
            <h4><?php echo app('translator')->getFromJson('sold.addsold'); ?></h4>
        </div>
        <div class="modal-body">
            <legend class="w-auto"><?php echo app('translator')->getFromJson('sold.img'); ?></legend>
            <form method="post" action="<?php echo e(url('sold/image')); ?>" enctype="multipart/form-data" class="dropzone" id="dropzone">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo e($id); ?>">
            </form>
        </div>
    </div>

<?php $__env->startSection('script'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script type="text/javascript">
        Dropzone.options.dropzone =
            {
                maxFilesize: 12,
                renameFile: function(file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time+file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 5000,
                removedfile: function(file)
                {
                    var name = file.upload.filename;
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: '<?php echo e(url("sold/image/delete")); ?>',
                        data: {filename: name},
                        success: function (data){
                            console.log("File has been successfully removed!!");
                        },
                        error: function(e) {
                            console.log(e);
                        }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },
                success: function(file, response)
                {
                    console.log(response);
                },
                error: function(file, response)
                {
                    return false;
                }
            };
    </script>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\HeroCar\resources\views/sold/_img.blade.php ENDPATH**/ ?>