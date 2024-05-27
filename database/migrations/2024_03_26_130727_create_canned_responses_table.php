<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('canned_responses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('department_id');
            $table->foreignId('suggested_status_id')->nullable()->constrained('statuses');
            $table->longText('body');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('canned_responses');
    }
};
