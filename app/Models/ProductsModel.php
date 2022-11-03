<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductsModel extends Model {
    public $timestamps = true;
    protected $table = 'tbl_products';
    protected $fillable = [
        'name',
        'status',
    ];

    const CREATED_AT = 'date_created';
    const UPDATED_AT = 'date_updated';

}