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
        Schema::create('additional_charges', function (Blueprint $table) {
            $table->id();
            $table->string('type',30)->nullable();
            $table->bigInteger('type_id')->nullable();
            $table->string('name',50)->nullable();
            $table->string('charge_type',20)->nullable();
            $table->string('src_code',30)->nullable();
            $table->double('tax')->default(0);
            $table->double('amount')->default(0);
            $table->string('document_Type',30)->nullable();
            $table->smallInteger('percentage_status')->nullable();
            $table->smallInteger('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additional_charges');
    }
};
