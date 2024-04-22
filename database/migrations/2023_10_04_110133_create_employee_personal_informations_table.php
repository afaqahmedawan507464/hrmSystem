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
        Schema::create('employee_personal_informations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('first_name');
            $table->string('user_image');
            $table->string('email_address')->unique();
            $table->integer('office_number');
            $table->integer('mobile_number');
            $table->string('salutation');
            $table->string('nationality');
            $table->date('date_of_birth');
            $table->string('marred_status');
            $table->string('blood_group');
            $table->integer('cnic_number');
            $table->string('father_name');
            $table->string('address');
            $table->string('city');
            $table->string('province');
            $table->integer('postal_code');
            $table->string('country');
            $table->integer('contact_number');
            $table->string('emergency_contact_person');
            $table->string('relationship');
            $table->integer('person_contact');
            $table->string('place_of_birth');
            $table->string('sub_department');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_personal_informations');
    }
};
