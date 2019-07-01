<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}
	
	public function index_admin()
	{
		$users = DB::table('Users')->get();
		$table_data = "";
		foreach ($users as $user){
			$users_sboys = DB::table('Schoolboy_users')->get()->where('user_id', $user->id);
			$table_data .= "<tr>
						 <td> $user->id </td>
		                                <td>  $user->name </td>
		                                <td>  $user->email </td>
		                                <td>  $user->type </td>
					<td>";
			foreach ($users_sboys as $sboy){
				$table_data .= $sboy->sboy_ticket;
			}
			$table_data .= "</td>
					<td class=\"text-center\"><a href=\"admin_index/admin_users_edit/$user->id/update\" class=\"btn btn-outline-dark\">Редагувати</a></td>
					";
			$table_data .= "</tr>";
		}
		
		
		return view('admin.admin_index', ['users' =>  $users,'table_data' => $table_data]);
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
		
		$sboys_list = "";
		$users_sboys = DB::table('Schoolboy_users')
			->join('Schoolboy', 'Schoolboy.sboy_ticket', '=', 'Schoolboy_users.sboy_ticket')
			->get()
			->where('user_id', $user_id);
		foreach ($users_sboys as $sboy){
			$sboys_list .= "<tr>
						<td> $sboy->sboy_second_name $sboy->sboy_first_name $sboy->sboy_middle_name ( $sboy->sboy_ticket )</td>
						<td class='text-right'>
							<button class='btn btn-outline-dark' type='button' onclick='deleteSboy($sboy->id)'>Видалити</button>
						</td>
					</tr>";
		}
		
		return view('admin.admin_users_edit', ['users_data' => $users_data, 'checked' => $checked, 'sboys_list' => $sboys_list ]);
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
	
	public function addSboys()
	{
		$sboy_ticket = request('sboy_ticket');
		$user_edit_id = request('user_edit_id');
		
		DB::insert('insert into Schoolboy_users (sboy_ticket, user_id) values (?, ?)', [$sboy_ticket, $user_edit_id]);
		
		$sboys_list = "";
		$users_sboys = DB::table('Schoolboy_users')->get()->where('user_id', $user_edit_id);
		foreach ($users_sboys as $sboy){
			$sboys_list .= "<tr>
						<td>$sboy->sboy_ticket</td>
						<td class='text-right'><button class='btn btn-outline-dark' type='button'>Видалити</button></td>
					</tr>";
		}
		
		return response()->json(['message' => "error", 'data' => $sboys_list]);
	}
	
	public function deleteSboys()
	{
		$id = request('id');
		
		DB::table('Schoolboy_users')->where('id', '=', $id)->delete();
		
		$sboys_list = "";
		$users_sboys = DB::table('Schoolboy_users')->get()->where('user_id', $id);
		foreach ($users_sboys as $sboy){
			$sboys_list .= "<tr>
						<td>$sboy->sboy_ticket</td>
						<td><button class='btn btn-outline-dark' type='button'>Видалити</button></td>
					</tr>";
		}
		
		return response()->json(['message' => "error", 'data' => $sboys_list]);
	}
	
	
	public function addUser()
	{
		$name = request('name');
		$email = request('email');
		$password = request('password');
		$confirm_password = request('password_confirmation');
		$type = request('type');
		$hash_password = Hash::make($password);
		
		
		if(empty($name) or empty($email) or empty($password) or empty($confirm_password)){
			return response()->json(['message' => "error"]);
		}
		
		if($password != $confirm_password){
			return response()->json(['message' => "error"]);
		}
		
		$emails = DB::table('Users')->get();
		foreach ($emails as $e){
			if($email == $e->email){
				return response()->json(['message' => "error"]);
			}
		}
		
		DB::insert('insert into Users (Users.name, Users.email, Users.password, Users.type) values (?, ?, ?, ?)', [$name, $email, $hash_password, $type]);
		
		$last_id = 0;
		$last_insert_id = DB::table('Users')->orderBy('id', 'asc')->get();
		foreach ($last_insert_id as $last_insert){
			$last_id = $last_insert->id;
		}
		
		return response()->json(['message' => "error", 'data' => $last_id]);
	}
	
}
