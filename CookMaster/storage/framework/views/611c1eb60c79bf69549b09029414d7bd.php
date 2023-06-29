<?php
    use App\Models\Reservation;
?>
<?php $__env->startSection('title' , 'Les événements'); ?>
<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('content'); ?>

    <div class="d-flex justify-content-between align-items-center">
        <h1><?php echo $__env->yieldContent('title'); ?></h1>
             <a href="<?php echo e(route('events.create')); ?>" class="btn btn-primary">Créer un évènement</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Type</th>
            <th>Prix</th>
            <th>Nombres de participants</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($event->name); ?></td>
                <td><?php switch($event->type):
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

                    <?php endswitch; ?></td>
                <td><?php echo e($event->price); ?>€</td>
                <?php
                    $reservationCount = Reservation::where('event_id', $event->id)->count();
                ?>
                <?php if($reservationCount == $event->number_of_participants): ?>
                    <td id="eventSeats" style="color: red"><i class="fa-solid fa-person"></i> <strong><?php echo e(__('Complet')); ?> </strong><?php echo e($event->seats); ?></td>
                <?php else: ?>
                    <td id="eventSeats"><i class="fa-solid fa-person"></i> <strong><?php echo e(($event->number_of_participants - $reservationCount) . "/" . $event->number_of_participants); ?> </strong><?php echo e($event->seats); ?></td>
                <?php endif; ?>
                <td>
                    <a class="btn btn-primary" href="<?php echo e(route('events.edit', ['event' => $event->id])); ?>">Modifier</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/events/list.blade.php ENDPATH**/ ?>