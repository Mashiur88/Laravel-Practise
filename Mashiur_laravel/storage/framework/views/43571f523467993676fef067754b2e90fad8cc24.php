<?php $__env->startSection('content'); ?>
<div class="container-fluid p-0 m-0 row">
    <div class="container-fluid col-lg-10 text-center">
        <div>
            <h3>Gallery</h3>
            <form action="<?php echo e(route('upload')); ?>" method="post" enctype='multipart/form-data'>
                <?php echo csrf_field(); ?>            
                <label>Upload image here:</label><br>
                <input type="file" name="image" id="image"><br>
                <input type="submit" name="save" value="save">
            </form>
        </div>
        <div>
            <img class="img-fluid img-thumbnail shadow-lg bg-white" src="<?php echo e(asset($path)); ?>" alt="photos" width="500" height="200">
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp 7.4.1\htdocs\Swapnoloke_Mashiur\Laravel-Practise\Mashiur_laravel\resources\views/gallery.blade.php ENDPATH**/ ?>