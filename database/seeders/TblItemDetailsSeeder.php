<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TblItemDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_item_details')->insert(
            [
                [
                    'item_id' => '1',
                    'description' => 'Item Description 1',
                    'item_type' => 'Item Type 1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'item_id' => '2',
                    'description' => 'Item Description 2',
                    'item_type' => 'Item Type 2',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'item_id' => '3',
                    'description' => 'Item Description 3',
                    'item_type' => 'Item Type 3',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'item_id' => '4',
                    'description' => 'Item Description 4',
                    'item_type' => 'Item Type 4',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'item_id' => '5',
                    'description' => 'Item Description 5',
                    'item_type' => 'Item Type 5',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'item_id' => '6',
                    'description' => 'Item Description 6',
                    'item_type' => 'Item Type 6',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'item_id' => '7',
                    'description' => 'Item Description 7',
                    'item_type' => 'Item Type 7',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'item_id' => '8',
                    'description' => 'Item Description 8',
                    'item_type' => 'Item Type 8',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'item_id' => '9',
                    'description' => 'Item Description 9',
                    'item_type' => 'Item Type 9',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'item_id' => '10',
                    'description' => 'Item Description 10',
                    'item_type' => 'Item Type 10',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'item_id' => '11',
                    'description' => 'Item Description 11',
                    'item_type' => 'Item Type 11',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'item_id' => '12',
                    'description' => 'Item Description 12',
                    'item_type' => 'Item Type 12',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'item_id' => '13',
                    'description' => 'Item Description 13',
                    'item_type' => 'Item Type 13',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'item_id' => '14',
                    'description' => 'Item Description 14',
                    'item_type' => 'Item Type 14',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'item_id' => '15',
                    'description' => 'Item Description 15',
                    'item_type' => 'Item Type 15',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'item_id' => '16',
                    'description' => 'Item Description 16',
                    'item_type' => 'Item Type 16',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'item_id' => '17',
                    'description' => 'Item Description 17',
                    'item_type' => 'Item Type 17',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'item_id' => '18',
                    'description' => 'Item Description 18',
                    'item_type' => 'Item Type 18',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'item_id' => '19',
                    'description' => 'Item Description 19',
                    'item_type' => 'Item Type 19',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'item_id' => '20',
                    'description' => 'Item Description 20',
                    'item_type' => 'Item Type 20',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            ]
        );
    }
}
