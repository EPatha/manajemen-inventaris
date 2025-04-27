<?php $__env->startSection('content'); ?>
    <div class="container">
        <!-- Tombol Navigasi -->
        <div class="d-flex justify-content-between mb-3">
            <a href="<?php echo e(url('/')); ?>" class="btn btn-primary">Kembali ke Home</a>
            <a href="<?php echo e(route('items.index')); ?>" class="btn btn-secondary">Lihat Items</a>
            <a href="<?php echo e(route('categories.create')); ?>" class="btn btn-success">Tambah Kategori</a>
        </div>

        <h1>Daftar Kategori</h1>
        
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($category->name); ?></td>
                        <td>
                            <a href="<?php echo e(route('categories.edit', $category->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="<?php echo e(route('categories.destroy', $category->id)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/ep/manajemen-inventaris/resources/views/categories/index.blade.php ENDPATH**/ ?>