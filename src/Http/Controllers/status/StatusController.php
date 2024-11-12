<?php

namespace status\Pkg\Http\Controllers\status;
 
use Illuminate\Http\Request;
use status\Pkg\Models\status;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use status\Pkg\Models\Setting_system;


class StatusController extends Controller
{
    public static function statuses()
    {
     return  Cache::rememberForever('status', function () {
 
             return Status::get();
        });
    }
 
    public function create()
    {
        $this->statuses();
      
        $systems_data =  Setting_system::get();
      
        $all_data=status::with(['systemname','status_p_id_sub','status_p_id'])->select('status_name','id', 'p_id', 'p_id_sub','used_in_system_id')->
        orderby('p_id_sub','asc')->OrderBy('id', 'asc')->get();
    
         return view('StatusModule::status.create',compact('systems_data','all_data'));
     
 
    }

  
    public function store(Request $request)
    {
         Cache::forget('status');
         $request->validate(status::validate_rules(),status::validate_message());
         $data=status::create($request->all());
         return redirect()->back()->with('message','تم الحفظ بنجاح')->with('type','success');
    }

 
}
