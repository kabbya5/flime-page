<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $catName = $this->faker->text(rand(8,30));
        return [
            'post_name' =>  $catName,
            'section_id' => rand(1,2),
            'subsection_id' => rand(1,11),
            'slug' => str_slug($catName),
            'thumbnail' => 'https://source.unsplash.com/random',
            'file_url' => 'https://source.unsplash.com/random',
            'post_date' => rtrim($this->faker->sentence(rand(3,6)),'.'),
            'post_desciption' => $this->faker->paragraphs(rand(3,6),true),
        ];
    }
}
