<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $adminEmail = 'md.shadmanhasin520k82@gmail.com';

        $admin = User::where('email', $adminEmail)->first();

        if (!$admin) {
            // Remove legacy placeholder admin if present
            User::where('email', 'mdjulfikerhasan191212@gmail.com')->delete();

            User::create([
                'name' => 'Md. Shadman Hasin',
                'email' => $adminEmail,
                'password' => Hash::make('Hasin@Portfolio2026'),
                'is_admin' => true,
            ]);
        } else {
            $admin->forceFill([
                'name' => 'Md. Shadman Hasin',
                'password' => Hash::make('Hasin@Portfolio2026'),
                'is_admin' => true,
            ])->save();
        }

        $this->call(InitialDataSeeder::class);
    }
}
