<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<?php
    use Carbon\Carbon;
?>
<?php $__env->startSection('title' , 'Events'); ?>
<body>
<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container-fluid">
    <div class="container">
        <h2 class="text-center mt-2">Your next tasting</h2>
        <div class="row">
            <?php $__currentLoopData = $tastings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tasting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="#" class="shadow-none text-dark">
                        <div class="card mt-5 w-100 border-0 shadow-none rounded-3" style="width: 18rem;">
                            <a href="<?php echo e(route('event', ['event' => $tasting->id])); ?>">
                                <img src="<?php echo e(asset('food.jpg')); ?>" class="card-img-top shadow-sm rounded-4" alt="...">
                            </a>
                            <div class="card-body d-flex">
                                <div class="row">
                                    <div class="d-flex">
                                        <div class="card-text">
                                            <span class="text-truncate"><?php echo e($tasting->name); ?></span>
                                            <br>
                                            <?php
                                                $date = Carbon::createFromFormat('d-m-Y', $tasting->start_date);
                                                $formattedDate = $date->format('l jS Y');
                                            ?>
                                            <span class="text-truncate" style="color: #1C6513"><i class="fa-solid fa-calendar-days"></i> <?php echo e($formattedDate); ?></span>
                                            <br>
                                            <?php
                                                $start = Carbon::createFromFormat('H:i', $tasting->start_time);
                                                $formattedStart = $start->format('H\h');
                                                $end = Carbon::createFromFormat('H:i', $tasting->end_time);
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
        <h2 class="text-center mt-2">Your next meeting</h2>
        <div class="row">
            <?php $__currentLoopData = $meetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="#" class="shadow-none text-dark">
                        <div class="card mt-5 w-100 border-0 shadow-none rounded-3" style="width: 18rem;">
                            <a href="<?php echo e(route('events.index', ['event' => $meeting->id])); ?>">
                                <img src="<?php echo e(asset('food.jpg')); ?>" class="card-img-top shadow-sm rounded-4" alt="...">
                            </a>
                            <div class="card-body d-flex">
                                <div class="row">
                                    <div class="d-flex">
                                        <div class="card-text">
                                            <span class="text-truncate"><?php echo e($meeting->name); ?></span>
                                            <br>
                                            <?php
                                                $date = Carbon::createFromFormat('d-m-Y', $meeting->start_date);
                                                $formattedDate = $date->format('l jS Y');
                                            ?>
                                            <span class="text-truncate" style="color: #1C6513"><i class="fa-solid fa-calendar-days"></i> <?php echo e($formattedDate); ?></span>
                                            <br>
                                            <?php
                                                $start = Carbon::createFromFormat('H:i', $meeting->start_time);
                                                $formattedStart = $start->format('H\h');
                                                $end = Carbon::createFromFormat('H:i', $meeting->end_time);
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
<?php /**PATH /var/www/html/resources/views/events/index.blade.php ENDPATH**/ ?>