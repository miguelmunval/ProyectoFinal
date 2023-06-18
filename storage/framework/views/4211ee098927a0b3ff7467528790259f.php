

<?php $__env->startSection('main'); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1 class="my-5 mx-4 text-2xl">Formulario para editar Objeto:</h1>
            </div>
            <div class="flex items-center justify-end mr-4">
                <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" href="<?php echo e(route('objeto.listar')); ?>"> @lang('app.bck')</a>
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
      <form class="bg-red-200 rounded-lg p-5" action="<?php echo e(route("objeto.actualizar", $objetoEditar->idObj)); ?>" method="post">
          <?php echo csrf_field(); ?>

          <div class="row">
              <div class="col-md-6">
                  <div class="form-group mb-5">
                      <label for="NomObj"><strong>@lang('app.Nombre')</strong></label>
                      <input type="text" name="NomObj" class="form-control" placeholder="Nombre" value="<?php echo e($objetoEditar->NomObj); ?>">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group mb-5">
                      <label for="DesObj"><strong>@lang('app.des')</strong></label>
                      <input type="text" class="form-control" name="DesObj" placeholder="Descripción" value="<?php echo e($objetoEditar->DesObj); ?>">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group mb-5">
                      <label for="Cantidad"><strong>Cantidad:</strong></label>
                      <input type="text" name="Cantidad" class="form-control" placeholder="Temporada de siembra" value="<?php echo e($objetoEditar->Cantidad); ?>">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group mb-5">
                      <label for="Precio"><strong>Precio:</strong></label>
                      <input type="text" name="EstCos" class="form-control" placeholder="Precio" value="<?php echo e($objetoEditar->Precio); ?>">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group mb-5">
                      <label for="FechComp"><strong>Fecha de Compra:</strong></label>
                      <input type="text" name="FechComp" class="form-control" placeholder="Fecha de Compra:" value="<?php echo e($objetoEditar->FechComp); ?>">
                  </div>
              </div>
              <div class="col-md-12 text-center">
				        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">@lang('app.sve')</button>
              </div>
          </div>
      </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agroassist\resources\views/objetos/editar.blade.php ENDPATH**/ ?>