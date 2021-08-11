<?php $__env->startSection('content'); ?>

<?php if(session('mssg') !=""): ?>
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong><?php echo e(session('mssg')); ?></strong>
</div>
<?php endif; ?>

<div class="card text-center">
    <h5 class="card-header"><b>Prestador de Serviço: <?php echo e($provider->name); ?></b></h5>
    <h5 class="card-header">Total de <?php echo e($count); ?> horas</h5>
    <div class="card-body">
      <h5 class="card-title">Email: <?php echo e($provider->email); ?></h5>
      <h5 class="card-title">Telefone: <?php echo e($provider->telefone); ?></h5>
      <h5 class="card-title">CPF / CNPJ: <?php echo e($provider->cpf_cnpj); ?></h5>

      <form action="<?php echo e(route('providers.destroy', $provider->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir este cadastro?')">Apagar</button><br/><br/>
    </form>

    <a href="/employees/create/<?php echo e($provider->id); ?>"><button class="btn btn-sm btn-success">Lancar horas deste Prestador de Serviço</button></a>
    <a href="/employee-hours/<?php echo e($provider->id); ?>"><button class="btn btn-sm btn-primary">Relação de horas deste Prestador de Serviço</button></a>
    <a href="/providers" class="back"><button class="btn btn-sm btn-primary">Ver lista de Prestadores de Serviços</button></a>

    </div>
    <div class="card-footer text-muted">
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elizeu\projetos\interdash\resources\views/providers/show.blade.php ENDPATH**/ ?>