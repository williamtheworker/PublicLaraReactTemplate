<?php

namespace App\Http\Controllers\Items;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ItemsModel;
use Session;

class ItemsController extends Controller {
    public function item_validate (Request $request) {
        $validate = [
            'name' => 'required'
        ];

        $check = Validator::make($request->all(), $validate);

        if($check->fails()) {
            return array(
                'status' => 'error',
                'data' => $check->errors()
            );
            /* Returned Data is */
            /*
                {
                    "status":"error",
                    "data":{
                        "name":["The name field is required."]
                    }
                }
            */
        
        } else {
            return array(
                'status' => 'success',
                'data' => 'Validated Correctly'
            );
        }
    }

    public function item_create () {
        $item = ItemsModel::create(
            [
                'name' => 'Item 21',
            ]
        );

        return $item;
        /* Returned Data is */
        /*
            {
                "name":"Item 21",
                "updated_at":"2022-09-06T01:39:57.000000Z",
                "created_at":"2022-09-06T01:39:57.000000Z",
                "id":21
            }
        */
    }

    public function item_update () {
        $item = ItemsModel::where('id', 21)->update(
            [
                'name' => 'Updated Item 21'
            ]
        );

        return $item;
        /* Returned Data is */
        /*
            1
        */
    }

    public function item_first_or_create() {
        $item = ItemsModel::firstOrCreate(
            [
                'name' => 'Item 23'
            ]
        );

        return $item;
        /* Returned Data for exisiting row */
        /*
            {
                "id":21,
                "name":"Updated Item 21",
                "status":"active",
                "created_at":"2022-09-06T01:39:57.000000Z",
                "updated_at":"2022-09-06T01:40:35.000000Z"
            }
        */

        /* Returned Data for new row */
        /*
            {
                "name":"Item 23",
                "updated_at":"2022-09-06T01:47:22.000000Z",
                "created_at":"2022-09-06T01:47:22.000000Z",
                "id":23
            }
        */
    }

    public function item_first_or_new() {
        $item = ItemsModel::firstOrNew(
            [
                'name' => 'Item 24'
            ]
        );

        return $item;
        /* Returned Data for exisiting row */
        /*
            {
                "id":23,
                "name":"Item 23",
                "status":"active",
                "created_at":"2022-09-06T01:47:22.000000Z",
                "updated_at":"2022-09-06T01:47:22.000000Z"
            }
        */

        /* Returned Data for new row */
        /*
            {
                "name":"Item 24"
            }
        */
        /* This is not yet saved. ->save() has to be called first. */
    }

    public function item_update_or_create() {
        $item = ItemsModel::updateOrCreate(
            // Condition
            [
                'name' => 'Item 24'
            ],
            // Update or Create
            [
                'name' => 'Item 24'
            ]
        );

        return $item;
        /* Returned Data for exisiting row */
        /*
            {
                "id":23,
                "name":"Item 23",
                "status":"active",
                "created_at":"2022-09-06T01:47:22.000000Z",
                "updated_at":"2022-09-06T01:47:22.000000Z"
            }
        */

        /* Returned Data for new row */
        /*
            {
                "name":"Item 24",
                "updated_at":"2022-09-06T02:06:03.000000Z",
                "created_at":"2022-09-06T02:06:03.000000Z",
                "id":24
            }
        */
    }

    public function item_upsert() {
        $item = ItemsModel::upsert(
            [
                [
                    'name' => 'Item 25',
                    'status' => 'inactive'
                ],
                [
                    'name' => 'Item 8',
                    'status' => 'inactive'
                ],
                [
                    'name' => 'Item 16',
                    'status' => 'inactive'
                ],
            ],
            [
                'name',
            ],
            [
                'status',
            ]
        );

        return $item;
        /* Returned Data for new rows */
        /*
            3
        */
        /* Returned is the number of rows created */
        /* This inserted Item 8 and Item 16 rather than updating */
    }

    public function items_get_all() {
        $items = ItemsModel::items_get_all();

        return $items;

        /* Returned Data (Type is Object)*/
        /* Limited to 7 */
        /*
            [
                {
                    "id":1,
                    "name":"Item 1",
                    "status":"active",
                    "created_at":"2022-09-05 07:36:33",
                    "updated_at":"2022-09-05 07:36:33"
                },
                {
                    "id":2,
                    "name":"Item 2",
                    "status":"active",
                    "created_at":"2022-09-05 07:36:33",
                    "updated_at":"2022-09-05 07:36:33"
                },
                {
                    "id":3,
                    "name":"Item 3",
                    "status":"active",
                    "created_at":"2022-09-05 07:36:33",
                    "updated_at":"2022-09-05 07:36:33"
                },
                {
                    "id":4,
                    "name":"Item 4",
                    "status":"active",
                    "created_at":"2022-09-05 07:36:33",
                    "updated_at":"2022-09-05 07:36:33"
                },
                {
                    "id":5,
                    "name":"Item 5",
                    "status":"active",
                    "created_at":"2022-09-05 07:36:33",
                    "updated_at":"2022-09-05 07:36:33"
                },
                {
                    "id":6,
                    "name":"Item 6",
                    "status":"active",
                    "created_at":"2022-09-05 07:36:33",
                    "updated_at":"2022-09-05 07:36:33"
                },
                {
                    "id":7,
                    "name":"Item 7",
                    "status":"active",
                    "created_at":"2022-09-05 07:36:33",
                    "updated_at":"2022-09-05 07:36:33"
                }
            ]
        */
        /* Can be used like this */
        /*
            $items[0]->id;
            This will return 1
        */
    }

    public function items_raw_get_all() {
        $items = ItemsModel::items_raw_get_all();

        return $items;
        /* Returned Data (Type is Collection)*/
        /*
            [
                {
                    "id":1,"name":"Item 1","status":"active","created_at":"2022-09-05 07:36:33","updated_at":"2022-09-05 07:36:33"
                },
                {
                    "id":2,"name":"Item 2","status":"active","created_at":"2022-09-05 07:36:33","updated_at":"2022-09-05 07:36:33"
                },
                {
                    "id":3,"name":"Item 3","status":"active","created_at":"2022-09-05 07:36:33","updated_at":"2022-09-05 07:36:33"
                },
                {
                    "id":4,"name":"Item 4","status":"active","created_at":"2022-09-05 07:36:33","updated_at":"2022-09-05 07:36:33"
                },
                {
                    "id":5,"name":"Item 5","status":"active","created_at":"2022-09-05 07:36:33","updated_at":"2022-09-05 07:36:33"
                },
                {
                    "id":6,"name":"Item 6","status":"active","created_at":"2022-09-05 07:36:33","updated_at":"2022-09-05 07:36:33"
                },
                {
                    "id":7,"name":"Item 7","status":"active","created_at":"2022-09-05 07:36:33","updated_at":"2022-09-05 07:36:33"
                }
            ]
        */
        /* Can be used like this */
        /*
            $items[0]->id;
            This will return 1
        */
    }

    public function items_get_toarray_all() {
        $items = ItemsModel::items_get_toarray_all();

        return $items;
        /* Returned Data (Type is Array)*/
        /*
            [
                {
                    "id":1,"name":"Item 1","status":"active","created_at":"2022-09-05 07:36:33","updated_at":"2022-09-05 07:36:33"
                },
                {
                    "id":2,"name":"Item 2","status":"active","created_at":"2022-09-05 07:36:33","updated_at":"2022-09-05 07:36:33"
                },
                {
                    "id":3,"name":"Item 3","status":"active","created_at":"2022-09-05 07:36:33","updated_at":"2022-09-05 07:36:33"
                },
                {
                    "id":4,"name":"Item 4","status":"active","created_at":"2022-09-05 07:36:33","updated_at":"2022-09-05 07:36:33"
                },
                {
                    "id":5,"name":"Item 5","status":"active","created_at":"2022-09-05 07:36:33","updated_at":"2022-09-05 07:36:33"
                },
                {
                    "id":6,"name":"Item 6","status":"active","created_at":"2022-09-05 07:36:33","updated_at":"2022-09-05 07:36:33"
                },
                {
                    "id":7,"name":"Item 7","status":"active","created_at":"2022-09-05 07:36:33","updated_at":"2022-09-05 07:36:33"
                }
            ]
        */
        /* Can be used like this */
        /*
            $items[0]->id;
            This will return 1
        */
    }

    public function item_find() {
        $item = ItemsModel::item_find();

        return $item;
        /* Returned Data */
        /*
            {
                "id":1,
                "name":"Item 1",
                "status":"active",
                "created_at":"2022-09-05 07:36:33",
                "updated_at":"2022-09-05 07:36:33"
            }
        */
    }
    
    public function item_basic_where() {
        /* Uses First */
        $item = ItemsModel::item_basic_where();

        return $item;
        /* Returned Data */
        /*
            {
                "id":2,
                "name":"Item 2",
                "status":"active",
                "created_at":"2022-09-05 07:36:33",
                "updated_at":"2022-09-05 07:36:33"
            }
        */
    }

    public function item_where_value() {
        $item = ItemsModel::item_where_value();

        return $item;
        /* Returned Data */
        /*
            Item 2
        */
    }

    public function item_or_where() {
        $item = ItemsModel::item_or_where();

        return $item;
        /* Returned Data */
        /*
            [
                {
                    "id":2,
                    "name":"Item 2",
                    "status":"active",
                    "created_at":"2022-09-05 07:36:33",
                    "updated_at":"2022-09-05 07:36:33"
                },
                {
                    "id":3,
                    "name":"Item 3",
                    "status":"active",
                    "created_at":"2022-09-05 07:36:33",
                    "updated_at":"2022-09-05 07:36:33"
                }
            ]
        */
    }

    public function item_pluck() {
        $item = ItemsModel::item_pluck();

        return $item;
        /* Returned Data */
        /*
            [
                "Updated Item 1",
                "Item 2",
                "Item 3",
                "Item 4 Updated",
                "Item 5"
            ]
        */
        /* Returned is an array of the specified column for pluck */
    }

    public function item_pluck_multiple() {
        $items = ItemsModel::item_pluck_multiple();

        return $items;
        /* Returned Data */
        /*
            {
                "Item 1 Details":"Updated Item 1",
                "Item 2 Details":"Item 2",
                "Item 3 Details":"Item 3",
                "Item 4 Details Updated":"Item 4 Updated",
                "Item 5 Details":"Item 5"
            }
        */
        /* Returned is an array of the specified column for pluck */
    }
    
    public function item_join() {
        $items = ItemsModel::item_join();

        return $items;
        /* Returned Data */
        /*
            [
                {
                    "item_id":1,
                    "name":"Updated Item 1",
                    "details":"Item 1 Details",
                    "description":"This is a test description for Item 1",
                    "created_at":"2022-08-15 09:40:50",
                    "updated_at":"2022-08-15 09:45:31"
                },
                {
                    "item_id":2,
                    "name":"Item 2",
                    "details":"Item 2 Details",
                    "description":"Description for Item 2",
                    "created_at":"2022-08-15 09:43:29",
                    "updated_at":"2022-08-15 09:43:29"
                },
                {
                    "item_id":3,
                    "name":"Item 3",
                    "details":"Item 3 Details",
                    "description":"Necessary Description for Item 3",
                    "created_at":"2022-08-16 09:12:20",
                    "updated_at":"2022-08-16 09:12:20"
                }
            ]
        */
    }
    
    public function item_left_join() {
        $items = ItemsModel::item_left_join();

        return $items;
        /* Returned Data */
        /*
            [
                {
                    "item_id":1,
                    "name":"Updated Item 1",
                    "details":"Item 1 Details",
                    "description":"This is a test description for Item 1",
                    "created_at":"2022-08-15 09:40:50",
                    "updated_at":"2022-08-15 09:45:31"
                },
                {
                    "item_id":2,
                    "name":"Item 2",
                    "details":"Item 2 Details",
                    "description":"Description for Item 2",
                    "created_at":"2022-08-15 09:43:29",
                    "updated_at":"2022-08-15 09:43:29"
                },
                {
                    "item_id":3,
                    "name":"Item 3",
                    "details":"Item 3 Details",
                    "description":"Necessary Description for Item 3",
                    "created_at":"2022-08-16 09:12:20",
                    "updated_at":"2022-08-16 09:12:20"
                },
                {
                    "item_id":4,
                    "name":"Item 4 Updated",
                    "details":"Item 4 Details Updated",
                    "description":null,
                    "created_at":"2022-08-16 09:16:47",
                    "updated_at":"2022-08-16 09:21:24"
                },
                {
                    "item_id":5,
                    "name":"Item 5",
                    "details":"Item 5 Details",
                    "description":null,
                    "created_at":"2022-08-16 09:22:28",
                    "updated_at":"2022-08-16 09:22:28"
                }
            ]
        */
    }
    
    public function item_right_join() {
        $items = ItemsModel::item_right_join();

        return $items;
        /* Returned Data */
        /*
            [
                {
                    "item_id":1,
                    "name":"Updated Item 1",
                    "details":"Item 1 Details",
                    "description":"This is a test description for Item 1",
                    "created_at":"2022-08-15 09:40:50",
                    "updated_at":"2022-08-15 09:45:31"
                },
                {
                    "item_id":2,
                    "name":"Item 2",
                    "details":"Item 2 Details",
                    "description":"Description for Item 2",
                    "created_at":"2022-08-15 09:43:29",
                    "updated_at":"2022-08-15 09:43:29"
                },
                {
                    "item_id":3,
                    "name":"Item 3",
                    "details":"Item 3 Details",
                    "description":"Necessary Description for Item 3",
                    "created_at":"2022-08-16 09:12:20",
                    "updated_at":"2022-08-16 09:12:20"
                }
            ]
        */
    }

    public function item_cross_join() {
        $items = ItemsModel::item_cross_join();

        return $items;
        /* Returned Data */
        /*
            [
                {
                    "item_id":1,
                    "name":"Updated Item 1",
                    "details":"Item 1 Details",
                    "description":"This is a test description for Item 1",
                    "created_at":"2022-08-15 09:40:50",
                    "updated_at":"2022-08-15 09:45:31"
                },
                {
                    "item_id":1,
                    "name":"Updated Item 1",
                    "details":"Item 1 Details",
                    "description":"Description for Item 2",
                    "created_at":"2022-08-15 09:40:50",
                    "updated_at":"2022-08-15 09:45:31"
                },
                {
                    "item_id":1,
                    "name":"Updated Item 1",
                    "details":"Item 1 Details",
                    "description":"Necessary Description for Item 3",
                    "created_at":"2022-08-15 09:40:50",
                    "updated_at":"2022-08-15 09:45:31"
                },
                {
                    "item_id":2,
                    "name":"Item 2",
                    "details":"Item 2 Details",
                    "description":"This is a test description for Item 1",
                    "created_at":"2022-08-15 09:43:29",
                    "updated_at":"2022-08-15 09:43:29"
                },
                {
                    "item_id":2,
                    "name":"Item 2",
                    "details":"Item 2 Details",
                    "description":"Description for Item 2",
                    "created_at":"2022-08-15 09:43:29",
                    "updated_at":"2022-08-15 09:43:29"
                },
                {
                    "item_id":2,
                    "name":"Item 2",
                    "details":"Item 2 Details",
                    "description":"Necessary Description for Item 3",
                    "created_at":"2022-08-15 09:43:29",
                    "updated_at":"2022-08-15 09:43:29"
                },
                {
                    "item_id":3,
                    "name":"Item 3",
                    "details":"Item 3 Details",
                    "description":"This is a test description for Item 1",
                    "created_at":"2022-08-16 09:12:20",
                    "updated_at":"2022-08-16 09:12:20"
                },
                {
                    "item_id":3,
                    "name":"Item 3",
                    "details":"Item 3 Details",
                    "description":"Description for Item 2",
                    "created_at":"2022-08-16 09:12:20",
                    "updated_at":"2022-08-16 09:12:20"
                },
                {
                    "item_id":3,
                    "name":"Item 3",
                    "details":"Item 3 Details",
                    "description":"Necessary Description for Item 3",
                    "created_at":"2022-08-16 09:12:20",
                    "updated_at":"2022-08-16 09:12:20"
                },
                {
                    "item_id":4,
                    "name":"Item 4 Updated",
                    "details":"Item 4 Details Updated",
                    "description":"This is a test description for Item 1",
                    "created_at":"2022-08-16 09:16:47",
                    "updated_at":"2022-08-16 09:21:24"
                },
                {
                    "item_id":4,
                    "name":"Item 4 Updated",
                    "details":"Item 4 Details Updated",
                    "description":"Description for Item 2",
                    "created_at":"2022-08-16 09:16:47",
                    "updated_at":"2022-08-16 09:21:24"
                },
                {
                    "item_id":4,
                    "name":"Item 4 Updated",
                    "details":"Item 4 Details Updated",
                    "description":"Necessary Description for Item 3",
                    "created_at":"2022-08-16 09:16:47",
                    "updated_at":"2022-08-16 09:21:24"
                },
                {
                    "item_id":5,
                    "name":"Item 5",
                    "details":"Item 5 Details",
                    "description":"This is a test description for Item 1",
                    "created_at":"2022-08-16 09:22:28",
                    "updated_at":"2022-08-16 09:22:28"
                },
                {
                    "item_id":5,
                    "name":"Item 5",
                    "details":"Item 5 Details",
                    "description":"Description for Item 2",
                    "created_at":"2022-08-16 09:22:28",
                    "updated_at":"2022-08-16 09:22:28"
                },
                {
                    "item_id":5,
                    "name":"Item 5",
                    "details":"Item 5 Details",
                    "description":"Necessary Description for Item 3",
                    "created_at":"2022-08-16 09:22:28",
                    "updated_at":"2022-08-16 09:22:28"
                }
            ]
        */
        /* Do not use this */
    }

    public function item_advanced_join() {
        $items = ItemsModel::item_advanced_join();

        return $items;
        /* Returned Data */
        /*
            [
                {
                    "id":1,
                    "name":"Sub Item 1",
                    "details":"Sub Item 1 Details",
                    "created_at":"2022-08-15 09:40:50",
                    "updated_at":"2022-08-15 09:45:31",
                    "item_id":1,
                    "status":"active",
                    "date_created":"2022-08-17 13:55:47",
                    "date_updated":"2022-08-17 13:55:51"
                },
                {
                    "id":2,
                    "name":"Sub Item 2",
                    "details":"Sub Item 2 Details",
                    "created_at":"2022-08-15 09:40:50",
                    "updated_at":"2022-08-15 09:45:31",
                    "item_id":1,
                    "status":"active",
                    "date_created":"2022-08-17 13:55:50",
                    "date_updated":"2022-08-17 13:55:53"
                },
                {
                    "id":3,
                    "name":"Sub Item 3",
                    "details":"Sub Item 3 Details",
                    "created_at":"2022-08-15 09:40:50",
                    "updated_at":"2022-08-15 09:45:31",
                    "item_id":1,
                    "status":"active",
                    "date_created":"2022-08-17 13:56:08",
                    "date_updated":"2022-08-17 13:56:10"
                },
                {
                    "id":5,
                    "name":"Sub Item 5",
                    "details":"Sub Item 5 Details",
                    "created_at":"2022-08-15 09:43:29",
                    "updated_at":"2022-08-15 09:43:29",
                    "item_id":2,
                    "status":"active",
                    "date_created":"2022-08-17 13:56:50",
                    "date_updated":"2022-08-17 13:56:52"
                },
                {
                    "id":7,
                    "name":"Sub Item 7",
                    "details":"Sub Item 7 Details",
                    "created_at":"2022-08-16 09:12:20",
                    "updated_at":"2022-08-16 09:12:20",
                    "item_id":3,
                    "status":"active",
                    "date_created":"2022-08-17 13:57:30",
                    "date_updated":"2022-08-17 13:57:31"
                }
            ]
        */
    }

    public function get_items(Request $request) {
        $data = $request->all();

        $items = ItemsModel::get_items($data);

        return $items;
    }
}