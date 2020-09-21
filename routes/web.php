<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('user',function(){

    return view('Admin.index');


});


use Kavenegar\Enums;

Route::get('m',function(){

    $api = new \Kavenegar\KavenegarApi("42734733626C385A6E52312F46664C4B44657A5235716B6E45365248526B49505046694B4F7159435A71553D");
    $sender = "1000596446";
	$message = "خدمات پیام کوتاه کاوه نگار";
    $receptor ="09137452181";
    $result = $api->Send($sender,$receptor,$message);

	if($result){
		foreach($result as $r){
			echo "messageid = $r->messageid";
			echo "message = $r->message";
			echo "status = $r->status";
			echo "statustext = $r->statustext";
			echo "sender = $r->sender";
			echo "receptor = $r->receptor";
			echo "date = $r->date";
			echo "cost = $r->cost";
		}
	}

});
