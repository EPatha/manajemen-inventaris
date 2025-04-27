<?php $__env->startSection('title', 'Items List'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Items</h1>
        <a href="<?php echo e(route('items.create')); ?>" class="btn btn-primary mb-3">Add New Item</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Supplier</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->id); ?></td>
                        <td><?php echo e($item->name); ?></td>
                        <td><?php echo e($item->description); ?></td>
                        <td><?php echo e($item->price); ?></td>
                        <td><?php echo e($item->quantity); ?></td>
                        <td><?php echo e($item->category ? $item->category->name : 'No Category'); ?></td>
                        <td><?php echo e($item->supplier ? $item->supplier->name : 'No Supplier'); ?></td>
                        <td>
                            <a href="<?php echo e(route('items.edit', $item->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="<?php echo e(route('items.destroy', $item->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/ep/manajemen-inventaris/resources/views/items/index.blade.php ENDPATH**/ ?>