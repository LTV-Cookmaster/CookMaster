<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //Subscription = Abonnement

    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->string('subscription_type');
            $table->date('start_date');
            $table->date('end_date');
            $table->float('price_per_month');
            $table->integer('annual_price');
            $table->boolean('advertising');
            $table->boolean('commenting');
            $table->integer('lessons');
            $table->boolean('chat');
            $table->boolean('discount');
            $table->string('free_delivery');
            $table->boolean('kitchen_space');
            $table->boolean('exclusive_events');
            $table->boolean('referral_reward');
            $table->boolean('renewal_bonus');
            $table->timestamps();
        });

        Schema::table('subscriptions', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
