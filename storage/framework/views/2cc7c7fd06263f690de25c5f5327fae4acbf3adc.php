<?php $__env->startSection('content'); ?>
<div>
    <h1>Total de horas / Geral por Período: </h1>
    <br>

<table class="table">
    <tbody>
    <?php $__currentLoopData = $hours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $hour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td>Total de Horas da <font style="font-weight: bold">Semana <?php echo e($hour->start); ?>:</font> <font style="font-weight: bold;color:blue"><?php echo e($hour->total); ?> horas</font></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>

    <br>
    <a href="/employees"><button class="btn btn-secondary">Voltar</button></a>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elizeu\projetos\interdash\resources\views/employees/indexTotalHours.blade.php ENDPATH**/ ?>