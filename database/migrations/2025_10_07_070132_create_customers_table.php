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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->nullable();
            $table->string('email',100)->nullable();
            $table->string('mobile',15)->nullable();
            $table->string('whatsapp_num',15)->nullable();
            $table->string('company_name',100)->nullable();
            $table->string('gst',20)->nullable();
            $table->text('address')->nullable();
            $table->string('city',30)->nullable();
            $table->string('district',30)->nullable();
            $table->string('state',30)->nullable();
            $table->integer('pincode')->nullable();
            $table->integer('payment_option')->nullable();
            $table->double('amount')->default(0);
            $table->double('balance')->default(0);
            $table->string('linked_customer',100)->nullable();
            $table->smallInteger('tds_status')->nullable();
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
        Schema::dropIfExists('customers');
    }
};
