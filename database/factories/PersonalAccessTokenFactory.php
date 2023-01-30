<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory
 */
class PersonalAccessTokenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user_id = User::all()->random()->id;
        return [
            'tokenable_type' => 'App/Models/User',
            'tokenable_id' => $user_id,
            'user_id' => $user_id,
            'name' => 'Factory',
            'token' => Str::random(64),
            'abilities' => "['payments:create', 'payments:view']"
        ];
    }
}
