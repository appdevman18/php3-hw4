<?php

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->delete();

        $adminRole = Role::where('name', 'admin')->first();

        $admin = User::create(
            [
                'name' => 'Admin User',
                'email' => 'admin@admin.com',
                'password' => Hash::make('12345678'),
            ]
        );

        $admin->roles()->attach($adminRole);
    }
}
