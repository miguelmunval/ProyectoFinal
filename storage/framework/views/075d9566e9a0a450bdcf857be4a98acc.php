

<?php $__env->startSection("main"); ?>

    
    <?php if(empty($datos)): ?>
        
        Lo siento, pero no hay parcelas en la base de datos.
    <?php else: ?>
        <h6 class="my-5 mx-4 text-2xl"><?php echo app('translator')->get('app.Bienvenido'); ?> <?php echo e(Auth::user()); ?></h6>
        <div class="flex items-center justify-end mr-4">
        
        <table class="text-center text-2xl m-auto mt-5 bg-red-200 rounded-lg">
            <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tbody>
                <tr>
                    <th class="px-6 py-4"><?php echo app('translator')->get("app.Nombre"); ?></th>
                
                    <td class="px-6 py-4"><?php echo e($user->nombre); ?></td>
                </tr>
                <tr>
                    <th class="px-6 py-4"><?php echo app('translator')->get("app.Apellidos"); ?></th>
                
                    <td class="px-6 py-4"><?php echo e($user->apellido); ?></td>
                </tr>
                <tr>
                    <th class="px-6 py-4"><?php echo app('translator')->get("app.email"); ?></th>
                
                    <td class="px-6 py-4"><?php echo e($user->email); ?></td>
                </tr>
                <tr>    
                    <th class="px-6 py-4"><?php echo app('translator')->get("app.pass"); ?></th>
                
                    <td class="px-6 py-4">**********</td>
                </tr>
                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    <?php endif; ?>
   


<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agroassist\resources\views/users/main.blade.php ENDPATH**/ ?>