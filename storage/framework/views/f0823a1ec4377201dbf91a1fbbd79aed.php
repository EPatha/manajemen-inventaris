<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h1>Welcome to the Home Page</h1>
        <p>This is the landing page of your Laravel application!</p>
        <div class="row">
            <div class="col-md-4">
                <a href="<?php echo e(route('items.index')); ?>" class="btn btn-primary btn-block">Go to Items</a>
            </div>
            <div class="col-md-4">
                <a href="<?php echo e(route('categories.index')); ?>" class="btn btn-success btn-block">Go to Categories</a>
            </div>
            <div class="col-md-4">
                <a href="<?php echo e(route('suppliers.index')); ?>" class="btn btn-warning btn-block">Go to Suppliers</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/ep/manajemen-inventaris/resources/views/home.blade.php ENDPATH**/ ?>