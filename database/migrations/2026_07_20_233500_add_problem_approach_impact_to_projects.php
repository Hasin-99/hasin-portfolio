<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->text('problem')->nullable()->after('description');
            $table->text('approach')->nullable()->after('problem');
            $table->text('impact')->nullable()->after('approach');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['problem', 'approach', 'impact']);
        });
    }
};
