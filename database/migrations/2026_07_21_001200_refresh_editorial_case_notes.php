<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('projects') || ! Schema::hasColumn('projects', 'problem')) {
            return;
        }

        $thinking = require database_path('data/project_thinking.php');
        $now = now();

        foreach ($thinking as $title => $copy) {
            DB::table('projects')
                ->where('title', $title)
                ->update([
                    'problem' => $copy['problem'],
                    'approach' => $copy['approach'],
                    'impact' => $copy['impact'],
                    'updated_at' => $now,
                ]);
        }
    }

    public function down(): void
    {
        // Content refresh only.
    }
};
