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
        Schema::create('requirements_assigned_to_users', function (Blueprint $table) {
            // Default Properties
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignUuid('uploaded_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('updated_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('assigned_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('foreign_bin_content_id')->nullable()->constrained('requirement_bin_contents')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('is_unassigned')->default(false);

            // Fillables
            $table->string('status')->default('PENDING');
            $table->string('uploaded_file_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirements_assigned_to_users');
    }
};
