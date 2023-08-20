<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\User;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = User::all(); // جلب جميع المستخدمين

        foreach ($users as $user) {
            Employee::create([
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'department' => 'القسم الافتراضي', // تعديل حسب القسم
            ]);
        }
    }
}
