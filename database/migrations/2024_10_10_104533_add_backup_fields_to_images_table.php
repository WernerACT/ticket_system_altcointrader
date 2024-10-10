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
        Schema::table('images', function (Blueprint $table) {
            $table->binary('blob')->nullable()->after('path');  // Column for image blob data
            $table->boolean('is_backed_up')->default(false)->after('should_delete'); // Boolean for backup status
            $table->timestamp('backed_up_at')->nullable()->after('is_backed_up');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn('blob');
            $table->dropColumn('is_backed_up');
            $table->dropColumn('backed_up_at');
        });
    }
};
