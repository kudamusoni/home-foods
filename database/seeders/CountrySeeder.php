<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['iso_code' => 'US', 'name' => 'United States'],
            ['iso_code' => 'GB', 'name' => 'United Kingdom'],
            ['iso_code' => 'CA', 'name' => 'Canada'],
            ['iso_code' => 'AU', 'name' => 'Australia'],
            // European Countries
            ['iso_code' => 'DE', 'name' => 'Germany'],
            ['iso_code' => 'FR', 'name' => 'France'],
            ['iso_code' => 'IT', 'name' => 'Italy'],
            ['iso_code' => 'ES', 'name' => 'Spain'],
            ['iso_code' => 'PT', 'name' => 'Portugal'],
            ['iso_code' => 'NL', 'name' => 'Netherlands'],
            ['iso_code' => 'BE', 'name' => 'Belgium'],
            ['iso_code' => 'CH', 'name' => 'Switzerland'],
            ['iso_code' => 'SE', 'name' => 'Sweden'],
            ['iso_code' => 'NO', 'name' => 'Norway'],
            // African Countries
            ['iso_code' => 'ZA', 'name' => 'South Africa'],
            ['iso_code' => 'NG', 'name' => 'Nigeria'],
            ['iso_code' => 'EG', 'name' => 'Egypt'],
            ['iso_code' => 'KE', 'name' => 'Kenya'],
            ['iso_code' => 'GH', 'name' => 'Ghana'],
            ['iso_code' => 'MA', 'name' => 'Morocco'],
            ['iso_code' => 'TZ', 'name' => 'Tanzania'],
            ['iso_code' => 'ET', 'name' => 'Ethiopia'],
            ['iso_code' => 'SN', 'name' => 'Senegal'],
            ['iso_code' => 'UG', 'name' => 'Uganda'],
            ['iso_code' => 'CI', 'name' => 'Côte d\'Ivoire'],
            ['iso_code' => 'CM', 'name' => 'Cameroon'],
            ['iso_code' => 'ZM', 'name' => 'Zambia'],
            ['iso_code' => 'AO', 'name' => 'Angola'],
            ['iso_code' => 'RW', 'name' => 'Rwanda'],
            ['iso_code' => 'MW', 'name' => 'Malawi'],
            ['iso_code' => 'BJ', 'name' => 'Benin'],
            ['iso_code' => 'BF', 'name' => 'Burkina Faso'],
            ['iso_code' => 'ML', 'name' => 'Mali'],
            ['iso_code' => 'MG', 'name' => 'Madagascar'],
            ['iso_code' => 'TD', 'name' => 'Chad'],
            ['iso_code' => 'ZW', 'name' => 'Zimbabwe'],
            ['iso_code' => 'SS', 'name' => 'South Sudan'],
            ['iso_code' => 'SD', 'name' => 'Sudan'],
            ['iso_code' => 'TG', 'name' => 'Togo'],
            ['iso_code' => 'NA', 'name' => 'Namibia'],
            ['iso_code' => 'BW', 'name' => 'Botswana'],
            ['iso_code' => 'ER', 'name' => 'Eritrea'],
            ['iso_code' => 'GA', 'name' => 'Gabon'],
            ['iso_code' => 'MR', 'name' => 'Mauritania'],
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
