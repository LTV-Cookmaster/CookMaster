<!DOCTYPE html>

<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="preload" href="<?php echo e(asset('delivery.jpg')); ?>" as="image">
        <link rel="preload" href="<?php echo e(asset('menu.jpg')); ?>" as="image">
        <link rel="preload" href="<?php echo e(asset('profcook.jpg')); ?>" as="image">
        <link rel="preload" href="<?php echo e(asset('workshop.jpg')); ?>" as="image">

        <title><?php echo $__env->yieldContent('title'); ?></title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <style>
            /* Custom styles for the background */
            .bg-images {
                height: 100vh;
                background-size: cover;
                background-position: center;
                opacity: 0.8;
                transition: opacity 3s ease-out;
                animation: ease-out 2s infinite;
            }

            .text-image {
                position: relative;
                opacity: 1;
            }

            .text-overlay {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
        </style>

        <script>
            // JavaScript to change background images
            let images = [
                "<?php echo e(asset('delivery.jpg')); ?>", // Placeholder for image 1
                "<?php echo e(asset('food.jpg')); ?>",  // Placeholder for image 2
                "<?php echo e(asset('professional.jpg')); ?>",
                "<?php echo e(asset('workshops.jpg')); ?>",// Placeholder for image 3
                // Add more placeholder image URLs as needed
            ];
            let currentImageIndex = 0;

            function changeBackground() {
                currentImageIndex = (currentImageIndex + 1) % images.length;
                let imageUrl = "url(" + images[currentImageIndex] + ")";
                document.querySelector(".bg-images").style.backgroundImage = imageUrl;
            }

            setInterval(changeBackground, 5000); // Change image every 5 seconds
        </script>

    </head>

    <body>
    <div class="container-fluid w-100 p-0" style="height:80vh;">
        <div class="bg-images carousel-fade h-100 w-100">
            <div class="text-image h-100 w-100 d-flex ms-auto align-items-center">
                <div class="text-overlay d-flex flex-column align-items-center">
                    <span class="text-center w-100 display-2 opacity-100" style="color:#48D793;"><?php echo e(__('Cookmaster')); ?></span>
                    <a href="<?php echo e(route('subscriptions.index')); ?>"><button type="button" class="btn bg-light text-center m-4 mt-3 px-5 fs-6" style="color: black"><?php echo e(__('Subscribe')); ?></button></a>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>
<?php /**PATH /var/www/html/resources/views/welcome.blade.php ENDPATH**/ ?>