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
        Schema::create('company_details', function (Blueprint $table) {
            $table->id();
            $table->string('brand_name',100)->nullable();
            $table->string('company_name',100)->nullable();
            $table->string('mobile',15)->nullable();
            $table->string('email',100)->nullable();
            $table->string('gst',20)->nullable();
            $table->string('alt_mobile',15)->nullable();
            $table->string('website',200)->nullable();
            $table->string('pan',12)->nullable();
            $table->string('logo',100)->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_details');
    }
};
