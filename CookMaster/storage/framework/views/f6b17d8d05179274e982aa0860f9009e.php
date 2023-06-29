<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title><?php echo $__env->yieldContent('title'); ?> | Administration</title>
</head>
<body>
<div class="container mt-5">

    <?php if(session('success')): ?>
        <div id="success-alert" class="alert alert-success alert-dismissible fade show text-center d-flex align-items-center justify-content-between" role="alert">
            <span style="flex-grow: 1; text-align: center;"><?php echo e(session('success')); ?></span>
            <p id="close-success" type="button" class="m-0">
                <i class="fa-solid fa-xmark"></i>
            </p>
        </div>
    <?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>
        <script>
            if (document.getElementById('close-success')) {
                document.getElementById('close-success').addEventListener('click', function() {
                    document.getElementById('success-alert').remove();
                });
            }
        </script>
</div>
</body>
</html>
<?php /**PATH /var/www/html/resources/views/admin/admin.blade.php ENDPATH**/ ?>