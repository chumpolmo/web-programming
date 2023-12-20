<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class fcController extends Controller
{
    public function fcCreate(Request $request)
    {
        $valid = Validator::make($request->all(),
            [
                'inputName' => 'required|min:8',
                'inputStatus' => 'required'
            ],
            [
                'inputName.required' => 'ระบุชื่อสโมสร!',
                'inputName.min' => 'ระบุชื่อสโมสรน้อยกว่า 8 ตัวอักษร!',
                'inputStatus.required' => 'ระบุสถานะของสโมสร!'
            ]
        );

        if($valid->fails()){
            return redirect('/create_form')
                    ->withErrors($valid)
                    ->withInput();
        }

        if($request->isMethod('post')){
            $inputName = $request->input('inputName');
            $inputDesc = $request->input('inputDesc');
            $inputStatus = $request->input('inputStatus');

            $item = (object)[
                'inputName' => $inputName,
                'inputDesc' => $inputDesc,
                'inputStatus' => $inputStatus
            ];

            return view('fcprofile',[
                'fcprof' => $item,
                'topic' => 'การเพิ่มข้อมูลสโมสรสำเร็จ'
            ]);
        }
    }

    public function __construct(){
    	$this->data = [
		   (object)[
		   		"id" => 1001,
		   		"name" => "Liverpool",
		   		"logo" => "images/liverpool1.png",
		   		"description" => "You'll Never Walk Alone ;)" 
		   ],
		   (object)[
		   		"id" => 1002,
		   		"name" => "Liverpool 2",
		   		"logo" => "images/liverpool2.png",
		   		"description" => "You'll Never Walk Alone ;) :)" 
		   ],
		   (object)[
		   		"id" => 1003,
		   		"name" => "Liverpool 3",
		   		"logo" => "images/liverpool3.png",
		   		"description" => "You'll Never Walk Alone ;) :) :D" 
		   ]
		];
    }

    // Comment
    public function getFCs(): view
    {
    	return view('home', [
    		"fcs" => $this->data,
    		"topic" => "สโมสรฟุตบอล"
    	]);
    }

    public function getFC(string $id): view
    {
    	$coll = collect($this->data);
    	$fc = $coll->where('id', $id)->first();

    	return view('getsomefc', [
    		"fc" => $fc,
    		"topic" => "รายละเอียดสโมสรฟุตบอล"
    	]);
    }

    public function fcCreateForm(): view
    {
    	return view('fccreateform', [
    		"topic" => "เพิ่มข้อมูลสโมสรฟุตบอล"
    	]);
    }
}
