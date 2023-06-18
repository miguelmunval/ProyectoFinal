

<?php $__env->startSection('main'); ?>
    <script>document.title = "<?php echo e(config('app.name', 'Laravel')); ?> - Editar" </script>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1 class="my-5 mx-4 text-2xl">Formulario para editar Cultivo:</h1>
            </div>
            <div class="flex items-center justify-end mr-4">
                <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" href="<?php echo e(route('cultivo.listar')); ?>"> @lang('app.bck')</a>
            </div>
        </div>
    </div>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <strong>¡Error!</strong> @lang('app.corrige')<br><br>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <div class="flex justify-center">
      <form class="bg-red-200 rounded-lg p-5" action="<?php echo e(route("cultivo.actualizar", $cultivoEditar->idCult)); ?>" method="post">
          <?php echo csrf_field(); ?>

          <div class="row">
              <div class="col-md-6">
                  <div class="form-group mb-5">
                      <label for="NomCult"><strong>@lang('app.Nombre')</strong></label>
                      <input type="text" name="NomCult" class="form-control" placeholder="Nombre" value="<?php echo e($cultivoEditar->NomCult); ?>">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group mb-5">
                      <label for="DesCult"><strong>@lang('app.des')</strong></label>
                      <input type="text" class="form-control" name="DesCult" placeholder="Descripción" value="<?php echo e($cultivoEditar->DesCult); ?>">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group mb-5">
                      <label for="EstSiem"><strong>Temporada de siembra:</strong></label>
                      <input type="text" name="EstSiem" class="form-control" placeholder="Temporada de siembra" value="<?php echo e($cultivoEditar->EstSiem); ?>">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group mb-5">
                      <label for="EstCos"><strong>Temporada de cosecha:</strong></label>
                      <input type="text" name="EstCos" class="form-control" placeholder="Temporada de cosecha" value="<?php echo e($cultivoEditar->EstCos); ?>">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group mb-5">
                      <label for="ZonaCult"><strong>Zona de cultivo:</strong></label>
                      <input type="text" name="ZonaCult" class="form-control" placeholder="Zona de cultivo" value="<?php echo e($cultivoEditar->ZonaCult); ?>">
                  </div>
              </div>
              <div class="col-md-12 text-center">
				        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">@lang('app.sve')</button>
              </div>
          </div>
      </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agroassist\resources\views/cultivos/editar.blade.php ENDPATH**/ ?>