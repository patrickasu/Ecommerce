<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class WraistWatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'cover_img' => '/img/re1.png',
            'name' => 'Rockland',
            'description' => 'Mens Rugged Workwear Rockland-boomed',
            'price' => '280',
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);
        DB::table('products')->insert([
            'cover_img' => '/img/cl1.png',
            'name' => 'Sweatshirt',
            'description' => 'Mens Rain Defender Rockland Sherppa lined',
            'price' => '300',
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);
        DB::table('products')->insert([
            'cover_img' => '/img/cl4.png',
            'name' => 'Running',
            'description' => 'Mens Sportswear 2019 Hooded Windrunner Jacket',
            'price' => '40',
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);
        DB::table('products')->insert([
            'cover_img' => '/img/cl5.png',
            'name' => 'Windrunner',
            'description' => 'Fleece Badge Of Sport Graphic Hoodies',
            'price' => '210',
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);
    }
}
