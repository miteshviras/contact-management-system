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
        Schema::create('companies', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key (bigint)
            $table->string('image', 1024)->nullable(); // Company logo (nullable)
            $table->string('name'); // Company name
            $table->string('website')->nullable(); // Website URL (nullable)
            $table->string('email'); // Contact email
            $table->string('phone'); // Contact phone
            $table->text('address'); // Company address
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
