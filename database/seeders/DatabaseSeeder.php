<?php

namespace Database\Seeders;

use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\AgentSeeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call([
        //     AgentSeeder::class,
        // ]);

        DB::table('countries')->insert([
            [
                "name" => "Republique Democratique du Congo",
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
        ]);

        DB::table('cities')->insert([
            [
                "name" => "Kinshasa",
                "country_id" => 1,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
        ]);

        DB::table('communes')->insert([
            [
                "name" => "Bandalungwa",
                "city_id" => 1,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Barumbu",
                "city_id" => 1,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Bumbu",
                "city_id" => 1,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Gombe",
                "city_id" => 1,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Kalamu",
                "city_id" => 1,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Kasa-Vubu",
                "city_id" => 1,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Kimbanseke",
                "city_id" => 1,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Kinshasa",
                "city_id" => 1,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Kintambo",
                "city_id" => 1,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Kisenso",
                "city_id" => 1,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Lemba",
                "city_id" => 1,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Limete",
                "city_id" => 1,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Lingwala",
                "city_id" => 1,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Makala",
                "city_id" => 1,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Maluku",
                "city_id" => 1,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Masina",
                "city_id" => 1,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Matete",
                "city_id" => 1,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Mont-Ngafula",
                "city_id" => 1,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Ndjili",
                "city_id" => 1,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Ngaba",
                "city_id" => 1,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Ngaliema",
                "city_id" => 1,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Ngiri-Ngiri",
                "city_id" => 1,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Nsele",
                "city_id" => 1,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Selembao",
                "city_id" => 1,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ]
        ]);

        DB::table('status_properties')->insert([
            [
                "name" => "À louer",
                "is_active" => true,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "À vendre",
                "is_active" => true,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Vendu",
                "is_active" => true,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "En négociation",
                "is_active" => true,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
        ]);


        DB::table('caracteristiques')->insert([
            [
                "name" => "Air conditionné",
                "is_active" => true,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Réfrigérateur",
                "is_active" => true,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Machine à laver",
                "is_active" => true,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Internet haut débit",
                "is_active" => true,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Piscine",
                "is_active" => true,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Parking",
                "is_active" => true,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ]
        ]);


        DB::table('type_properties')->insert([
            [
                "name" => "Villa",
                "is_active" => true,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Appartement",
                "is_active" => true,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Hôtel",
                "is_active" => true,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ],
            [
                "name" => "Maison classique",
                "is_active" => true,
                'created_at' => (Carbon::now())->toDateTimeString(),
                'updated_at' => (Carbon::now())->toDateTimeString()
            ]
        ]);
    }
}
