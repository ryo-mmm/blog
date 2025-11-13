<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    // ロケールを日本語 (ja_JP) に設定
    protected $faker = null;

    public function __construct($count = null, $states = null, $hasTable = null, $connection = null, $faker = null)
    {
        parent::__construct($count, $states, $hasTable, $connection, $faker);
        // 日本語ロケールのインスタンスを生成
        $this->faker = \Faker\Factory::create('ja_JP');
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 日本語のタイトル (適当な文章を生成)
            'title' => $this->faker->realText(mt_rand(20, 50)),
            // 日本語の本文 (長文を生成)
            'content' => $this->faker->realText(mt_rand(500, 1500)),
        ];
    }
}
