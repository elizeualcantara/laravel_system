<?php $__env->startSection('content'); ?>

<?php if(session('mssg') !=""): ?>
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong><?php echo e(session('mssg')); ?></strong>
</div>
<?php endif; ?>

<h1>Prestadores de Serviços</h1>

<p>
    <a class="btn btn-sm btn-primary" href="/providers/create"><span class="glyphicon glyphicon-plus"></span> Cadastrar Prestador de Serviço</a>
</p>

<table class="table table-bordered table-hover">
    <thead>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Telefone</th>
            <th scope="col">CPF / CNPJ</th>
            <th scope="col">Ações</th>
    </thead>
    <tbody>
        <?php if($providers->count() == 0): ?>
        <tr>
            <td colspan="5">Sem Prestadores de Serviços cadastrados.</td>
        </tr>
        <?php endif; ?>

        <?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th scope="row"><?php echo e($key+1); ?></th>
            <td><?php echo e($provider->name); ?></td>
            <td><?php echo e($provider->email); ?></td>
            <td><?php echo e($provider->telefone); ?></td>
            <td><?php echo e($provider->cpf_cnpj); ?></td>
            <td>
                <a href="/providers/<?php echo e($provider->id); ?>"><button class="btn btn-sm btn-primary">Ver Cadastro</button></a>
                <a href="/employee-hours/<?php echo e($provider->id); ?>"><button class="btn btn-sm btn-primary">Relação de horas</button></a>
                <a href="/employees/create/<?php echo e($provider->id); ?>"><button class="btn btn-sm btn-success">Lançar Horas</button></a>

                <a class="btn btn-sm btn-success" href="<?php echo e(route('providers.show', $provider->id)); ?>">Edit</a>

                <form style="display:inline-block" action="<?php echo e(route('providers.destroy', $provider->id)); ?>" method="POST">
                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                    <button class="btn btn-sm btn-danger"> Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php echo e($providers->links()); ?>


<p>
    Mostrando <?php echo e($providers->count()); ?> de <?php echo e($providers->total()); ?> prestador(es).
</p>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elizeu\projetos\interdash\resources\views/providers/index-paging.blade.php ENDPATH**/ ?>