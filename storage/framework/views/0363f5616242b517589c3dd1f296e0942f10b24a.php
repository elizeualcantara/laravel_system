<?php $__env->startSection('content'); ?>

<!-- display error messages -->
<?php if($errors->any()): ?>
<div class="alert alert-danger">
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>

<div>
    <h1>Lançar horas de <?php echo e($provider->name); ?></h1>
    <form  action="/employees" method="POST">
        <?php echo csrf_field(); ?>

        <input class="form-control" type="hidden" name="provider_id" id="provider_id" value="<?php echo e($provider->id); ?>">

        <div class="form-group">
            <label for="hours">Horas</label>
            <input class="form-control" type="text" name="hours" id="hours" value="<?php echo e(old('hours')); ?>">
        </div>
        <div class="form-group">
            <label for="start">De</label>
        <select class="form-control" name="start" id="start">
            <?php for($i = 1; $i <= 52; $i++): ?>
            <option  value="<?php echo e($i); ?>">Semana <?php echo e($i); ?></option>
            <?php endfor; ?>
        </select>
        </div>
        <input class="btn btn-success" type="submit" value="Lançar Horas">
    </form>
    <br>
    <a href="/employee-hours/<?php echo e($provider->id); ?>"><button class="btn btn-primary">Ver a Lista de Horas de <?php echo e($provider->name); ?></button></a>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elizeu\projetos\interdash\resources\views/employees/createProvider.blade.php ENDPATH**/ ?>