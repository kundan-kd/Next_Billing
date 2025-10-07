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
         Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('type',20)->nullable();
            $table->string('name',80)->nullable();
            $table->double('selling_price')->default(0);
            $table->double('tax')->default(0);
            $table->smallInteger('unit')->nullable(0);
            $table->double('purchase_price')->default(0);
            $table->string('hsn',20)->nullable();
            $table->string('barcode',30)->nullable();
            $table->string('category',20)->nullable();
            $table->string('image',40)->nullable();
            $table->text('description')->nullable();
            $table->double('opening_qty')->default(0);
            $table->double('opening_purchase_price')->default(0);
            $table->double('opening_stock_value')->default(0);
            $table->double('discount')->default(0);
            $table->double('cess')->default(0);
            $table->integer('low_stock_at')->nullable();
            $table->smallInteger('not_for_sale_status')->nullable();
            $table->smallInteger('status')->nullable();
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
        Schema::dropIfExists('products');
    }
};
