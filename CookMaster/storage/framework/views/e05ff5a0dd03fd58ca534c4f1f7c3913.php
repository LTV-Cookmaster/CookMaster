<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container" style="text-align: center">
    <br>
        <h1><?php echo e($bill->name); ?></h1>
        <h2>Prix: <span style="color: #48D793"><?php echo e($bill->price); ?>€</span></h2>
</div>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-6">
            <form id="payment-form" class="card">
                <?php echo csrf_field(); ?>
                <div class="card-body">
                    <div id="card-element" class="mb-3"></div>
                    <button id="submit-button" type="submit" class="btn btn-primary">Payer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const stripe = Stripe('<?php echo e(env('STRIPE_KEY')); ?>');
    const elements = stripe.elements();
    const cardElement = elements.create('card');

    cardElement.mount('#card-element');
    const form = document.getElementById('payment-form');
    const submitButton = document.getElementById('submit-button');

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        stripe.confirmCardPayment("<?php echo e($clientSecret); ?>", {
            payment_method: {
                card: cardElement,
            }
        }).then(function (result) {
            if (result.error) {
                console.error(result.error);
            } else {
                // Paiement réussi, effectuer les actions nécessaires
                // comme enregistrer la souscription dans la base de données
                window.location.href = "<?php echo e(route('checkout.success', ['bill' => $bill->id , 'paid' => true])); ?>";
            }
        }).catch(function (error) {
            console.error(error);
        });
    });
</script>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</html>
<?php /**PATH /var/www/html/resources/views/checkout.blade.php ENDPATH**/ ?>