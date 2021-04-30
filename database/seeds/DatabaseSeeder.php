<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* DB::table('posts')->insert([
            'title' => 'Post '.Str::random(10),
            'body' => 'Body '.Str::random(10),
        ]); */
    }
}
