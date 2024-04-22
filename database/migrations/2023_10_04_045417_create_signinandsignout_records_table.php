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
        Schema::create('signinandsignout_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->date('workingdate');
            $table->tinyInteger('user_type')->default(0);
            $table->tinyInteger('attendance_status')->default(0);
            $table->timestamp('login_time')->nullable();
            $table->timestamp('logout_time')->nullable();
            $table->tinyInteger('late_status')->default(0);
            $table->string('late_time')->nullable();
            $table->string('overtime')->nullable();
            $table->tinyInteger('overtime_status')->default(0);
            $table->string('total_hours')->nullable();
            $table->tinyInteger('working_home')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signinandsignout_records');
    }
};
