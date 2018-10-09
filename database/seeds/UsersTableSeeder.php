<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        // 	 'name'  => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('123456')
        // ]);

        $faker = Faker\Factory::create();
    	for ($i = 0; $i < 50; $i++) {
            DB::table('users')->insert([ //,
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => bcrypt('123456')
            ]);
        }
    }
}
