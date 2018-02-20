<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SlidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slides')->insert([
            'title' => 'Smart Solution LLC',
            'description' => 'Байгууллагад зориулсан тоног төхөөрөмж, программ хангамжийн цогц шийдэл',
            'file' => '/img/fabio-mangione.jpg',
            'fileType' => 'image',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
