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
    <h1>Lançar horas</h1>
    <br>
    <form  action="/employees" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="name">Selecione o Prestador de Serviço</label>
            <select class="form-control" name="provider_id" id="provider_id">
                    <?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($provider->id); ?>"><?php echo e($provider->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
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
    <a href="/employees"><button class="btn btn-primary">Ver a Relação de horas</button></a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elizeu\projetos\interdash\resources\views/employees/create.blade.php ENDPATH**/ ?>