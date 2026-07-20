<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('projects', 'problem')) {
            return;
        }

        $rows = require database_path('data/project_thinking.php');
        $now = now();

        foreach ($rows as $title => $fields) {
            DB::table('projects')->where('title', $title)->update(array_merge($fields, [
                'updated_at' => $now,
            ]));
        }
    }

    public function down(): void
    {
        // Content refresh only.
    }
};
