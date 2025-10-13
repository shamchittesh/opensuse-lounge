<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Enums\Enums\UserRole;
use App\Models\User;
use Illuminate\Console\Command;

class EditUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:edit-user {--override-name : Name of the user} {email : Email of the user} {--override-roles=* : Roles to override}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Edit a user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->option('override-name');
        $email = $this->argument('email');

        $user = User::query()->where('email', $email)->first();

        if (! $user) {
            $this->error('User with this email does not exist.');

            return 1;
        }

        $user->update([
            'name' => $$user->name ?? $name,
            'email' => $email,
            'roles' => blank($this->option('override-roles')) ? $user->roles : $this->getRoles(),
        ]);

        $this->info('User updated successfully!');
    }

    public function getRoles(): array
    {
        $options = UserRole::asSelect();

        $selectedRoles = $this->option('override-roles');

        foreach ($selectedRoles as $role) {
            if (! UserRole::has($role)) {
                $this->error("Invalid role: {$role}");
                $this->info('Available roles: '.implode(', ', array_keys($options)));
                exit(1);
            }
        }

        return $selectedRoles;
    }
}
