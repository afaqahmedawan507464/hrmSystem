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
        Schema::create('employee_social_meida_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('twitter_account',300);
            $table->string('facebook_account',300)->unique();
            $table->string('instagram_account',300);
            $table->string('skype_account',300);
            $table->string('yahoo_account',300);
            $table->string('google_account',300);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_social_meida_accounts');
    }
};
