<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('email');
            $table->string('reference')->nullable();
            $table->longText('description');
            $table->timestamp('opened_at')->nullable();
            $table->foreignId('department_id')->default(1);
            $table->foreignId('status_id')->default(1);
            $table->foreignId('category_id')->default(1);
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
