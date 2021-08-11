<?php $__env->startSection('content'); ?>
<div>
    <h1>Horas geral por período</h1>
    <br>
    <h3>O total de horas no período da <span style="font-weight: 900;">Semana <?php echo e($allPeriods->first()->start); ?></span> é de: <span style="font-weight: 900;"><?php echo e($count); ?> horas</span></h3>
    <br>
    <a href="/employees/hours"><button class="btn btn-secondary">Voltar</button></a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elizeu\projetos\interdash\resources\views/employees/showHoursPerPeriod.blade.php ENDPATH**/ ?>