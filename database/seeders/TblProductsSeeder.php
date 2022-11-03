<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TblProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_products')->insert(
            [
                [
                    'name' => 'Product 1',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Product 2',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Product 3',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Product 4',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Product 5',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Product 6',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Product 7',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Product 8',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Product 9',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Product 10',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Product 11',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Product 12',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Product 13',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Product 14',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Product 15',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Product 16',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Product 17',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Product 18',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Product 19',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Product 20',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_updated' => date('Y-m-d H:i:s')
                ]
            ]
        );
    }
}
