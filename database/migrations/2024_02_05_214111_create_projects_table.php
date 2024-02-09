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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('user_id');
			$table->ulid('workspace_id');
            $table->string('name');
            $table->string('description')->nullable();

            $table->timestamps();
			$table->softDeletes();

			$table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
			$table->foreign('workspace_id')->references('id')->on('workspaces')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
