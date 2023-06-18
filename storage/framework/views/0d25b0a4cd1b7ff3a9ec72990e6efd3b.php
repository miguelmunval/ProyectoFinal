

<?php $__env->startSection("main"); ?>
   <script>document.title = "<?php echo e(config('app.name', 'Laravel')); ?> - Editar" </script>
   <div class="pull-left">
      <h1 class="my-5 mx-4 text-2xl">Formulario para editar Parcela:</h1>
   </div>
   <div class="flex items-center justify-end mr-4">
      <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" href="<?php echo e(route('parcela.listar')); ?>"> @lang('app.bck')</a>
   </div>
   <div class="flex justify-center">
      <form class="bg-red-200 rounded-lg p-5" action="<?php echo e(route("parcela.actualizar", $parcelaEditar->idPar)); ?>" method="post">

      <?php echo csrf_field(); ?>

      <label for="locPar">Localización del Parcela</label>
      <br/>
      <input class="mb-5" type="text" name="locPar" value="<?php echo e($parcelaEditar->locPar); ?>" required />
      <br/>
      <label for="tamPar">Tamaño del Parcela</label>
      <br/>
      <input class="mb-5" type="number" name="tamPar" value="<?php echo e($parcelaEditar->tamPar); ?>" required />
      <br/>
      <label for="semPar">Semilla del Parcela</label>
      <br/>
      <select class="mb-5" name="idCult" id="idCult">
         <option id="selected" selected disabled readonly></option>
         <script>
            $("#idCult").ready(function(){
               $.ajax({
               url: "/petiById/"+ <?php echo e($parcelaEditar->idCult); ?>,
               type: 'GET',
               success: function (result) {
                  $('#selected').html(result.NomCult)
               }})
            });

            $("#idCult").ready(function(){
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
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">@lang('app.btn_actualizar')</button>

      </form>
   </div>
   
   <?php if($errors->any()): ?>
    <?php echo e($errors->first("numero")); ?>

   <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agroassist\resources\views/parcelas/editar.blade.php ENDPATH**/ ?>