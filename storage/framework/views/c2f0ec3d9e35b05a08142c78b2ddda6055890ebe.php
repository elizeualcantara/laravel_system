<?php $__env->startSection('content'); ?>

<?php if(session('mssg') !=""): ?>
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong><?php echo e(session('mssg')); ?></strong>
</div>
<?php endif; ?>

<h1>Relação de Horas</h1>
<br>
<p>
    <a href="/providers"><button class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-plus"></span> Ver Relação de Prestadores</button></a>
    <a href="/employees/hours"><button class="btn btn-sm btn-primary">Total de horas por Período</button></a>
    <a href="/employees/create"><button class="btn btn-sm btn-success">Lancar horas</button></a>
    <a href="/providers/create"><button class="btn btn-sm btn-success">Cadastrar Novo Prestador de Serviço</button></a>
</p>

<script>
    function filterprovider(id)
    {
        window.location.href = "index-filtering?provider=" + id;
    }
    function filterperiod(id)
    {
        window.location.href = "index-filtering?period=" + id;
    }
</script>


<form class="form-inline" method="GET">

   <div class="form-group mb-2">
    <label for="filter" class="col-sm-2 col-form-label">Filtrar&nbsp;</label>
        <select onchange="filterprovider(this.value)">
        <option>--- Prestador de Serviço ---</option>
        <option value="">Todos</option>
        <?php $__currentLoopData = \App\Models\Provider::select('id','name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if($provider->id == Request::get('provider')): ?>
                <option selected="selected" value="<?php echo e($provider->id); ?>"><?php echo e($provider->name); ?></option>
            <?php else: ?>
                <option value="<?php echo e($provider->id); ?>"><?php echo e($provider->name); ?></option>
            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
  </div>
  <div class="form-group mb-2">

        <select onchange="filterperiod(this.value)">
        <option>--- Período ---</option>
        <option value="">Todos</option>
        <?php for($i = 1; $i <= 52; $i++): ?>

            <?php if($i == Request::get('period')): ?>
                <option selected="selected" value="<?php echo e($i); ?>">Semana <?php echo e($i); ?></option>
            <?php else: ?>
                <option  value="<?php echo e($i); ?>">Semana <?php echo e($i); ?></option>
            <?php endif; ?>

        <?php endfor; ?>
        </select>
  </div>

</form>

<table class="table table-bordered table-hover">
    <thead>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Período</th>
        <th scope="col">Horas</th>
        <th scope="col">Ações</th>
    </thead>
    <tbody>
        <?php if($hours->count() == 0): ?>
        <tr>
            <td colspan="5">Sem Horas de Serviços cadastrados.</td>
        </tr>
        <?php endif; ?>

         <?php $__currentLoopData = $hours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $hour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th scope="row"><?php echo e($key+1); ?></th>
            <td><?php echo e($hour->name); ?></td>
            <td><?php echo e($hour->email); ?></td>
            <td>Semana <?php echo e($hour->start); ?></td>
            <td><?php echo e($hour->hours); ?></td>
            <td>
                <a class="btn btn-sm btn-primary" href="/providers/<?php echo e($hour->provider_id); ?>">Ver Prestador de Serviço</a>
                <a href="/employee-hours/<?php echo e($hour->provider_id); ?>"><button class="btn btn-sm btn-primary">Relação de horas</button></a>
                <a href="/employees/create/<?php echo e($hour->provider_id); ?>"><button class="btn btn-sm btn-success">Lançar Horas</button></a>

                <form style="display:inline-block" action="<?php echo e(route('providers.destroy', $hour->provider_id)); ?>" method="POST">
                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                    <button class="btn btn-sm btn-danger"> Apagar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php echo e($hours->withQueryString()->links('pagination::bootstrap-4')); ?>


<p>
    Mostrando <?php echo e($hours->count()); ?> de <?php echo e($hours->total()); ?>

</p>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elizeu\projetos\interdash\resources\views/employees/index.blade.php ENDPATH**/ ?>