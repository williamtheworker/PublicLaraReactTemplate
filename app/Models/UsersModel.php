<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class UsersModel extends Authenticatable {
    public $timestamps = true;
    protected $table = 'tbl_users';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'status',
    ];

    const CREATED_AT = 'date_created';
    const UPDATED_AT = 'date_updated';

}