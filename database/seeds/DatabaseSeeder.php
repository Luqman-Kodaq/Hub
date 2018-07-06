<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //  $this->call(LaratrustSeeder::class);
    //   factory('App\User', 13)->create();
    //   factory('App\Profile', 20)->create();
        // $this->call(SettingsTableSeeder::class);

        $user = App\User::create([
            'name' => 'Abu Muhsin',
            'email' => 'abumuhsin@gmail.com',
            'password' => bcrypt('contenthub'),
            'admin' => 1,
            'slug' => str_slug('abu muhsin'),
            'gender' => 1,
            'active' => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id
        ]);
    }
}
