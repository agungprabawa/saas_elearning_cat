<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\User\UserSrvAssosiation;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 100) as $index) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'address' => $faker->address,
                'username' => $faker->userName,
                'password' => bcrypt('secret'),
                'active_session' => 9,
                'active_status'=>3,
            ]);
            
            UserSrvAssosiation::create([
                'id_user'=>$user->id,
                'id_company'=>9,
                'status' => 3
            ]);

        }
    }
}
