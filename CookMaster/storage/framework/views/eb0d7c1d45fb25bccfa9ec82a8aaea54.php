<?php
    $class = $class ?? null;
?>

<div class="form-check form-switch <?php echo e($class); ?>">
    <input type="hidden" value="0" name="<?php echo e($name); ?>">
    <input type="checkbox" <?php echo e(old($name, $value ?? false) ? 'checked' : ''); ?> value="1" name="<?php echo e($name); ?>" class="form-check-input <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" role="switch" id="<?php echo e($name); ?>">
    <label class="form-check-label" for="<?php echo e($name); ?>"><?php echo e($label); ?></label>

    <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <div class="invalid-feedback">
        <?php echo e($message); ?>

    </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>
<?php /**PATH /var/www/html/resources/views/components/input/checkbox.blade.php ENDPATH**/ ?>