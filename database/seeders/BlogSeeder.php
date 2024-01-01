<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->each(function (User $user) {
            //Blog::factory()->for($user)->create();

            $subscribers = User::whereNot('id', $user->id)->get()->random(3);

            Blog::factory()->for($user)->hasAttached(
                factory: $subscribers,
                relationship: 'subscribers'
            )->create();

            //Blog::factory()->for($user)->create()
            //    ->subscribers()
            //    ->sync($subscribers);            
        });
    }
}
