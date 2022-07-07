<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    public function run()
    {
        Person::factory(25)->hasPhones(3)->hasEmails(2)->create();
    }
}
