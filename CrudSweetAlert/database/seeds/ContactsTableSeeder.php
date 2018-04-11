<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
   
    public function run()
    {
        factory(App\Contact::class, 50)->create();
    }
}
