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
			$table->unsignedBigInteger('user_id');
			$table->ulid('workspace_id');
			$table->unsignedBigInteger('project_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('issue_link')->nullable();
            $table->string('pr_link')->nullable();
			
            $table->timestamps();
			$table->softDeletes();

			$table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
			$table->foreign('workspace_id')->references('id')->on('workspaces')->cascadeOnDelete();
			$table->foreign('project_id')->references('id')->on('projects')->cascadeOnDelete();
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
