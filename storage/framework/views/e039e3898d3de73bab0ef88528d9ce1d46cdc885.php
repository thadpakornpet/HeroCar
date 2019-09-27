<?php if( $errors->any()): ?>
	
	<script>
			$.notify(
				 {
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				   message: "<?php echo e($error); ?>",
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				 },
				 {
				   type: "secondary",
				 },
			   )
			</script>
<?php endif; ?>
 <?php if(session('success')): ?>
	 
	 <script>
	 $.notify(
          {
            message: '<?php echo session("success"); ?>',
          },
          {
            type: 'success',
          },
        )
	 </script>
 <?php elseif(session('warning')): ?>
	 
	 <script>
			$.notify(
				 {
				   message: '<?php echo session("warning"); ?>',
				 },
				 {
				   type: 'warning',
				 },
			   )
			</script>
 <?php elseif(session('error')): ?>
	 
	 <script>
			$.notify(
				 {
				   message: "<?php echo session('error'); ?>",
				 },
				 {
				   type: "danger",
				 },
			   )
			</script>
 <?php elseif(session('status')): ?>
	 
	 <script>
			$.notify(
				 {
				   message: "<?php echo session('status'); ?>",
				 },
				 {
				   type: "info",
				 },
			   )
			</script>
 <?php endif; ?><?php /**PATH C:\xampp\htdocs\HeroTemplate\resources\views/errors/_list.blade.php ENDPATH**/ ?>