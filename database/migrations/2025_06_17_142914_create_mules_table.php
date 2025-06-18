<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mules', function (Blueprint $table) {
            $table->id();
            $table->string('mule_id', 11)->unique();
            $table->foreignId('owner_id')->constrained('mule_owners')->onDelete('cascade');
            $table->string('name');
            $table->integer('age');
            $table->timestamps();
            $table->index('owner_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mules');
    }
};