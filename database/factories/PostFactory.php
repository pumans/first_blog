<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'author_id' =>$faker->numberBetween(1,6),
        'title' => $faker->text(35),
        'body' => $faker->text(1500),
        'image'=>$faker->imageUrl(750, 300, null, true,null,false)
    ];
});
