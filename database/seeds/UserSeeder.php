<?php
// ! import model user
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //? membuat column user
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456')

        ]);

        //! tambahkan fungsi Asign role
        $admin->assignRole('admin');

        //? membuat column user
        $user = User::create([
            'name' => 'owner',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456')

        ]);

        //! tambahkan fungsi Asign role
        $user->assignRole('user');
    }
}
