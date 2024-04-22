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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id')->unique();
            $table->foreign('employee_id')->references('id')->on('employees')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->tinyInteger('employee_designation')->default(0);
            $table->string('invoice_number','100');
            $table->date('salary_date');
            $table->string('total_hours');
            $table->integer('total_days')->default(0);
            $table->integer('total_amount');
            $table->integer('house_rent_allownace')->nullable();
            $table->integer('other_allownace')->nullable();
            $table->integer('gross_earning')->nullable();
            $table->integer('provident_fund')->nullable();
            $table->integer('total_deductions')->nullable();
            $table->string('total_overtime_hours')->nullable();
            $table->integer('overtime_amount')->nullable();
            $table->integer('text_amount');
            $table->integer('grand_total_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
