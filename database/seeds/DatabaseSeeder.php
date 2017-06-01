<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Model::unguard();

        // $this->call('UserTableSeeder');

        Model::reguard();

        DB::table('countries')->insert([
            'name' => 'Colombia',
            'domain' => 'localhost',
            'code' => 'code',
        ]);

        DB::table('categories')->insert([
            'name' => 'Blog',
            'slug' => 'blog'
        ]);
    }
}
