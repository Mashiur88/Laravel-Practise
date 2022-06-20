<?php
$st1 = ($status == '1') ? 'Active' : 'Inactive';
$st2 = ($status == '1') ? 'Inactive' : 'Active';
?>
<?php if($btn == '1'): ?> 
    <button class="btn btn-primary" onclick="changeStatus(<?php echo e($id); ?>,<?php echo e($status); ?>)"><?php echo e($st2); ?></button>
<?php else: ?>
    <?php echo $st1; ?>
<?php endif; ?>


<?php /**PATH D:\xampp 7.4.1\htdocs\Swapnoloke_Mashiur\Laravel-Practise\Mashiur_laravel\resources\views/changStat.blade.php ENDPATH**/ ?>