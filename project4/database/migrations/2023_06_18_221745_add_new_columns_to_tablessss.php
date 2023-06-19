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
        Schema::create('roles', function (Blueprint $table) {
            // Default Properties
            $table->integer('id')->primary()->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->foreignUuid('created_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('updated_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');

            // Fillables
            $table->string('title');
            $table->text('description')->nullable();

        });

        Schema::table('users', function (Blueprint $table) {
            $table->integer('foreign_role_id')->nullable();
            $table->foreign('foreign_role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');   ;
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('roles', function (Blueprint $table) {
            //
        });
    }
};
