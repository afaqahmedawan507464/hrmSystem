<?php

namespace Database\Seeders;

use App\Models\user_side\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class employeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
          Employee::create(
            [
            'employee_name'        => 'employee 1',
            'add_id'               => 1,
            'type'                 => 'employee',
            'mobile'               => 12345678,
            'email'                => 'employee@employee.com',
            'password'             => Hash::make('12345678'),
            'image'                => 'abc',
            'roll_status'          => 4,
            'online_status'        => 0,
            'active_status'        => 1,
            'created_at'           => NOW(),
            'updated_at'           => NOW(),
           ]
            );
        
    }
}
