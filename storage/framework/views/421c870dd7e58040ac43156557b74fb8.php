<?php $__env->startSection('content'); ?>
    <h1><?php echo e(isset($category) ? 'Edit' : 'Tambah'); ?> Kategori</h1>
    <form action="<?php echo e(isset($category) ? route('categories.update', $category->id) : route('categories.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php if(isset($category)): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>
        <div class="mb-3">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name', $category->name ?? '')); ?>" required>
        </div>
        <button type="submit" class="btn btn-success"><?php echo e(isset($category) ? 'Perbarui' : 'Simpan'); ?></button>
        <a href="<?php echo e(route('categories.index')); ?>" class="btn btn-secondary">Batal</a>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/ep/manajemen-inventaris/resources/views/categories/form.blade.php ENDPATH**/ ?>