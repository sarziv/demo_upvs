<?php

use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_status')->insert([
            'status'=>'Unassigned',
        ]);
        DB::table('order_status')->insert([
            'status'=>'Initializing',
        ]);
        DB::table('order_status')->insert([
            'status'=>'Picking',
        ]);
        DB::table('order_status')->insert([
            'status'=>'Packing',
        ]);
        DB::table('order_status')->insert([
            'status'=>'Order_Finished',
        ]);
    }
}
