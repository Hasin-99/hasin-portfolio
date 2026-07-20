<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
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
        DB::table('projects')->update([
            'problem' => null,
            'approach' => null,
            'impact' => null,
        ]);
    }
};
