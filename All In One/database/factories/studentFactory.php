<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\student>
 */
class studentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Student::class;
    public function definition()
    {
        return [
            'firstname' => fake()->name,
            'lastname' => fake()->name,
            'email' => fake()->email, 
            'phonenumber' => 7788995544,
            'gender' =>'male',
            'password' => 'arun1234'
        ];
    }
}