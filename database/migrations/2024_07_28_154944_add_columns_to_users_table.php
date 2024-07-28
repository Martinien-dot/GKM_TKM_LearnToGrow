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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->enum('role', ['student', 'teacher', 'admin'])->default('student');
            $table->foreignId('school_id')->nullable()->constrained('schools')->onDelete('set null');
            $table->foreignId('region_id')->nullable()->constrained('regions')->onDelete('set null');
            $table->foreignId('commune_id')->nullable()->constrained('communes')->onDelete('set null');
            $table->foreignId('class_id')->nullable()->constrained('classes')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('role');
            $table->dropForeign(['school_id']);
            $table->dropColumn('school_id');
            $table->dropForeign(['region_id']);
            $table->dropColumn('region_id');
            $table->dropForeign(['commune_id']);
            $table->dropColumn('commune_id');
            $table->dropForeign(['class_id']);
            $table->dropColumn('class_id');
            
        });
    }
};
