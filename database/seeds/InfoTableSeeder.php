<?php

use Illuminate\Database\Seeder;
use App\Models\Info;
class InfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Info::insert([
            [
                'name' => 'Facebook',
                'value' => 'https://www.facebook.com/ThaiVanLoiDN',
            ],
            [
                'name' => 'Twitter',
                'value' => 'https://twitter.com/ThaiVanLoiDN',
            ],
            [
                'name' => 'Youtube',
                'value' => 'https://www.youtube.com/channel/UC996hC1EXF3Eb8_mybgNbxw',
            ],
            [
                'name' => 'Google Plus',
                'value' => 'https://plus.google.com/+ThaiVanLoiDN',
            ],
            [
                'name' => 'Flickr',
                'value' => 'https://www.flickr.com/photos/thailoipro9x',
            ],
        
        ]);
    }
}
