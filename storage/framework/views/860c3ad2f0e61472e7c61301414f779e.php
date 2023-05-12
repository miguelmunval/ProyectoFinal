<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?> <?php echo $__env->yieldContent("section", "- Parcelas"); ?></title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
        
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 bg-green-200">

            
            <nav class="flex items-center py-3 bg-green-400"> 
                
                <div class="menu flex-auto ml-3 aling-middle">
                    <a href="<?php echo e(route("parcela.listar")); ?>" class="mr-2"><?php echo app('translator')->get("app.btn_inicio"); ?></a>
                    <a href="<?php echo e(route("user.listar")); ?>" class="mr-2"><?php echo app('translator')->get("app.btn_perfil"); ?></a>
                    <a href="<?php echo e(route("cultivo.listar")); ?>" class="mr-2"><?php echo app('translator')->get("app.btn_cultivos"); ?></a>
                    <a href="<?php echo e(route("objeto.listar")); ?>"><?php echo app('translator')->get("app.btn_objetos"); ?></a>
                    
                </div>
                
                <?php echo e(Auth::user()); ?>

                <div class="mx-4">
                    
                    
                    <form action="<?php echo e(route("logout")); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <button class="bg-red-400 text-white font-bold px-2 py-1 rounded-lg"><?php echo app('translator')->get("app.btn_salir"); ?></button>
                    </form>
                </div>
            </nav>
            <h1 class="text-7xl text-center mb-5 mt-3"><?php echo e(config('app.name', 'Laravel')); ?></h1>

            <br/>
           
            <!-- Page Content -->
            <main>
                <?php echo $__env->yieldContent("main"); ?>                    
            </main>
        </div>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\agroassist\resources\views/layouts/app.blade.php ENDPATH**/ ?>