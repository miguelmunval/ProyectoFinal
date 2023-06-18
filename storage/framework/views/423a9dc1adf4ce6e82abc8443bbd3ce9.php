

<?php $__env->startSection('main'); ?>
    <?php if(Auth::user()->roles != 'admin'): ?>
        <h1><?php echo app('translator')->get('app.noAcs'); ?></h1>
    <?php else: ?>
        <?php if(empty($datos)): ?>
            
            <?php echo app('translator')->get('app.noReg'); ?><br/>
            <?php echo app('translator')->get('app.paReg'); ?>
            <div class="flex items-center justify-end mr-4">
                <a href="<?php echo e(route('cultivo.crear')); ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><?php echo app('translator')->get('app.nueCult'); ?></a>
            </div>
        <?php else: ?>
            <script>document.title = "<?php echo e(config('app.name', 'Laravel')); ?> - Cultivos" </script>
            <h6 class="my-5 mx-4 text-2xl"><?php echo app('translator')->get('app.lstCult'); ?></h6>
            <div class="flex items-center justify-end mr-4">
                <a href="<?php echo e(route('cultivo.crear')); ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><?php echo app('translator')->get('app.nueCult'); ?></a>
            </div>
            <div class="overflow-x-auto mx-4">
                <table class="text-center text-2xl m-auto mt-5 bg-red-200 rounded-lg">
                    <thead>
                        <tr>
                            <th class="px-6 py-4"><?php echo app('translator')->get('app.Nombre'); ?></th>
                            <th class="px-6 py-4"><?php echo app('translator')->get('app.des'); ?></th>
                            <th class="px-6 py-4"><?php echo app('translator')->get('app.tempSi'); ?></th>
                            <th class="px-6 py-4"><?php echo app('translator')->get('app.tempCo'); ?></th>
                            <th class="px-6 py-4"><?php echo app('translator')->get('app.zneCult'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cultivo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($cultivo->NomCult); ?></td>
                                <td><?php echo e($cultivo->DesCult); ?></td>
                                <td><?php echo e($cultivo->EstSiem); ?></td>
                                <td><?php echo e($cultivo->EstCos); ?></td>
                                <td><?php echo e($cultivo->ZonaCult); ?></td>
                                <td class="px-6 py-4">
                                    <a href="<?php echo e(route('cultivo.editar', $cultivo->idCult)); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" /></svg>  
                                    </a>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="<?php echo e(route('cultivo.borrar', $cultivo->idCult)); ?>" >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agroassist\resources\views/cultivos/main.blade.php ENDPATH**/ ?>