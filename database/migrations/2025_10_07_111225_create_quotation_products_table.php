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
        Schema::create('quotation_products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('quotation_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('name',100)->nullable();
            $table->integer('qty')->default(0);
            $table->double('unit_price')->default(0);
            $table->double('price_with_tax')->default(0);
            $table->double('discount')->default(0);
            $table->double('net_amount')->default(0);
            $table->double('total')->default(0);
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
        Schema::dropIfExists('quotation_products');
    }
};
