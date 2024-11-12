<?php

namespace status\Pkg\Http\Controllers\settingcontrollers;
 

 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use status\Pkg\Models\Setting_system;



class SystemnameController extends Controller
{

    public function store(Request $request) {

        $request->validate(Setting_system::validate_rules());
        Setting_system::create($request->all());
        return redirect()->back()->with('message','تم الحفظ بنجاح')->with('type','success');
    }
    
}