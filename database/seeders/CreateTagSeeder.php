<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name'=>'tag 1'
        ]);
        Tag::create([
            'name'=>'tag 2'
        ]);
        Tag::create([
            'name'=>'tag 3'
        ]);
    }
}
