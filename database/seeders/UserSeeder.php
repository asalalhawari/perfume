<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // تأكد من استيراد نموذج User

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'), // تأكد من استخدام bcrypt لتشفير كلمة المرور
        ]);
    }
}
