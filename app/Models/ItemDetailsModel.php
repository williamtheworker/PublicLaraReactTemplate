<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ItemDetailsModel extends Model {
    public $timestamps = true;
    protected $table = 'tbl_item_details';
    protected $fillable = [
        'item_id',
        'description',
        'item_type'
    ];
}