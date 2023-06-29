<!DOCTYPE html>
<html lang="fr">
<head>
    <?php $__env->startSection('title' , $event->name); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <?php echo $__env->make('.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style>

        #eventImage {
            border-radius: 15px;
        }

        .eventDetail {
            font-size: 1.2rem;
            margin-top: 10px;
            padding: 20px;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .eventDetail h1 {
            font-size: 2rem;
            color: #343a40;
            margin-bottom: 20px;
        }

        .eventDetail p {
            margin-bottom: 15px;
        }

        .eventDetail .btn-primary {
            padding: 10px 20px;
            font-size: 1.2rem;
        }

        #eventDescription {
            margin-top: 30px;
            font-size: 1.2rem;
            line-height: 1.6;
        }
    </style>
</head>
<body>
<?php
        use Carbon\Carbon;
        $date = Carbon::createFromFormat('d-m-Y', $event->start_date);
        $formattedDate = $date->format('l jS Y');
        $start = Carbon::createFromFormat('H:i', $event->start_time);
        $formattedStart = $start->format('H\h');
        $end = Carbon::createFromFormat('H:i', $event->end_time);
        $formattedEnd = $end->format('H\h');
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
            <img id="eventImage" src="<?php echo e(asset('food.jpg')); ?>" class="img-fluid" alt="Image de l'événement">
        </div>
        <div class="col-lg-6">
            <div class="eventDetail">
                <h1 id="eventTitle"><?php echo e($event->name); ?></h1>
                <p id="eventDate"><i class="fa-solid fa-calendar-days"></i> <strong><?php echo e(__('Date:')); ?> </strong><?php echo e($formattedDate); ?></p>
                <p id="eventTime"><i class="fa-solid fa-clock"></i> <strong><?php echo e(__('Heure:')); ?> </strong><?php echo e($formattedStart); ?> - <?php echo e($formattedEnd); ?></p>
                <p id="eventType"><i class="fa-solid fa-circle-info"></i> <strong><?php echo e(__('Type:')); ?></strong>
                    <?php switch($event->type):
                        case ('tastingEvent'): ?>
                            <?php echo e(__('Dégustation')); ?>

                            <?php break; ?>
                        <?php case ('professionalFormation'): ?>
                            <?php echo e(__('Formation professionnelle')); ?>

                            <?php break; ?>
                        <?php case ('onlineWorkshop'): ?>
                            <?php echo e(__('Atelier en ligne')); ?>

                            <?php break; ?>
                        <?php case ('meetingEvent'): ?>
                            <?php echo e(__('Réunion')); ?>

                            <?php break; ?>
                        <?php case ('homeWorkshop'): ?>
                            <?php echo e(__('Atelier à domicile')); ?>

                            <?php break; ?>
                        <?php default: ?>
                            <?php echo e(__('Type inconnu')); ?>

                    <?php endswitch; ?>
                </p>

            <?php if($reservationCount == $event->number_of_participants): ?>
                    <p id="eventSeats" style="color: red"><i class="fa-solid fa-person"></i> <strong><?php echo e(__('Complet')); ?> </strong><?php echo e($event->seats); ?></p>
                <?php else: ?>
                    <p id="eventSeats"><i class="fa-solid fa-person"></i> <strong><?php echo e(__('Places restantes: ') .  ($event->number_of_participants - $reservationCount) . "/" . $event->number_of_participants); ?> </strong><?php echo e($event->seats); ?></p>
                <?php endif; ?>
                <p id="eventOrganizer"><strong><i class="fa-solid fa-tag"></i> <?php echo e(__('Prix:')); ?> </strong><?php echo e($event->price); ?>€</p>
                <?php if($reserve == false && $reservationCount < $event->number_of_participants): ?>
                <a href="<?php echo e(route('checkout' , ['bill' => $event])); ?>" class="btn btn-success btn-md"><?php echo e(__('Réserver')); ?></a>
                <?php elseif($reservationCount == $event->number_of_participants): ?>
                    <p class="btn btn-danger"><?php echo e(__('Complet')); ?></p>
                <?php else: ?>
                    <p class="btn btn-secondary"><?php echo e(__('Vous êtes déja inscrit')); ?></p>
                <?php endif; ?>
            </div>
            <div id="eventDescription"><?php echo e($event->description); ?></div>
        </div>
    </div>
</div>
</body>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</html>
<?php /**PATH /var/www/html/resources/views/workshops/showWorkshop.blade.php ENDPATH**/ ?>