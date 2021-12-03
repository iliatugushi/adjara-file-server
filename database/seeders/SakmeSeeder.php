<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sakme;

class SakmeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'identifikator' => 'sak_1',
                'path' => 'test/anaweri_1/sakme_1'
            ],
            [
                'identifikator' => 'sak_2',
                'path' => 'test/anaweri_1/sakme_2'
            ],
        ];
        foreach ($data as $key => $val) {
            Sakme::create($val);
        }
    }
}
