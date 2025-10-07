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
        Schema::create('barcode_settings', function (Blueprint $table) {
            $table->id();
            $table->string('product_name_font_size',20)->nullable();
            $table->string('mrp_font_size',20)->nullable();
            $table->string('barcode_size',20)->nullable();
            $table->smallInteger('show_package_date_status')->nullable();
            $table->smallInteger('show_mrp_status')->nullable();
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
        Schema::dropIfExists('barcode_settings');
    }
};
