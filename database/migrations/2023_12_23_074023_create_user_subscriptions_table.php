<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('website_subscriptions', function (Blueprint $table) {
            $table->unsignedSmallInteger('website_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->primary(['website_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_subscriptions');
    }
};
