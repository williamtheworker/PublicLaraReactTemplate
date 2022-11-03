<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ItemsModel;
use Session;

class GeneralController extends Controller {

    public function test_api () {
        return 'This is test';
    }

    public function upload_file (Request $request) {
        $data = $request->all();
        
        if($request->file()) {
            $file = $request->file('file');
            $destinationPath = 'uploads';
            $filetype = $this->get_file_type($file->getClientMimeType());
            $file_name = $this->create_random_string().'.'.$filetype;
            $file->move($destinationPath, $file_name);

            Session::put('resume_name', $file_name);

            return array('status' => 'success', 'message' => 'upload success');
        } else {
            return array('status' => 'error', 'message' => 'no file in request');
        }
    }

    public function create_random_string() {
		$bytes = random_bytes(10);
		$randString = bin2hex($bytes) . gmdate('mdYhis');

		return $randString;
	}

    public function get_file_type($mime) {
		switch ($mime) {
			case "image/png":
				return 'png';
				break;

			case "image/jpeg":
				return 'jpg';
				break;

			case "application/pdf":
				return 'pdf';
				break;

			default:
				return 'broken';
		}
	}
}