<?php

namespace Database\Factories;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Factories\Factory;

class TodoFactory extends Factory
{
	protected $model = Todo::class;

	public function definition()
	{
		return [
			'user_id' => '1',
			'todo' => $this->faker->sentence(),
			'priority' => $this->faker->randomElement(['low', 'medium', 'high']),
			'deadline_date' => $this->faker->date(),
			'status' => $this->faker->randomElement(['done', 'waiting']),
		];
	}
}
