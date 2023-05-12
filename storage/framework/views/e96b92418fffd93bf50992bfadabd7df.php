

<?php $__env->startSection("main"); ?>
   <h1 class="my-5 mx-4 text-2xl">Formulario para añadir parcela:</h1>
   <div class="flex items-center justify-end mr-4">
      <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" href="<?php echo e(route('parcela.listar')); ?>"> Volver</a>
  </div>
   <div class="flex justify-center">
      <form class="bg-red-200 rounded-lg p-5" action="<?php echo e(route("parcela.guardar")); ?>" method="post">

      <?php echo csrf_field(); ?>
      <label for="locPar">Localización del Parcela</label>
      <br/>
      <input class="mb-5" type="text" name="locPar" required />
      <br/>
      <label for="tamPar">Tamaño del Parcela(ha)</label>
      <br/>
      <input class="mb-5" type="number" name="tamPar" required />
      <br/>
      <label for="idCult">Semilla del Parcela</label>
      <br/>
      <input class="mb-5" type="text" name="idCult" />
      <br/>

      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>

      </form>
   </div>

   <?php if($errors->any()): ?>
    <?php echo e($errors->first("numero")); ?>

   <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agroassist\resources\views/parcelas/crear.blade.php ENDPATH**/ ?>