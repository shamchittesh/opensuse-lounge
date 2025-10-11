<?php

namespace App\Console\Commands;

use App\Enums\Enums\UserRole;
use App\Models\User;
use Illuminate\Console\Command;

use function Laravel\Prompts\multiselect;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:user {name : Name of the user} {email : Email of the user} {--roles=* : Roles to assign to the user} {--force : Skip roles selection}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');
        $exists = User::query()->where('email', $email)->exists();

        if ($exists) {
            $this->error('User with this email already exists.');

            return 1;
        }

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt(str()->random(16)),
            'roles' => $this->getRoles(),
        ]);

        $this->info('User created successfully!');
    }

    public function getRoles(): array
    {
        $options = UserRole::asSelect();

        $selectedRoles = $this->option('roles');

        foreach ($selectedRoles as $role) {
            if (! UserRole::has($role)) {
                $this->error("Invalid role: {$role}");
                $this->info('Available roles: '.implode(', ', array_keys($options)));
                exit(1);
            }
        }

        if (empty($selectedRoles) && ! $this->option('force')) {

            return multiselect(
                label: 'Select roles for the user (use space to select, arrow keys to navigate, enter to confirm):',
                options: $options,
                required: true,
            );
        }

        return $selectedRoles;
    }
}
