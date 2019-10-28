<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=> 'user',
            'email'=> 'user@user.com',
            'password'=> '$2y$10$Xs2kW7SEg0LoAWpNGN4A8.illUXYRfiE8tTjolCh7ghJGyMj/HkFW',
            'type'=>'user',
        ]);
        DB::table('users')->insert([
            'name'=> 'admin',
            'email'=> 'admin@admin.com',
            'password'=> '$2y$10$Xs2kW7SEg0LoAWpNGN4A8.illUXYRfiE8tTjolCh7ghJGyMj/HkFW',
            'type'=>'admin',
        ]);
        DB::table('users')->insert([
            'name'=> 'tech',
            'email'=> 'tech@tech.com',
            'password'=> '$2y$10$Xs2kW7SEg0LoAWpNGN4A8.illUXYRfiE8tTjolCh7ghJGyMj/HkFW',
            'type'=>'tech',
        ]);
    }
}
