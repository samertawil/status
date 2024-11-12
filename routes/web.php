<?php

 

 
 
use Illuminate\Support\Facades\Route;
use status\Pkg\Http\Controllers\status\StatusController;
use status\Pkg\Http\Controllers\settingcontrollers\SystemnameController;
 
 





Route::middleware(['web'])->group(function () {

	Route::resource('/status',StatusController::class);
	Route::post('system/store/',[SystemnameController::class,'store'])->name('system.store');


});
 