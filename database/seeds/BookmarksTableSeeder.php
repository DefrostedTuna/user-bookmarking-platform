<?php

use Illuminate\Database\Seeder;

class BookmarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(\App\User::class, 5)->create();

        foreach($users as $user) {
            factory(\App\Bookmark::class, 5)->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
