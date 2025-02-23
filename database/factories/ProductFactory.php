<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Category;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = Category::first();
        if (!$category) {
            $category = Category::factory()->create();
        }

        return [
            'nome' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'descricao' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'preco' => $this->faker->numberBetween(0, 9223372036854775807),
            'quantidade' => $this->faker->word,
            'category_id' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
