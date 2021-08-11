
<div>
    <h2>
        RECIBO DE HORAS TRABALHADAS / <?php echo e($employee->first()->name); ?>

    </h2>
    <h3>
        Total de horas lançadas : <?php echo e($count); ?> horas
    </h3>
    <br>
    <hr>
    <br>
<table class="table" border=1 cellpadding=10 cellspacing=0>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Período</th>
        <th scope="col">Horas</th>
      </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <th scope="row"><?php echo e($key+1); ?></th>
        <td>Semana <?php echo e($item->start); ?></td>
        <td><?php echo e($item->hours); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
    <br>
    <hr>
    <br>
    <h4>
        Emitido em <?php echo e(\Carbon\Carbon::now()->format('d/m/Y H:i:s')); ?>

    </h4>
</div>
<?php /**PATH C:\Users\Elizeu\projetos\interdash\resources\views/employees/createPDF.blade.php ENDPATH**/ ?>