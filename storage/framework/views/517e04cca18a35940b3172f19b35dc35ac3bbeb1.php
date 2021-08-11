<?php $__env->startSection('content'); ?>

<div class="card text-center">
    <h5 class="card-header">Prestador: <?php echo e($employee->name); ?></h5>
    <div class="card-body">
      <h5 class="card-title">Email: <?php echo e($employee->email); ?></h5>
      <p class="card-text">A quantidade de horas de <?php echo e($employee->name); ?> no periodo da <?php echo e($employee->start); ?> é de <?php echo e($employee->hours); ?> horas</p>
      <form action="<?php echo e(route('employees.destroy', $employee->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button class="btn btn-danger">Apagar</button><br/><br/>
    </form>
    <a href="/employee-hours/<?php echo e($employee->email); ?>"><button class="btn btn-primary">Ver o total de horas de <?php echo e($employee->name); ?></button></a>
    <a href="/employees" class="back"><button class="btn btn-primary">Ver lista de prestadores</button></a>
    </div>
    <div class="card-footer text-muted">
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elizeu\projetos\interdash\resources\views/employees/show.blade.php ENDPATH**/ ?>