<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\File;

class FileSeeder extends Seeder
{
    public function run()
    {

        for ($i = 1; $i < 15; $i++) {
            $new = new File;
            $new->sakme_id = 'AR1_CR 1_FND1_AN1_SK1';
            $new->identifikator = 'file_' . $i;
            $new->name = 'news-' . $i;
            $new->mime_type = 'jpg';
            $new->path = 'test/anaweri_1/sakme_1/news-' . $i . '.jpg';
            $new->save();
        }
    }
}
