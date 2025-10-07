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
        Schema::create('payment_followup_reminders', function (Blueprint $table) {
            $table->id();
            $table->string('party_remind',50)->nullable();
            $table->smallInteger('sms')->nullable();
            $table->smallInteger('email')->nullable();
            $table->smallInteger('reminder_status')->nullable();
            $table->string('last_seen',20)->nullable();
            $table->smallInteger('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_followup_reminders');
    }
};
