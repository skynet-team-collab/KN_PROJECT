<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->string('name');
            $table->string('breed');
            $table->integer('age');
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('mule_owners')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mules');
    }
};
