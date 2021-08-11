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
    <h1>Cadastrar Novo Prestador de Serviço</h1>
    <form  action="/providers" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="name">Nome</label>
            <input class="form-control" type="text" name="name" id="name" value="<?php echo e(old('name')); ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="text" name="email" id="email" value="<?php echo e(old('email')); ?>">
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input class="form-control" type="text" name="telefone" id="telefone" value="<?php echo e(old('telefone')); ?>">
        </div>
        <div class="form-group">
            <label for="cpf_cnpj">CPF / CNPJ</label>
            <input class="form-control" type="text" name="cpf_cnpj" id="cpf_cnpj" value="<?php echo e(old('cpf_cnpj')); ?>">
        </div>
        <input class="btn btn-success" type="submit" value="Cadastrar">
    </form>
    <br>
    <a href="/providers"><button class="btn btn-primary">Ver Lista de Prestadores de Serviços</button></a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elizeu\projetos\interdash\resources\views/providers/create.blade.php ENDPATH**/ ?>