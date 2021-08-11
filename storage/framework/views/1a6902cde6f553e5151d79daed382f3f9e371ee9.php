<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="wrapper">
        <img src="/images/logo_front.png" alt="Intergalaxy">
        <p class="title">Bem vindo ao Sistema</p>
    </div>
    <p class="mssg"><?php echo e(session('mssg')); ?></p>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elizeu\projetos\interdash\resources\views/welcome.blade.php ENDPATH**/ ?>