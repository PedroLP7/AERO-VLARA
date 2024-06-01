<?php

namespace Database\Seeders;

use App\Models\User2;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class users_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User2::create([
            'userName' => 'admin',
            'LastName1' => 'admin',
            'LastName2' => 'admin',
            'Email' => 'admin@admin.es ',
            'phone' => '66666666',
            'Password' =>  Hash::make('1234'),
            'userTypeId_fk' => 1,
        ]);
        User2::create([
            'userName' => 'customer',
            'LastName1' => 'lastCustomer',
            'LastName2' => '',
            'Email' => 'customer@customer.es ',
            'phone' => '1123454',
            'Password' =>  Hash::make('1234'),
            'userTypeId_fk' => 2,
        ]);
    }
}
