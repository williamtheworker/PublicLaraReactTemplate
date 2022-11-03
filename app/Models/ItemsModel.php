<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ItemsModel extends Model {
    public $timestamps = true;
    protected $table = 'tbl_items';
    protected $fillable = [
        'name',
        'status'
    ];

    public static function items_get_all() {
        $items = DB::table('tbl_items')
                    ->select('*')
                    ->get();
        
        return $items;
    }

    public static function items_raw_get_all() {
        $items = DB::table('tbl_items')
                    ->select('id', DB::raw('name, status, created_at, updated_at'))
                    ->get();
        
        return $items;
    }

    public static function items_get_toarray_all() {
        $items = DB::table('tbl_items')
                    ->select('*')
                    ->get()
                    ->toArray();
        
        return $items;
    }

    public static function item_find() {
        $item = DB::table('tbl_items')->find(1);
        
        return $item;
    }

    public static function item_basic_where() {
        $item = DB::table('tbl_items')->where('name', 'Item 2')->first();
        
        return $item;
    }

    public static function item_where_value() {
        $item = DB::table('tbl_items')->where('name', 'Item 2')->value('name');
        
        return $item;
    }

    public static function item_or_where() {
        $item = DB::table('tbl_items')
                    ->where('id', 2)
                    ->orWhere(function($query) {
                        $query->where('id', 3)
                            ->where('status', 'active');
                    })
                    ->get();
        
        return $item;
    }

    public static function item_pluck() {
        $item = DB::table('tbl_items')->pluck('name');

        return $item;
    }

    public static function item_pluck_multiple() {
        $item = DB::table('tbl_items')->pluck('name', 'details');

        return $item;
    }

    public static function item_join() {
        $items = DB::table('tbl_items as i')
                    ->join('tbl_item_details as id', 'i.id', '=', 'id.id')
                    ->select('i.id as item_id', 'i.name', 'i.details', 'id.description', 'i.created_at', 'i.updated_at')
                    ->get();

        return $items;
    }

    public static function item_left_join() {
        $items = DB::table('tbl_items as i')
                    ->leftJoin('tbl_item_details as id', 'i.id', '=', 'id.id')
                    ->select('i.id as item_id', 'i.name', 'i.details', 'id.description', 'i.created_at', 'i.updated_at')
                    ->get();

        return $items;
    }

    public static function item_right_join() {
        $items = DB::table('tbl_items as i')
                    ->rightJoin('tbl_item_details as id', 'i.id', '=', 'id.id')
                    ->select('i.id as item_id', 'i.name', 'i.details', 'id.description', 'i.created_at', 'i.updated_at')
                    ->get();

        return $items;
    }

    public static function item_cross_join() {
        $items = DB::table('tbl_items as i')
                    ->crossJoin('tbl_item_details as id')
                    ->select('i.id as item_id', 'i.name', 'i.details', 'id.description', 'i.created_at', 'i.updated_at')
                    ->get();

        return $items;
    }

    public static function item_advanced_join() {
        $items = DB::table('tbl_items as i')
                    ->join('tbl_sub_items as si', function($join) {
                        $join->on('i.id', '=', 'si.item_id')
                            ->where('si.status', '=', 'active');
                    })
                    ->get();

        return $items;
    }

    public static function get_items($params) {
        $items = DB::table('tbl_items as i')
                    ->leftJoin('tbl_item_details as id', 'i.id', '=', 'id.item_id')
                    ->select('i.id', 'id.item_id', 'i.name', 'id.description', 'id.item_type', 'i.status', 'i.created_at', 'i.updated_at');

        if(isset($params['search'])) {
            $items->where('i.name', 'like', '%'.$params['search'].'%')
                    ->orWhere('id.description', 'like', '%'.$params['search'].'%');
        }

        if(isset($params['start_date']) && isset($params['end_date'])) {
            $items->whereBetween('i.created_at', [$params['start_date'].' 00:00:00', $params['end_date'].' 23:59:59']);
        }

        if(isset($params['sort']) && isset($params['sort_direction'])) {
            $items->orderBy($params['sort'], $params['sort_direction']);
        }
        
        return $items->paginate(
            $perPage = $params['rowPage'], $columns = ['*'], $pageName = 'page', $page = $params['page']
        );
    }

}