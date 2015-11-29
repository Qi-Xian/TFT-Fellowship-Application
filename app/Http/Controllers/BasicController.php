<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Basic;

use Validator;
use Log;

class BasicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $basic = Basic::all();

        $post_type = '基本資料列表';
        //把性別代號轉換成文字
        foreach($basic as $var){
            if($var->sex == 1 ) $var->sex = '男';
            elseif ($var->sex == 2 ) $var->sex = '女';
            else $var->sex = '其他';
        }
        $data = compact('basic','post_type');

        return view('basic.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('basic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Log::info('--------');
        Log::info($input);
        Log::info('--------');
        $messages = [
            'required' => ':attribute 選項必填',
        ];
        //驗證規則
        $rules = [
            'name'      => 'required|min:2|max:20',
            'sex'       => 'required|max:1',
            'phone'     => ['required','regex:/0\d{1,2}(\d{6,8})/'],
            'cell_phone'=> ['required','regex:/09\d{8}/'],
            'id_number' => ['required','regex:/^[A-Z]{1}[1-2]{1}[0-9]{8}$/'],
            'skype'     => 'required|max:50',
            'email'     => 'required|email|max:30',
            'sec_email' => 'email|max:30',
            'address'   => 'required|max:50'
        ];

        $v = Validator::make($request->all(),$rules ,$messages);
        if ($v->fails())
        {
            Log::info('error');
            Log::info($v->errors());
            return redirect()->back()->withErrors($v->errors())->withInput($input);
        }
        else{
            Log::info('successful');
            return redirect('/dashboard');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $query = Basic::find($id);
        return view('basic.show',compact('query'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
