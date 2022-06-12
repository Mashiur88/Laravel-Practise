<?php if(!empty($districts)): ?> 

         <?php echo "<option value='0'>Select District</option>"; ?>
         
    <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>         
           <?php  echo "<option value=".$row['id'].">". $row['name'] ."</option>"; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        

<?php else: ?>

    echo "<option value='0'>No District Found</option>";

<?php endif; ?>
<?php /**PATH D:\xampp 7.4.1\htdocs\Swapnoloke_Mashiur\Laravel-Practise\Mashiur_laravel\resources\views/getDistrict.blade.php ENDPATH**/ ?>