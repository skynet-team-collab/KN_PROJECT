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
        Schema::create('mule_owners', function (Blueprint $table) {
            $table->id();
            $table->string('owner_id', 7)->unique();
            $table->string('name');
            $table->integer('age');
            $table->text('address');
            $table->string('photo_path')->nullable();
            $table->string('aadhaar_number')->unique();
            $table->string('webcam_photo')->nullable();
            $table->string('police_verification_path')->nullable();
            $table->string('mobile_number');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('mule_owners');
    }
};