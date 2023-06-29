<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php

?>
<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<?php if(session('success')): ?>
    <div class="alert alert-success">
        <ul>
                <li><?php echo e(session('success')); ?></li>
        </ul>
    </div>
<?php endif; ?>
<div class="container rounded bg-white mt-5 mb-5 d-flex justify-content-center">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold"><?php echo e($user->name); ?></span>
                <span class="text-black-50"><?php echo e($user->email); ?></span>
                <span> </span>
            </div>
        </div>
        <div class="col-md-6 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right"><?php echo e(__('Profile Settings')); ?></h4>
                </div>
                <form action="<?php echo e(route('profil.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                <div class="row mt-2 justify-content-center">
                    <div class="col-md-12">
                        <label class="labels"><?php echo e(__('Name')); ?></label>
                        <input type="text" name="name" class="form-control form-control-lg" placeholder="<?php echo e(__('First name')); ?>" value="<?php echo e($user->name); ?>">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels"><?php echo e(__('Mobile Number')); ?></label>
                        <input type="text" name="phone" class="form-control form-control-lg" placeholder="<?php echo e(__('Enter phone number')); ?>" value="<?php echo e($user->phone); ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="labels"><?php echo e(__('Address Line 1')); ?></label>
                        <input type="text" name="address" class="form-control form-control-lg" placeholder="<?php echo e(__('Enter address line 1')); ?>" value="<?php echo e($user->address); ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="labels"><?php echo e(__('Postcode')); ?></label>
                        <input type="text" name="postal_code" class="form-control form-control-lg" placeholder="<?php echo e(__('Enter postcode')); ?>" value="<?php echo e($user->postal_code); ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="labels"><?php echo e(__('Country')); ?></label>
                        <input type="text" name="country" class="form-control form-control-lg" placeholder="<?php echo e(__('Enter country')); ?>" value="<?php echo e($user->country); ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="labels"><?php echo e(__('City')); ?></label>
                        <input type="text" name="city" class="form-control form-control-lg" placeholder="<?php echo e(__('Enter state/region')); ?>" value="<?php echo e($user->city); ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="labels"><?php echo e(__('Email ID')); ?></label>
                        <p class="form-control form-control-lg"><?php echo e($user->email); ?> </p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels"><?php echo e(__('Code de parrainage')); ?></label>
                        <p class="form-control form-control-lg"><?php echo e($user->referee_code); ?></p>
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="submit"><?php echo e(__('Save Profile')); ?></button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>




<style>

    .form-control:focus {
        box-shadow: none;
        border-color: #4CAF50;
    }

    .profile-button {
        background: #4CAF50;
        box-shadow: none;
        border: none;
    }

    .profile-button:hover {
        background: #388E3C;
    }

    .profile-button:focus {
        background: #388E3C;
        box-shadow: none;
    }

    .profile-button:active {
        background: #388E3C;
        box-shadow: none;
    }

    .back:hover {
        color: #388E3C;
        cursor: pointer;
    }

    .labels {
        font-size: 11px;
    }

    .add-experience:hover {
        background: #4CAF50;
        color: #fff;
        cursor: pointer;
        border: solid 1px #4CAF50;
    }


<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/html/resources/views/user/profil.blade.php ENDPATH**/ ?>