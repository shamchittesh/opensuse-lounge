<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => $this->faker->unique()->userName(),
            'email_target' => $this->faker->unique()->safeEmail(),
            'email_nick' => $this->faker->optional()->userName(),
            'email_full' => $this->faker->optional()->email(),
            'libera_nick' => $this->faker->optional()->userName(),
            'libera_cloak' => $this->faker->optional()->domainWord() . '.users.libera.chat',
            'libera_cloak_applied' => $this->faker->optional()->dateTimeThisYear(),
            'status' => $this->faker->randomElement(['active', 'emeritus']),
        ];
    }
}
