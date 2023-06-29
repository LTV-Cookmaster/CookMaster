<?php $__env->startSection('title' , 'Listes des Utilisateurs'); ?>
<?php
    use Carbon\Carbon;
?>
<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('content'); ?>

    <div class="d-flex justify-content-between align-items-center">
        <h1><?php echo $__env->yieldContent('title'); ?></h1>
        <a href="<?php echo e(route('admin.user.create')); ?>" class="btn btn-primary">Créer un user</a>
    </div>
    <table class="table table-striped">
        <thead class="thead-dark" style="background-color: black;color: white">
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Ville</th>
            <th>Code Postal</th>
            <th>Pays</th>
            <th>Date Création</th>
            <th>Rôle</th>
            <th>Ban</th>
            <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($user->name); ?></td>
                <td><?php echo e($user->email); ?></td>
                <td><?php echo e($user->city); ?></td>
                <td><?php echo e($user->postal_code); ?></td>
                <td style="max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
               
                    <?php echo e($user->country); ?>

                </td>
                <?php
                        $dateCreation = Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at);
                        $diffEnJours = $dateCreation->diffInDays(Carbon::now());
                        if ($diffEnJours > 0) $phrase = "il y a " . $diffEnJours . " jours";
                        else $phrase = "Aujourd'hui";
                ?>
                <td><?php echo e($phrase); ?></td>
                <?php if($user->is_admin): ?>
                    <td><strong style="color: darkgoldenrod">Admin</strong></td>
                <?php else: ?>
                    <td>Membre</td>
                <?php endif; ?>
                <?php if($user->is_ban): ?>
                    <td><strong style="color: red">Banni</strong></td>
                    <td>
                        <a href="<?php echo e(route('admin.user.edit', $user)); ?>" class="btn btn-primary">Modifier</a>
                        <a href="<?php echo e(route('admin.user.unban', $user)); ?>" class="btn btn-success">Débannir</a>
                    </td>
                <?php else: ?>
                    <td></td>
                    <td>
                        <a href="<?php echo e(route('admin.user.edit', $user)); ?>" class="btn btn-primary">Modifier</a>
                        <a href="<?php echo e(route('admin.user.ban', $user)); ?>" class="btn btn-danger">Bannir</a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php echo e($users->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.users', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/users/index.blade.php ENDPATH**/ ?>