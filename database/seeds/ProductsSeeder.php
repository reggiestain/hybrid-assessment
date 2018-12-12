<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
       // check if table users is empty
        if(DB::table('products')->get()->count() == 0){

            DB::table('products')->insert([

                [
                    'name' => 'New Look Jeggings Blue',
                    'description' => 'New Look Jeggings Blue',
                    'product_category_id' => 1,
                    'price' => 0,
                    'discount' => 0,
                    'mime_type'=>'images/products/women/catalog-1.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Rip Curl Spring Fill Tank Grey',
                    'description' => 'Rip Curl Spring Fill Tank Grey',
                    'product_category_id' => 1,
                    'price' => 0,
                    'discount' => 0,
                    'mime_type'=>'images/products/women/catalog-2.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Russell Athletic',
                    'description' => 'Russell Athletic',
                    'product_category_id' => 1,
                    'price' => 0,
                    'discount' => 0,
                    'mime_type'=>'images/products/women/catalog-3.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Puma Sportstyle Prime',
                    'description' => 'Puma Sportstyle Prime',
                    'product_category_id' => 2,
                    'price' => 0,
                    'discount' => 0,
                    'mime_type'=>'images/products/men/catalog-1.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Utopia Fleece Joggers Dark Grey',
                    'description' => 'Utopia Fleece Joggers Dark Grey',
                    'product_category_id' => 2,
                    'price' => 0,
                    'discount' => 0,
                    'mime_type'=>'images/products/men/catalog-2.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Soviet M Atom Golfer Navy',
                    'description' => 'Soviet M Atom Golfer Navy',
                    'product_category_id' => 2,
                    'price' => 0,
                    'discount' => 0,
                    'mime_type'=>'images/products/men/catalog-3.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Olympic Recess Boys Velcro',
                    'description' => 'Olympic Recess Boys Velcro',
                    'product_category_id' => 3,
                    'price' => 0,
                    'discount' => 0,
                    'mime_type'=>'images/products/kids/catalog-1.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],                
                [
                    'name' => 'Quiksilver Bubble Dream Boys',
                    'description' => 'Quiksilver Bubble Dream Boys',
                    'product_category_id' => 3,
                    'price' => 0,
                    'discount' => 0,
                    'mime_type'=>'images/products/kids/catalog-2.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Lizzard',
                    'description' => 'Lizzard Teen Boys Boardie Short',
                    'product_category_id' => 3,
                    'price' => 0,
                    'discount' => 0,
                    'mime_type'=>'images/products/kids/catalog-3.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],

            ]);

        } else { echo "\e[31mTable is not empty, therefore NOT "; }

    }

}
