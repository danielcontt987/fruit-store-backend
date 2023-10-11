<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Colony;
use Illuminate\Database\Seeder;

class ClientSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colony = Colony::create([
            'zipcode' => 96325,
            'name' => "Benito Juárez",
            'municipality' => 'San Blas',
            'state' => 'Nayarit',
        ]);

        Client::create([
            'name' => "José Daniel",
            'last_name' => "Contreras Pérez",
            'telephone' => 3111230167,
            'email' => "jose_daniel16051999@outlook.com",
            'curp' => "COPD990516HNTNRN03",
            'rfc' => "COPD990189I98",
            'int' => 45,
            'ext' => 56,
            'status' => "active",
            'type_user' => "employee",
            'colony_id' => $colony->id,
            'business_id' => 1,
            'user_id' => 1,
        ]);

        $colony = Colony::create([
            'zipcode' => 96325,
            'name' => "Centro",
            'municipality' => 'San Blas',
            'state' => 'Nayarit',
        ]);

        Client::create([
            'name' => "Laisha Ivania",
            'last_name' => "Olivarria del Real",
            'telephone' => 3111230167,
            'email' => "laisha12@outlook.com",
            'curp' => "COPD990516HNTNRN03",
            'rfc' => "COPD990189I98",
            'int' => 45,
            'ext' => 56,
            'status' => "active",
            'type_user' => "employee",
            'colony_id' => $colony->id,
            'business_id' => 1,
            'user_id' => 1,
        ]);
    }
}
