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
        Schema::create('dependents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('company_name');
            $table->string('division');
            $table->string('station');
            $table->string('designation');
            $table->string('grade');
            $table->string('employee_type');
            $table->string('employee_category');
            $table->date('joining_date');
            $table->string('report_to_me');
            $table->integer('supervisor');
            $table->string('report_to');
            $table->string('job_description',500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dependents');
    }
};
