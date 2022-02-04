<?php

namespace Database\Seeders;

use App\Models\Customers;
use Illuminate\Database\Seeder;
use Faker\Factory as DataPalsu;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $DataPalsu = DataPalsu::create('id_ID');
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            # code...
            $gender = $DataPalsu->randomElement(['male', 'female']);
            $data[] = [
                'email' => $DataPalsu->email(),
                'first_name' => $DataPalsu->firstName($gender),
                'last_name' => $DataPalsu->lastName(),
                'city' => $DataPalsu->city(),
                'address' => $DataPalsu->address(),
                'password' => Hash::make('12345678')
            ];
        }
        (new Customers())->insert($data);
    }
}
