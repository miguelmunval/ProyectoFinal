

<?php $__env->startSection("main"); ?>
    <?php if(Auth::user()->roles == 'trabajador'): ?>
        <h1><?php echo app('translator')->get('app.noAcs'); ?></h1>
    <?php else: ?>
        <?php if(empty($datos)): ?>
            
            <?php echo app('translator')->get('app.noReg'); ?><br/>
            <?php echo app('translator')->get('app.paReg'); ?>
            <div class="flex items-center justify-end mr-4">
                <a href="<?php echo e(route("parcela.crear")); ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><?php echo app('translator')->get("app.nuevo"); ?></a>
            </div>
        <?php else: ?>
            <script>document.title = "<?php echo e(config('app.name', 'Laravel')); ?> - Parcelas" </script>
            <h6 class="my-5 mx-4 text-2xl"><?php echo app('translator')->get('app.Bienvenido'); ?> <?php echo e(Auth::user()); ?></h6>
            <div class="flex items-center justify-end mr-4">
                <a href="<?php echo e(route("parcela.crear")); ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><?php echo app('translator')->get("app.nuevo"); ?></a>
            </div>
            
            <div class="overflow-x-auto mx-4">
                <table class="text-center text-2xl m-auto mt-5 bg-red-200 rounded-lg">
                    <thead>
                        <tr>
                            <th class="px-6 py-4"><?php echo app('translator')->get("app.Localizacion"); ?></th>
                            <th class="px-6 py-4"><?php echo app('translator')->get("app.Superficie"); ?></th>
                            <th class="px-6 py-4"><?php echo app('translator')->get("app.Semilla"); ?></th>
                            <th class="px-6 py-4"><?php echo app('translator')->get("app.hist"); ?></th>
                            <th class="px-6 py-4"><?php echo app('translator')->get('app.cuaderno'); ?></th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                        {{$cont = 0;}}
                    ?>
                    <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parcela): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <tr>
                            <td class="px-6 py-4"><?php echo e($parcela->locPar); ?></td>
                            <td class="px-6 py-4"><?php echo e($parcela->tamPar); ?>ha</td>
                            <td class="px-6 py-4" id="<?php echo e($cont); ?>"></td>
                            <script>
                                $("#<?php echo e($cont); ?>").ready(function(){
                                    $.ajax({
                                    url: "/petiById/"+ <?php echo e($parcela->idCult); ?>,
                                    type: 'GET',
                                    success: function (result) {
                                        console.log(result.NomCult);
                                        $("#<?php echo e($cont); ?>").html(result.NomCult);
                                    }})
                                });
                            </script>
                            
                            <td class="px-6 py-4">
                                <a href="<?php echo e(route("parcela.Hist_Cult", $parcela->idPar)); ?>">
                                    <svg class="w-6 h-6 inline align-top" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                                        <path d="m288 144a110.94 110.94 0 0 0 -31.24 5 55.4 55.4 0 0 1 7.24 27 56 56 0 0 1 -56 56 55.4 55.4 0 0 1 -27-7.24 111.71 111.71 0 1 0 107-80.76zm284.52 97.4c-54.23-105.81-161.59-177.4-284.52-177.4s-230.32 71.64-284.52 177.41a32.35 32.35 0 0 0 0 29.19c54.23 105.81 161.59 177.4 284.52 177.4s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zm-284.52 158.6c-98.65 0-189.09-55-237.93-144 48.84-89 139.27-144 237.93-144s189.09 55 237.93 144c-48.83 89-139.27 144-237.93 144z"/>
                                    </svg>
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="<?php echo e(route("cuadernocampo.listar", $parcela->idPar)); ?>">
                                    <svg fill="#000000" class="w-6 h-6 inline align-top" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M26.536 0h-19.937c-1.438 0-2.063 1.063-2.063 2.063v3.979h-1.091c-0.541 0-0.979 0.439-0.979 0.98s0.438 0.98 0.979 0.98h1.091v4.024h-0.998c-0.541 0-0.98 0.438-0.98 0.979s0.438 0.98 0.979 0.98h0.998v4.045h-1.019c-0.541 0-0.979 0.439-0.979 0.98s0.438 0.98 0.979 0.98h1.019v4.014h-1.019c-0.541 0-0.979 0.439-0.979 0.98s0.438 0.98 0.979 0.98h1.019v4.040c0 1.657 1.298 2 2.016 2h19.985c1.657 0 3-1.343 3-3v-26c0-1.657-1.343-3-3-3zM6.535 30l-0-4.040h1.042c0.541 0 0.979-0.439 0.979-0.98s-0.438-0.98-0.979-0.98h-1.042v-4.014h1.042c0.541 0 0.979-0.439 0.979-0.98s-0.438-0.98-0.979-0.98h-1.042v-4.045h1.063c0.541 0 0.98-0.438 0.98-0.98s-0.438-0.979-0.979-0.979h-1.063v-4.024h0.97c0.541 0 0.979-0.439 0.979-0.979s-0.438-0.98-0.979-0.98h-0.97v-3.978c0-0.023 0.002-0.043 0.005-0.060 0.016-0.001 0.035-0.002 0.059-0.002h15.938v28h-16.001zM27.536 29c0 0.552-0.448 1-1 1h-2v-28h2c0.552 0 1 0.448 1 1v26z"></path>
                                    </svg>
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="<?php echo e(route("parcela.editar", $parcela->idPar)); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline align-top">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>                                    
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <a href=" <?php echo e(route("parcela.borrar", $parcela->idPar)); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline align-top">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        <?php
                            {{$cont++;}}
                        ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td colspan="7" class="text-center"><?php echo e($datos->links()); ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agroassist\resources\views/parcelas/main.blade.php ENDPATH**/ ?>