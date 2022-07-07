<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    public function definition()
    {
        $baseAvatarUrl = "https://cdn4.iconfinder.com/data/icons/people-avatars-12/24/";

        $avatars = [
            'people_avatar_head_starwars_darth_vader-128.png',
            'people_avatar_head_skull_skeleton-128.png',
            'people_avatar_head_v_vendetta_anonymus-128.png',
            'people_avatar_head_marvel_thor_asgardian-128.png',
            'people_avatar_head_deadpool_marvel_hero-128.png',
            'people_avatar_head_spiderman_marvel_spider_man-128.png',
            'people_avatar_head_iron_man_marvel_hero-128.png',
            'people_avatar_head_comic_batman_bat_man-128.png',
            'people_avatar_head_jason_mask_hokey_horror_movie-128.png',
            'people_avatar_head_charlie_chaplin_movie_star-128.png',
            'people_avatar_head_harry_potter_mage_magic-128.png',
            'people_avatar_head_wolverine_logan_xman_marvel-128.png',
            'people_avatar_head_old_man_beard_glasses_bald-128.png',
        ];

        return [
            'name'     => $this->faker->firstName() . ' ' . $this->faker->lastName(),
            'role'     => $this->faker->jobTitle(),
            'avatar'   => $baseAvatarUrl . $this->faker->randomElement($avatars),
            'favorite' => $this->faker->boolean(40),
        ];
    }
}
