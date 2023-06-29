<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<?php $__env->startSection('title' , 'Workshops'); ?>
<?php
    use Carbon\Carbon;
?>
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
<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <body>

    <div class="container-fluid">
        <div class="container">
            <h2 class="text-center mt-2">Online workshops</h2>
            <div class="row">
                <?php $__currentLoopData = $onlines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $online): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <a href="#" class="shadow-none text-dark">
                            <div class="card mt-5 w-100 border-0 shadow-none rounded-3" style="width: 18rem;">
                                <?php
                                    $elements = ['food.jpg', 'professional.jpg', 'workshops.jpg'];
                                    $randomIndex = array_rand($elements);
                                    $randomElement = $elements[$randomIndex];
                                ?>
                                <a href="<?php echo e(route('event', ['event' => $online->id])); ?>">
                                <img src="<?php echo e(asset($randomElement)); ?>" class="card-img-top shadow-sm rounded-4" alt="...">
                                </a>
                                <div class="card-body d-flex">
                                    <div class="row">
                                        <div class="d-flex">
                                            <div class="card-text">
                                                <span class="text-truncate"><?php echo e($online->name); ?></span>
                                                <br>
                                                <?php
                                                    $date = Carbon::createFromFormat('d-m-Y', $online->start_date);
                                                    $formattedDate = $date->format('l jS Y');
                                                ?>
                                            <span class="text-truncate" style="color: #1C6513"><i class="fa-solid fa-calendar-days"></i> <?php echo e($formattedDate); ?></span>
                                            <br>
                                                <?php
                                                    $start = Carbon::createFromFormat('H:i', $online->start_time);
                                                    $formattedStart = $start->format('H\h');
                                                    $end = Carbon::createFromFormat('H:i', $online->end_time);
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


            <h2 class="text-center mt-2">On site workshops</h2>
            <div class="row">
                <?php $__currentLoopData = $workshops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workshop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <a href="#" class="shadow-none text-dark">
                            <div class="card mt-5 w-100 border-0 shadow-none rounded-3" style="width: 18rem;">
                                <?php
                                    $elements = ['food.jpg', 'professional.jpg', 'workshops.jpg'];
                                    $randomIndex = array_rand($elements);
                                    $randomElement = $elements[$randomIndex];
                                ?>
                                <a href="<?php echo e(route('event', ['event' => $workshop->id])); ?>">
                                    <img src="<?php echo e(asset($randomElement)); ?>" class="card-img-top shadow-sm rounded-4" alt="...">
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
                                                <br>
                                                <span class="text-truncate" style="max-width: 150px;"><?php echo e($workshop->address); ?></span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        <h2 class="text-center mt-2">Professional formations</h2>
        <div class="row">
            <?php $__currentLoopData = $formations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="#" class="shadow-none text-dark">
                        <div class="card mt-5 w-100 border-0 shadow-none rounded-3" style="width: 18rem;">
                            <?php
                                    $elements = ['food.jpg', 'professional.jpg', 'workshops.jpg'];
                                    $randomIndex = array_rand($elements);
                                    $randomElement = $elements[$randomIndex];
                            ?>
                            <a href="<?php echo e(route('event', ['event' => $formation->id])); ?>">
                                <img src="<?php echo e(asset($randomElement)); ?>" class="card-img-top shadow-sm rounded-4" alt="...">
                            </a>                            <div class="card-body d-flex">
                                <div class="row">
                                    <div class="d-flex">
                                        <div class="card-text">
                                            <span class="text-truncate"><?php echo e($formation->name); ?></span>
                                            <br>
                                            <?php
                                                $date = Carbon::createFromFormat('d-m-Y', $formation->start_date);
                                                $formattedDate = $date->format('l jS Y');
                                            ?>
                                            <span class="text-truncate" style="color: #1C6513"><i class="fa-solid fa-calendar-days"></i> <?php echo e($formattedDate); ?> <i class="fa-regular fa-clock"></i></span>
                                            <br>
                                            <?php
                                                $start = Carbon::createFromFormat('H:i', $online->start_time);
                                                $formattedStart = $start->format('H\h');
                                                $end = Carbon::createFromFormat('H:i', $online->end_time);
                                                $formattedEnd = $end->format('H\h');
                                            ?>
                                            <span class="d-inline-block text-truncate" style="max-width: 150px;"><i class="fa-regular fa-clock"></i> <?php echo e($formattedStart); ?> - <?php echo e($formattedEnd); ?></span>
                                            <br>
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
<?php /**PATH /var/www/html/resources/views/workshops.blade.php ENDPATH**/ ?>