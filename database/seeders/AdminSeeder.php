<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'name' => 'lms',
            'username' => 'admin',
            'role_id' => '1',
            'email' => 'lms@gmail.com',
            'phone_number' => '9498017460',
            'password' => bcrypt('Lms@123'),
            'company_name' => 'cloudrevelinnovations',
        ]);
        
    }
}
