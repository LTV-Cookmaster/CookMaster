<!DOCTYPE html>
<html lang="en">
<?php
    use Carbon\Carbon;
?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <title><?php echo $__env->yieldContent('title'); ?></title>
    </head>

    <body>
    <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <br>
    <div class="container">
        

        <section class="mb-5">
            <h2>Workshops</h2>
            <table class="table">
                <thead>
                <tr>
                    <th><?php echo e(__("Nom")); ?></th>
                    <th><?php echo e(__("Date")); ?></th>
                    <th><?php echo e(__("Horaires")); ?></th>
                    <th><?php echo e(__("Prix")); ?></th>
                    <th><?php echo e(__("Statut")); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($reservation->name); ?></td>
                        <?php
                        die();
                            $startDate = Carbon::createFromFormat('d-m-Y H:i', $reservation->start_date.' '.$reservation->start_time);
                            $endDate = Carbon::createFromFormat('d-m-Y H:i', $reservation->end_date.' '.$reservation->end_time);
                            $currentDate = Carbon::now();
                            $date = Carbon::createFromFormat('d-m-Y', $reservation->start_date);
                            $formattedDate = $date->format('l jS Y');
                            $start = Carbon::createFromFormat('H:i', $reservation->start_time);
                            $formattedStart = $start->format('H\h');
                            $end = Carbon::createFromFormat('H:i', $reservation->end_time);
                            $formattedEnd = $end->format('H\h');
                        ?>
                        <td><?php echo e($formattedDate); ?></td>
                        <td><?php echo e($formattedStart); ?> - <?php echo e($formattedEnd); ?></td>
                        <td><?php echo e($reservation->price); ?>€</td>
                        <td>
                            <?php if($endDate->isPast()): ?>
                                <span style="color: darkgoldenrod"><?php echo e(__("Workshop terminé")); ?></span>
                            <?php elseif($startDate->isFuture()): ?>
                                <span style="color: green"><?php echo e(__("Workshop à venir")); ?></span>
                            <?php else: ?>
                                <span style="color: blue"><?php echo e(__("Workshop en cours")); ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </section>

  
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH /var/www/html/resources/views/user/reservations.blade.php ENDPATH**/ ?>