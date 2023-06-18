

<?php $__env->startSection("main"); ?>
   <?php if(Auth::user()->roles == 'trabajador'): ?>
      <h1><?php echo app('translator')->get('app.noAcs'); ?></h1>
   <?php else: ?>
      <script>document.title = "<?php echo e(config('app.name', 'Laravel')); ?> - Crear" </script>
      <h1 class="my-5 mx-4 text-2xl"><?php echo app('translator')->get('app.frmPar'); ?></h1>
      <div class="flex items-center justify-end mr-4">
         <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" href="<?php echo e(route('parcela.listar')); ?>"> <?php echo app('translator')->get('app.bck'); ?></a>
   </div>
      <div class="flex justify-center">
         <form class="bg-red-200 rounded-lg p-5" action="<?php echo e(route("parcela.guardar")); ?>" method="post">

         <?php echo csrf_field(); ?>
         <label for="locPar"><?php echo app('translator')->get('app.Localizacion'); ?></label>
         <br/>
         <input class="mb-5" type="text" name="locPar" required />
         <br/>
         <label for="tamPar"><?php echo app('translator')->get('app.Superficie'); ?>(ha)</label>
         <br/>
         <input class="mb-5" type="number" name="tamPar" required />
         <br/>
         <label for="idCult"><?php echo app('translator')->get('app.Semilla'); ?></label>
         <br/>
         <select class="mb-5" name="idCult" id="idCult">
            <option selected disabled readonly><?php echo app('translator')->get('app.selCult'); ?></option>
         
            <script>
               $("#select").ready(function(){
                  $.ajax({
                  url: "/peti_ajax",
                  type: 'GET',
                  success: function (result) {
                     $.each(result, function(cultivo) {
                     $("#idCult").append(new Option(result[cultivo].NomCult, result[cultivo].idCult));})
                  }})
               });
            </script>
         </select>
         <br/>

         <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><?php echo app('translator')->get('app.sve'); ?></button>

         </form>
      </div>
   <?php endif; ?>
   
   <?php if($errors->any()): ?>
    <?php echo e($errors->first("numero")); ?>

   <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agroassist\resources\views/parcelas/crear.blade.php ENDPATH**/ ?>