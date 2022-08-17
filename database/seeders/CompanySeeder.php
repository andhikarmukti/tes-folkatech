<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            [
                'name' => 'PT. Andhika Raharja Mukti',
                'email' => 'andhikarmukti@gmail.com',
                'logo' => 'logo A',
                'website' => 'andhikarmukti.com'
            ],
            [
                'name' => 'PT. B',
                'email' => 'b@gmail.com',
                'logo' => 'logo B',
                'website' => 'b.com'
            ],
            [
                'name' => 'PT. C',
                'email' => 'c@gmail.com',
                'logo' => 'logo C',
                'website' => 'c.com'
            ],
            [
                'name' => 'PT. D',
                'email' => 'd@gmail.com',
                'logo' => 'logo D',
                'website' => 'd.com'
            ],
            [
                'name' => 'PT. E',
                'email' => 'e@gmail.com',
                'logo' => 'logo E',
                'website' => 'e.com'
            ],
            [
                'name' => 'PT. F',
                'email' => 'f@gmail.com',
                'logo' => 'logo F',
                'website' => 'f.com'
            ],
            [
                'name' => 'PT. G',
                'email' => 'g@gmail.com',
                'logo' => 'logo G',
                'website' => 'g.com'
            ],
            [
                'name' => 'PT. H',
                'email' => 'h@gmail.com',
                'logo' => 'logo H',
                'website' => 'h.com'
            ],
            [
                'name' => 'PT. I',
                'email' => 'i@gmail.com',
                'logo' => 'logo I',
                'website' => 'i.com'
            ],
            [
                'name' => 'PT. J',
                'email' => 'j@gmail.com',
                'logo' => 'logo J',
                'website' => 'j.com'
            ],
            [
                'name' => 'PT. K',
                'email' => 'k@gmail.com',
                'logo' => 'logo K',
                'website' => 'k.com'
            ],
            [
                'name' => 'PT. L',
                'email' => 'l@gmail.com',
                'logo' => 'logo L',
                'website' => 'l.com'
            ],
        ];

        foreach($companies as $company){
            Company::create([
                'name' => $company['name'],
                'email' => $company['email'],
                'logo' => $company['logo'],
                'website' => $company['website'],
            ]);
        }
    }
}
