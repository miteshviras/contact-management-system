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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key (bigint)
            $table->string('name'); // Contact name
            $table->string('email'); // Contact email
            $table->string('phone'); // Contact phone
            $table->string('image', 1024)->nullable(); // Contact photo (nullable)
            $table->string('position')->nullable(); // Contact position (nullable)
            $table->string('department')->nullable(); // Contact department (nullable)
            $table->text('address'); // Contact address
            $table->text('notes')->nullable(); // Additional notes (nullable)
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
