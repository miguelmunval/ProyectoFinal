

<?php $__env->startSection("main"); ?>

   <div class="flex justify-center">
      <form class="bg-red-200 rounded-lg p-5" action="<?php echo e(route("parcela.actualizar", $parcelaEditar->idPar)); ?>" method="post">

      <?php echo csrf_field(); ?>

      <label for="locTer">Localización del Parcela</label>
      <br/>
      <input class="mb-5" type="text" name="locTer" value="<?php echo e($parcelaEditar->locTer); ?>" required />
      <br/>
      <label for="tamTer">Tamaño del Parcela</label>
      <br/>
      <input class="mb-5" type="number" name="tamTer" value="<?php echo e($parcelaEditar->tamTer); ?>" required />
      <br/>
      <label for="semTer">Semilla del Parcela</label>
      <br/>
      <input class="mb-5" type="text" name="semTer" value="<?php echo e($parcelaEditar->semTer); ?>" />
      <br/>
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualizar</button>

      </form>
   </div>
   
   <?php if($errors->any()): ?>
    <?php echo e($errors->first("numero")); ?>

   <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agroassist\resources\views/parcelas/editar.blade.php ENDPATH**/ ?>