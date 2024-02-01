<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create(["id" => 1, "title" => "情報科学専門学校", "latitude" => "35.4685995", "longitude" => "139.6232561","images_path"=>"isc.jpg","user_id"=>1]);
    }
}