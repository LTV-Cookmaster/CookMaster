<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<?php
    use Carbon\Carbon;
?>
<?php $__env->startSection('title' , 'Home'); ?>
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


</head>

<body>
<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if(session('success')): ?>
    <div id="success-alert" class="alert alert-success alert-dismissible fade show text-center d-flex align-items-center justify-content-between" role="alert">
        <span style="flex-grow: 1; text-align: center;"><?php echo e(session('success')); ?></span>
        <p id="close-success" type="button" class="m-0">
            <i class="fa-solid fa-xmark"></i>
        </p>
    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div id="error-alert" class="alert alert-danger alert-dismissible fade show text-center d-flex align-items-center justify-content-between" role="alert">
        <span style="flex-grow: 1; text-align: center;"><?php echo e(session('error')); ?></span>
        <p id="close-error" type="button" class="m-0">
            <i class="fa-solid fa-xmark"></i>
        </p>
    </div>
<?php endif; ?>

<script>
    if (document.getElementById('close-success')) {
        document.getElementById('close-success').addEventListener('click', function() {
            document.getElementById('success-alert').remove();
        });
    }

    if (document.getElementById('close-error')) {
        document.getElementById('close-error').addEventListener('click', function() {
            document.getElementById('error-alert').remove();
        });
    }
</script>

<div class="container-fluid">
    <div class="container">
        <h2 class="text-center mt-2">Your next workshops</h2>
        <div class="row">
            <?php $__currentLoopData = $workshops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workshop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="#" class="shadow-none text-dark">
                        <div class="card mt-5 w-100 border-0 shadow-none rounded-3" style="width: 18rem;">
                            <a href="<?php echo e(route('event', ['event' => $workshop->id])); ?>">
                            <img src="<?php echo e(asset('food.jpg')); ?>" class="card-img-top shadow-sm rounded-4" alt="...">
                            </a>
                            <div class="card-body d-flex">
                                <div class="row">
                                    <div class="d-flex">
                                        <div class="card-text">
                                        <span class="text-truncate"><?php echo e($workshop->name); ?></span>
                                        <br>
                                            <?php
                                                $date = Carbon::createFromFormat('d-m-Y', $workshop->start_date);
                                                $formattedDate = $date->format('l jS Y');
                                            ?>
                                            <span class="text-truncate" style="color: #1C6513"><i class="fa-solid fa-calendar-days"></i> <?php echo e($formattedDate); ?></span>
                                            <br>
                                            <?php
                                                $start = Carbon::createFromFormat('H:i', $workshop->start_time);
                                                $formattedStart = $start->format('H\h');
                                                $end = Carbon::createFromFormat('H:i', $workshop->end_time);
                                                $formattedEnd = $end->format('H\h');
                                            ?>
                                            <span class="d-inline-block text-truncate" style="max-width: 150px;"><i class="fa-regular fa-clock"></i> <?php echo e($formattedStart); ?> - <?php echo e($formattedEnd); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <h2 class="text-center mt-2">Your next events</h2>
        <div class="row">
            <?php $__currentLoopData = $formations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="#" class="shadow-none text-dark">
                        <div class="card mt-5 w-100 border-0 shadow-none rounded-3" style="width: 18rem;">
                            <a href="<?php echo e(route('event', ['event' => $formation->id])); ?>">
                            <img src="<?php echo e(asset('food.jpg')); ?>" class="card-img-top shadow-sm rounded-4" alt="...">
                            </a>
                            <div class="card-body d-flex">
                                <div class="row">
                                    <div class="d-flex">
                                        <div class="card-text">
                                            <span class="text-truncate"><?php echo e($formation->name); ?></span>
                                            <br>
                                            <?php
                                                $date = Carbon::createFromFormat('d-m-Y', $formation->start_date);
                                                $formattedDate = $date->format('l jS Y');
                                            ?>
                                            <span class="text-truncate" style="color: #1C6513"><i class="fa-solid fa-calendar-days"></i> <?php echo e($formattedDate); ?></span>
                                            <br>
                                            <?php
                                                $start = Carbon::createFromFormat('H:i', $formation->start_time);
                                                $formattedStart = $start->format('H\h');
                                                $end = Carbon::createFromFormat('H:i', $formation->end_time);
                                                $formattedEnd = $end->format('H\h');
                                            ?>
                                            <span class="d-inline-block text-truncate" style="max-width: 150px;"><i class="fa-regular fa-clock"></i> <?php echo e($formattedStart); ?> - <?php echo e($formattedEnd); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH /var/www/html/resources/views/home.blade.php ENDPATH**/ ?>