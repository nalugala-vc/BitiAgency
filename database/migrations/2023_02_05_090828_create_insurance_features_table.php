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
        Schema::create('insurance_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('covers_id')->constrained('insurance_covers');
            $table->string('issued_in_the_name_of_the_policyholder');
            $table->string('flexible_premium_payments');
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
        Schema::dropIfExists('insurance_features');
    }
};
