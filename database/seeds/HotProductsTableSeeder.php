<?php

use Illuminate\Database\Seeder;

class HotProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $product = DB::table('Products')->where('title', '=',
            trim(strtolower('Product for branded foods')))->get();
        $product_id = $product[0]->id;
        DB::table('hot_products')->insert([
            'product_id' => $product_id,
            'created_at' => Carbon\Carbon::now(),
        ]);
    }
}
