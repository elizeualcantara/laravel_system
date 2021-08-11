<?php $__env->startSection('content'); ?>

<?php if(session('mssg') !=""): ?>
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong><?php echo e(session('mssg')); ?></strong>
</div>
<?php endif; ?>

<div class="card text-center">
    <h5 class="card-header"><b>Relatórios Gerais</b></h5>
    <div class="card-body">

    <a href="/providers" class="back"><button class="btn btn-sm btn-primary">Ver lista de Prestadores de Serviços</button></a>
    <br><br>
    <a href="/employees" class="back"><button class="btn btn-sm btn-primary">Ver a Relação de Horas por Prestador</button></a>
    <br><br>
    <a href="/employees" class="back"><button class="btn btn-sm btn-primary">Ver a Relação de Horas por Prestador por Período</button></a> (Escolher o Prestador de Serviços e clicar em <button class="btn btn-sm btn-primary" disabled>Relação de Horas</button>
    <br><br>
    <a href="/employees/hours" class="back"><button class="btn btn-sm btn-primary">Total de horas Geral por Período</button></a>
    <br><br>
    <a href="/employees" class="back"><button class="btn btn-sm btn-primary">Ver a Relação de Horas Lançadas</button></a>

    </div>
    <div class="card-footer text-muted">
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elizeu\projetos\interdash\resources\views/providers/reports.blade.php ENDPATH**/ ?>