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
        Schema::create('requirement_bin_contents', function (Blueprint $table) {
            // Default Properties
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignUuid('created_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('updated_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('foreign_requirement_bins_id')->nullable()->constrained('requirement_bins')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('foreign_requirement_types_id')->nullable()->constrained('requirement_types')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('is_deleted')->default(false);

             // Fillables
             $table->text('notes')->nullable();
             $table->string('file_format')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirement_bin_contents');
    }
};
