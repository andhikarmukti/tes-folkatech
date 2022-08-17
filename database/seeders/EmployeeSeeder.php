<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = [
            [
                'firstname' => 'a',
                'lastname' => 'aa',
                'company_id' => rand(0,12),
                'email' => 'a@gmail.com',
                'phone' => rand(100000, 9999999)
            ],
            [
                'firstname' => 'b',
                'lastname' => 'bb',
                'company_id' => rand(0,12),
                'email' => 'b@gmail.com',
                'phone' => rand(100000, 9999999)
            ],
            [
                'firstname' => 'c',
                'lastname' => 'cc',
                'company_id' => rand(0,12),
                'email' => 'c@gmail.com',
                'phone' => rand(100000, 9999999)
            ],
            [
                'firstname' => 'd',
                'lastname' => 'dd',
                'company_id' => rand(0,12),
                'email' => 'd@gmail.com',
                'phone' => rand(100000, 9999999)
            ],
            [
                'firstname' => 'e',
                'lastname' => 'ee',
                'company_id' => rand(0,12),
                'email' => 'e@gmail.com',
                'phone' => rand(100000, 9999999)
            ],
            [
                'firstname' => 'f',
                'lastname' => 'ff',
                'company_id' => rand(0,12),
                'email' => 'f@gmail.com',
                'phone' => rand(100000, 9999999)
            ],
            [
                'firstname' => 'g',
                'lastname' => 'gg',
                'company_id' => rand(0,12),
                'email' => 'g@gmail.com',
                'phone' => rand(100000, 9999999)
            ],
            [
                'firstname' => 'h',
                'lastname' => 'hh',
                'company_id' => rand(0,12),
                'email' => 'h@gmail.com',
                'phone' => rand(100000, 9999999)
            ],
            [
                'firstname' => 'i',
                'lastname' => 'ii',
                'company_id' => rand(0,12),
                'email' => 'i@gmail.com',
                'phone' => rand(100000, 9999999)
            ],
            [
                'firstname' => 'j',
                'lastname' => 'jj',
                'company_id' => rand(0,12),
                'email' => 'j@gmail.com',
                'phone' => rand(100000, 9999999)
            ],
            [
                'firstname' => 'k',
                'lastname' => 'kk',
                'company_id' => rand(0,12),
                'email' => 'k@gmail.com',
                'phone' => rand(100000, 9999999)
            ],
            [
                'firstname' => 'l',
                'lastname' => 'll',
                'company_id' => rand(0,12),
                'email' => 'l@gmail.com',
                'phone' => rand(100000, 9999999)
            ],
        ];

        foreach($employees as $employee){
            Employee::create([
                'firstname' => $employee['firstname'],
                'lastname' => $employee['lastname'],
                'company_id' => $employee['company_id'],
                'email' => $employee['email'],
                'phone' => $employee['phone'],
            ]);
        }
    }
}
