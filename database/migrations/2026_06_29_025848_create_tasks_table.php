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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('task');
            $table->string('description')->nullable();
            $table->enum('status', ['To Do', 'In Progress', 'Review', 'Completed'])->default('To Do');
            $table->enum('priority', ['Low', 'Medium', 'High'])->default('Medium');
            $table->date('due_date');
            $table->timestamps();

            $table->index('user_id');
            $table->index('status');
            $table->index('priority');
            $table->index('due_date');
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
