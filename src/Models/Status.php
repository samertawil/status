<?php

namespace status\Pkg\Models;


use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
 
 

class Status extends Model
{

    use HasFactory;

    protected $fillable = [
        'status_name', 'p_id',
        'p_id_sub',
        'route_name', 'page_name',
        'route_system_name', 'description',
        'used_in_system_id',
    ];


    public static function statuses()
    {
      return  Cache::rememberForever('status', function () {
            return status::get();
        });
    }

    public static function validate_rules()
    {
        return [
            'status_name' => ['required',],

        ];
    }

    public static function validate_message()
    {
        return [
            'required' => 'مطلوب ادخال الحقل',
        ];
    }

    public function status_p_id()
    {
        return $this->hasOne(status::class, 'id', 'p_id');
    }

    public function status_p_id_sub()
    {
        return $this->hasOne(status::class, 'id', 'p_id_sub');
    }

    public function systemname()
    {
        return $this->hasOne(setting_system::class, 'id', 'used_in_system_id');
    }
}
