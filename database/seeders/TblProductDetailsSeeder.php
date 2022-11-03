<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TblProductDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_product_details')->insert(
            [
                [
                    'product_id' => '1',
                    'description' => 'Product Description 1',
                    'product_type' => 'Product Type 1',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'product_id' => '2',
                    'description' => 'Product Description 2',
                    'product_type' => 'Product Type 2',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'product_id' => '3',
                    'description' => 'Product Description 3',
                    'product_type' => 'Product Type 3',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'product_id' => '4',
                    'description' => 'Product Description 4',
                    'product_type' => 'Product Type 4',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'product_id' => '5',
                    'description' => 'Product Description 5',
                    'product_type' => 'Product Type 5',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'product_id' => '6',
                    'description' => 'Product Description 6',
                    'product_type' => 'Product Type 6',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'product_id' => '7',
                    'description' => 'Product Description 7',
                    'product_type' => 'Product Type 7',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'product_id' => '8',
                    'description' => 'Product Description 8',
                    'product_type' => 'Product Type 8',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'product_id' => '9',
                    'description' => 'Product Description 9',
                    'product_type' => 'Product Type 9',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'product_id' => '10',
                    'description' => 'Product Description 10',
                    'product_type' => 'Product Type 10',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'product_id' => '11',
                    'description' => 'Product Description 11',
                    'product_type' => 'Product Type 11',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'product_id' => '12',
                    'description' => 'Product Description 12',
                    'product_type' => 'Product Type 12',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'product_id' => '13',
                    'description' => 'Product Description 13',
                    'product_type' => 'Product Type 13',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'product_id' => '14',
                    'description' => 'Product Description 14',
                    'product_type' => 'Product Type 14',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'product_id' => '15',
                    'description' => 'Product Description 15',
                    'product_type' => 'Product Type 15',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'product_id' => '16',
                    'description' => 'Product Description 16',
                    'product_type' => 'Product Type 16',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'product_id' => '17',
                    'description' => 'Product Description 17',
                    'product_type' => 'Product Type 17',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'product_id' => '18',
                    'description' => 'Product Description 18',
                    'product_type' => 'Product Type 18',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'product_id' => '19',
                    'description' => 'Product Description 19',
                    'product_type' => 'Product Type 19',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'product_id' => '20',
                    'description' => 'Product Description 20',
                    'product_type' => 'Product Type 20',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ]
            ]
        );
    }
}
