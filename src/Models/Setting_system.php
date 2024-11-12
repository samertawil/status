<?php

namespace status\Pkg\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Setting_system extends Model
{
    use HasFactory;

    protected $fillable=['system_name',	'description', 'active', 'status_id', 'date1'];

    public static function validate_rules() {
       return [
        'system_name' => ['required','unique:setting_systems'],
       ];
    }

   
       
}
