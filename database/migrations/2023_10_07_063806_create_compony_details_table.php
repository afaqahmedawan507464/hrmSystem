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
        Schema::create('compony_details', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->unique();
            $table->string('company_owner_name');
            $table->string('company_address');
            $table->integer('ntn_number');
            $table->string('compnay_work_type');
            $table->integer('gst_tax_number');
            $table->integer('company_number');
            $table->string('company_logo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compony_details');
    }
};
