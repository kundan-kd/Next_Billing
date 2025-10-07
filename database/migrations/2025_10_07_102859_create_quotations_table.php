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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('quotation_id')->nullable();
            $table->string('type',30)->nullable();
            $table->integer('dispatch_address_id')->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->string('name',100)->nullable();
            $table->timestamp('quotation_date')->nullable();
            $table->timestamp('validity')->nullable();
            $table->string('reference',100)->nullable();
            $table->bigInteger('sales_person')->nullable();
            $table->smallInteger('desc_status')->nullable();
            $table->smallInteger('reverse_order_status')->nullable();
            $table->double('additional_charges')->default(0);
            $table->text('notes')->nullable();
            $table->string('discount_type',20)->nullable();
            $table->double('discount')->default(0);
            $table->double('tax')->default(0);
            $table->double('roundoff')->default(0);
            $table->double('total_amount')->default(0);
            $table->double('total_discount')->default(0);
            $table->smallInteger('hide_total_status')->nullable();
            $table->smallInteger('reverse_charge_applicable')->nullable();
            $table->smallInteger('e_waybill')->nullable();
            $table->smallInteger('e_invoice')->nullable();
            $table->string('files',100)->nullable();
            $table->integer('bank_id')->nullable();
            $table->double('pay_amount')->default(0);
            $table->string('payment_type',20)->nullable();
            $table->text('payment_notes')->nullable();
            $table->smallInteger('tds_applicable')->nullable();
            $table->smallInteger('tcs_applicable')->nullable();
            $table->string('signature',30)->nullable();
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
        Schema::dropIfExists('quotations');
    }
};
