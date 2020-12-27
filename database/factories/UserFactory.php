<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Models\Admin;
use App\User;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'name' => 'Rakib',
        'email' => 'admin@gmail.com',
        'email_verified_at' => now(),
        'password' => Hash::make('admin123'),
        'remember_token' => Str::random(10),
    ];
});

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => 'Rakib',
        'email' => 'rakib@gmail.com',
        'email_verified_at' => now(),
        'password' => Hash::make('rakib123'),
        'remember_token' => Str::random(10),
    ];
});

// category factory
$factory->define(Category::class, function (Faker $faker) {
    return [
        'cat_name' => $faker->name,
    ];
});

// post factory
$factory->define(Post::class, function (Faker $faker) {
    return [
        'cat_id' => rand(1,5),
        'admin_id' => 1,
        'user_id' => null,
        'comment_id'=>rand(1,10),
        'title'=>$faker->sentence,
        'description'=>$faker->paragraph,
        'photo'=>'default.png',

    ];
});