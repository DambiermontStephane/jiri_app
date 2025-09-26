<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('implements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('homework_id')->constrained();
            $table->foreignId('contact_id')->constrained();
            $table->string('note');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('implements');
    }
};
