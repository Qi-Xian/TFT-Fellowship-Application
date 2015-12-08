<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AppendixRequest;
use Log;
use Input;

class AppendixController extends Controller
{
    public function create()
    {
        return view('appendix.create');
    }

    public function fileUpload($fileName)
    {
        if(Input::hasFile($fileName)){
            $file = Input::file($fileName);
            $extension = $file->getClientOriginalExtension();
            $file_name = strval(time()).str_random(5).'.'.$extension;
            $destination_path = public_path().'/user-upload/';
            $upload_success = $file->move($destination_path, $file_name);
            $fileUrl = '/user-upload/'. $file_name;
            return $fileUrl;
        }
        else{
            return false;
        }
    } 

    public function store(AppendixRequest $request)
    {
        $input = $request->all();
        Log::info('-------- AppendixController: store --------');

        foreach ($input as $key => $value) {
            $fileUrl = AppendixController::fileUpload($key);
            Log::info($key . ' => ' . $fileUrl);
        }
        Log::info('-------- AppendixController: end --------');
        return redirect('/dashboard');
    }

}
