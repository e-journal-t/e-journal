<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SboysController extends Controller
{
	
	public function ajaxRequest()
	
	{
		
		return view('addsboys');
		
	}
	
	/**
	 
	 * Create a new controller instance.
	 
	 *
	 
	 * @return void
	 
	 */
	
	public function ajaxRequestPst()
	
	{
		
		$input = request()->all();
		
	}
	public function ajaxRequestPost(){
		
		$sboy_ticket = request('sboy_ticket');
		$user_id = request('user_id');
		DB::insert('insert into Schoolboy_users (sboy_ticket, user_id) values (?, ?)', [$sboy_ticket, $user_id]);
		
		return response()->json(['message'=> 'error']);
	}
}
