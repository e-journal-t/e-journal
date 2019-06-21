<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}
	
	public function index_admin()
	{
		$users = DB::table('Users')->get();
		return view('admin.admin_index', compact('users'));
	}
	
	public function index_admin_edit($user_id)
	{
		$users_data = DB::table('Users')->get()->where('id', $user_id);
		$checked = "";
		foreach ($users_data as $user){
			if($user->type == 1){
				$checked = "checked";
			}else{
				$checked = "";
			}
		}
		
		return view('admin.admin_users_edit', ['users_data' => $users_data, 'checked' => $checked ]);
	}
	
	public function updateUser($user_id)
	{
		$edit_user_name = request('edit_user_name');
		$edit_user_email = request('edit_user_email');
		$edit_user_type = request('edit_user_type');
		$user_edit_id = request('user_edit_id');
		
		DB::table('users')
			->where('id', $user_edit_id)
			->update([
				'name' => $edit_user_name
				, 'email' => $edit_user_email
				, 'type' => $edit_user_type
			]);
		return response()->json(['message'=> 'error']);
	}
	
}
