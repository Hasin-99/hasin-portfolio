<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    protected $signature = 'admin:create
        {--email=mdjulfikerhasan191212@gmail.com : Admin user email}
        {--password=Hasan2233 : Admin user password}
        {--name=Admin : Admin user name}
    ';

    protected $description = 'Create or update admin user';

    public function handle()
    {
        $email = $this->option('email');
        $password = $this->option('password');
        $name = $this->option('name');

        try {
            $admin = User::where('email', $email)->first();

            if ($admin) {
                if ($this->confirm("An admin user with this email already exists. Overwrite password & data?", true)) {
                    $admin->update([
                        'name' => $name,
                        'password' => Hash::make($password),
                        'is_admin' => true,
                    ]);
                    $this->info('Admin user updated successfully!');
                } else {
                    $this->info('No changes made.');
                    return 0;
                }
            } else {
                User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => Hash::make($password),
                    'is_admin' => true,
                ]);
                $this->info('Admin user created successfully!');
            }

            $this->info("Email: {$email}");
            $this->info("Password: {$password}");
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
            return 1;
        }

        return 0;
    }
}