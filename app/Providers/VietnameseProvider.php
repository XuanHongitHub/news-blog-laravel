<?php

namespace App\Providers;

use Faker\Provider\Base;

class VietnameseProvider extends Base
{
    public function vietName()
    {
        $firstNames = ['Nguyễn', 'Trần', 'Lê', 'Phạm', 'Huỳnh', 'Vũ'];
        $lastNames = ['Anh', 'Bích', 'Chi', 'Dũng', 'Hà', 'Hương'];

        return $firstNames[array_rand($firstNames)] . ' ' . $lastNames[array_rand($lastNames)];
    }

    public function vietText($maxNbChars = 200)
    {
        $faker = $this->generator;
        return $faker->text($maxNbChars);
    }

}
