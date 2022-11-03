<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller {

    public function user_create () {
        $user = new UsersModel();
        $user->first_name = 'Dev';
        $user->last_name = 'Eloper';
        $user->email = 'speedywagony@gmail.com';
        $user->password = Hash::make('asd');
        $user->save();

        return $user;
        /* This is the Returned Data */
        /*
            {
                "first_name":"Dev",
                "last_name":"Eloper",
                "email":"speedywagony@gmail.com",
                "password":"$2y$10$hDzUznZ3CQUSYNLpsrov0.PdilSgfKzwtj6Vd59P2ufyzFOuPR43K",
                "date_updated":"2022-08-17T01:35:20.000000Z",
                "date_created":"2022-08-17T01:35:20.000000Z",
                "id":1
            }
        */
    }

}