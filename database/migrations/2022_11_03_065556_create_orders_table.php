<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('ref')->nullable();
            $table->foreignId('customer_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('kitchen_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->text('address');
            $table->tinyInteger('payment_method');
            $table->tinyInteger('delivery_method');
            $table->double('total');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
