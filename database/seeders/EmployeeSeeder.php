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
                'company_id' => 1,
                'email' => 'a@gmail.com',
                'phone' => rand(100000, 9999999)
            ],
            [
                'firstname' => 'b',
                'lastname' => 'bb',
                'company_id' => 2,
                'email' => 'b@gmail.com',
                'phone' => rand(100000, 9999999)
            ],
            [
                'firstname' => 'c',
                'lastname' => 'cc',
                'company_id' => 3,
                'email' => 'c@gmail.com',
                'phone' => rand(100000, 9999999)
            ],
            [
                'firstname' => 'd',
                'lastname' => 'dd',
                'company_id' => 4,
                'email' => 'd@gmail.com',
                'phone' => rand(100000, 9999999)
            ],
            [
                'firstname' => 'e',
                'lastname' => 'ee',
                'company_id' => 5,
                'email' => 'e@gmail.com',
                'phone' => rand(100000, 9999999)
            ],
            [
                'firstname' => 'f',
                'lastname' => 'ff',
                'company_id' => 6,
                'email' => 'f@gmail.com',
                'phone' => rand(100000, 9999999)
            ],
            [
                'firstname' => 'g',
                'lastname' => 'gg',
                'company_id' => 7,
                'email' => 'g@gmail.com',
                'phone' => rand(100000, 9999999)
            ],
            [
                'firstname' => 'h',
                'lastname' => 'hh',
                'company_id' => 8,
                'email' => 'h@gmail.com',
                'phone' => rand(100000, 9999999)
            ],
            [
                'firstname' => 'i',
                'lastname' => 'ii',
                'company_id' => 9,
                'email' => 'i@gmail.com',
                'phone' => rand(100000, 9999999)
            ],
            [
                'firstname' => 'j',
                'lastname' => 'jj',
                'company_id' => 10,
                'email' => 'j@gmail.com',
                'phone' => rand(100000, 9999999)
            ],
            [
                'firstname' => 'k',
                'lastname' => 'kk',
                'company_id' => 11,
                'email' => 'k@gmail.com',
                'phone' => rand(100000, 9999999)
            ],
            [
                'firstname' => 'l',
                'lastname' => 'll',
                'company_id' => 12,
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
