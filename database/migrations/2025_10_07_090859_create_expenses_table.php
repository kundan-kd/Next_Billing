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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->double('expense_with_tax')->default(0);
            $table->double('amount')->default(0);
            $table->timestamp('expense_date')->nullable();
            $table->string('category',20)->nullable();
            $table->text('notes')->nullable();
            $table->string('files',80)->nullable();
            $table->smallInteger('payment_status')->nullable();
            $table->string('payment_type',20)->nullable();
            $table->timestamp('payment_date')->nullable();
            $table->text('payment_note')->nullable();
            $table->bigInteger('bank_id')->nullable();
            $table->smallInteger('status')->default(1);
            $table->bigInteger('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
