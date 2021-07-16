<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->fname = "Anup";
        $user->lname = "Chakraborty";
        $user->email = "anup9449@gmail.com";
        $user->password =Hash::make("12345678");
        $user->dateofbirth = NULL;
        $user->save();
    }
}
