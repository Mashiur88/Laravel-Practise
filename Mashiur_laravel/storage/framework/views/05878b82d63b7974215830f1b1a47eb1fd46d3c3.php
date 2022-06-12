<?php if(!empty($thana)): ?> 

         <?php echo "<option value='0'>Select Thana</option>"; ?>
    <?php $__currentLoopData = $thana; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
          <option value=" <?php echo e($row['id']); ?>"><?php echo e($row['name']); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>           

<?php else: ?>
    <?php echo "<option value='0'>No Thana Found</option>"; ?>
<?php endif; ?>    

<?php /**PATH D:\xampp 7.4.1\htdocs\Swapnoloke_Mashiur\Laravel-Practise\Mashiur_laravel\resources\views/getThana.blade.php ENDPATH**/ ?>