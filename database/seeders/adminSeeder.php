<?php

namespace Database\Seeders;

use App\Models\admin_side\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
class adminSeeder extends Seeder
{
    
    public function run(): void
    {
        //
        $admin = Admin::create([
            'admin_name'    => 'super admin',
            'type'          => 'super admin',
            'vender_id'     => 0,
            'mobile'        => 12345678,
            'email'         => 'superadmin@superadmin.com',
            'password'      => Hash::make('12345678'),
            'image'         => 'abc',
            'active_status' => 1,
            'created_at'    => NOW(),
            'updated_at'    => NOW(),
        ]);
        $admin->assignRole('admin');
    }
}
