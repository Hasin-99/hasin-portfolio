<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('projects')) {
            return;
        }

        $old = 'https://full-stack-dynamic-portfolio1.onrender.com';
        $new = 'https://hasin-portfolio.onrender.com';

        DB::table('projects')
            ->where('description', 'like', '%'.$old.'%')
            ->orderBy('id')
            ->get(['id', 'description'])
            ->each(function ($row) use ($old, $new) {
                DB::table('projects')->where('id', $row->id)->update([
                    'description' => str_replace($old, $new, (string) $row->description),
                    'updated_at' => now(),
                ]);
            });
    }

    public function down(): void
    {
        if (! Schema::hasTable('projects')) {
            return;
        }

        $old = 'https://hasin-portfolio.onrender.com';
        $new = 'https://full-stack-dynamic-portfolio1.onrender.com';

        DB::table('projects')
            ->where('description', 'like', '%'.$old.'%')
            ->orderBy('id')
            ->get(['id', 'description'])
            ->each(function ($row) use ($old, $new) {
                DB::table('projects')->where('id', $row->id)->update([
                    'description' => str_replace($old, $new, (string) $row->description),
                    'updated_at' => now(),
                ]);
            });
    }
};
