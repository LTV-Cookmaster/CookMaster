<?php $__env->startSection('title', $user->exists ? "Modifier un utilisateur" : "Créer un utilisateur"); ?>

<?php $__env->startSection('content'); ?>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <h1><?php echo $__env->yieldContent('title'); ?></h1>

    <form class="vstack gap-2" action="<?php echo e(route($user->exists ? 'admin.user.update' : 'admin.user.store', ['user' => $user])); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field($user->exists ? 'put' : 'post'); ?>

        <div class="row">
            <?php echo $__env->make('components.input.input' , ['class' => 'col','label' => 'Nom' , 'name' => 'name', 'value' => $user->name], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php echo $__env->make('components.input.input' , ['class' => 'col','label' => 'email' , 'name' => 'email', 'value' => $user->email], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col row">
                <?php echo $__env->make('components.input.input' , ['class' => 'col','label' => 'Adresse' , 'name' => 'address', 'value' => $user->address], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('components.input.input' , ['label' => 'Ville' , 'name' => 'city', 'value' => $user->city], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col row">
                <?php echo $__env->make('components.input.input' , ['class' => 'col','label' => 'Code postal' , 'name' => 'postal_code', 'value' => $user->postal_code], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('components.input.input' , ['label' => 'Pays' , 'name' => 'country', 'value' => $user->country], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <?php echo $__env->make('components.input.input' , ['label' => 'Téléphone' , 'name' => 'phone', 'value' => $user->phone], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if($user->exists): ?>
                <?php echo $__env->make('components.input.input' , ['label' => 'Code d\'affiliation' , 'name' => 'referral_code', 'value' => $user->referral_code], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <?php echo $__env->make('components.input.input' , ['label' => 'Password' , 'name' => 'password', 'value' => $user->password, 'class' => 'display-none'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php echo $__env->make('components.input.checkbox' , ['label' => 'Admin' , 'name' => 'is_admin', 'value' => $user->is_admin], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                 <select name="is_admin" id="is_admin">
                     <?php if($user->is_admin == 0): ?>
                         <option value="0">Non</option>
                         <option value="1">Oui</option>
                     <?php else: ?>
                         <option value="1">Oui</option>
                         <option value="0">Non</option>
                     <?php endif; ?>
                 </select>

        </div>

        <div>
            <button class="btn btn-primary">
                <?php if($user->exists): ?>
                    Modifier
                <?php else: ?>
                    Créer
                <?php endif; ?>
            </button>
        </div>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.users', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/users/form.blade.php ENDPATH**/ ?>