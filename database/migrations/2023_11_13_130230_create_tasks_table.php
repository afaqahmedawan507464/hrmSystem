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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_added');
            $table->foreign('task_added')->references('id')->on('employees')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('assignee_id')->nullable();
            $table->foreign('assignee_id')->references('id')->on('employees')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('project_starting_date')->nullable();
            $table->unsignedBigInteger('taskboard_id')->nullable();
            $table->foreign('taskboard_id')->references('id')->on('task_lists')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('task_type')->nullable();
            $table->string('task_name',1000);
            $table->string('task_priority');
            $table->string('due_date');
            $table->string('taskmediaimage',5000)->nullable();
            $table->string('task_details',2000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
