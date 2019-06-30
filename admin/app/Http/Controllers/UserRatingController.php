<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserRatingController extends Controller
{
	public function __construct()
	{
	
	}
	
	public function renderUserRating()
	{
		
		return view('user.rating');
	}
	public function renderUserSettings()
	{
		
		return view('user.settings');
	}
	
	public function GetSboys(){
		
		$user_id = request('user_id');
		$sboys_options = "";
		$sboys_list = DB::table('Schoolboy_users')
			->join('Schoolboy', 'Schoolboy.sboy_ticket', '=', 'Schoolboy_users.sboy_ticket')
			->get()
			->where('user_id', $user_id);
		foreach ($sboys_list as $sboy){
			$sboys_options .= "<option value='$sboy->sboy_ticket'>$sboy->sboy_second_name $sboy->sboy_first_name $sboy->sboy_middle_name</option>";
		}
		
		return response()->json(['message' => 'error','data'=> $sboys_options]);
	}
	
	public function getRatings(){
		$rating_period = request('rating_period');
		$rating_year = request('rating_year');
		$sboy_id = request('sboy_id');
		$date = cal_days_in_month(CAL_GREGORIAN, $rating_period, $rating_year);
		$days_table = "";
		$rating_table = "";
		
		$subjects_list = DB::table('Schoolboy')
			->join('Subject_class_list', 'Subject_class_list.class_id', '=', 'Schoolboy.class_id')
			->join('Subject_list', 'Subject_list.subject_id', '=', 'Subject_class_list.subject_id')
			->orderBy('subject_name', 'asc')
			->where('sboy_ticket','=', $sboy_id)
			->get();
		
		$subjects = "";

		for ($i = 1; $i <= $date; $i++){
			$days_table .= "<td class='text-right'>$i</td>";
		}
		foreach ($subjects_list as $subject){
			$rating_table .= "<tr>";
			$rating_table .= "
						<td>$subject->subject_name</td>
					";
			for ($i = 1; $i <= $date; $i++){
				$date_journal = $rating_year ."-".$rating_period."-".$i;
				$rating_list = DB::table('Journal')
					->where('sboy_ticket','=', $sboy_id)
					->where('subject_id','=', $subject->subject_id)
					->where('journal_date','=', $date_journal)
					->get();
				$rating_table .= "<td>";
				
				foreach ($rating_list as $rating){
					$rating_number = number_format($rating->rating, 0, "", "");
					if($rating->rating_type_id == 1){
						$rating_table .= " <span class='badge badge-dark rounded p-2 text-white'>$rating_number</span> ";
					}
					if($rating->rating_type_id == 2){
						$rating_table .= " <span class='badge badge-secondary rounded p-2 text-white'>$rating_number </span> ";
					}
					if($rating->rating_type_id == 3){
						$rating_table .= " <span class='badge badge-warning p-2 rounded'>$rating_number</span> " ;
					}
					if($rating->rating_type_id == 4){
						$rating_table .= " <span class='badge p-2 rounded'>$rating_number</span> " ;
					}
					if($rating->rating_type_id == 5){
						$rating_table .= " <span class='badge p-2 rounded'>$rating_number</span> " ;
					}
					if($rating->rating_type_id == 6){
						$rating_table .= " <span class='badge p-2 rounded'>$rating_number</span> " ;
					}
					if($rating->rating_type_id == 7){
						$rating_table .= " <span class='badge p-2 rounded'>$rating_number</span> " ;
					}
					if($rating->rating_type_id == 8){
						$rating_table .= " <span class='badge badge-info rounded p-2 text-white'>$rating_number</span> ";
					}
					if($rating->rating_type_id == 9){
						$rating_table .= " <span class='badge badge-danger rounded p-2 text-white'>$rating_number</span> ";
					}
					if($rating->rating_type_id == 10){
						$rating_table .= " <span class='badge badge-success rounded p-2 text-white'>$rating_number</span> ";
					}
					if($rating->rating_type_id == 11){
						$rating_table .= " <span class='badge badge-primary rounded p-2 text-white'>$rating_number</span> ";
					}
					
				}
				$rating_table .= "</td>";
				
			}
			$rating_table .= "</tr>";
		}
		
		
		return response()->json(['message' => 'error','subjects'=> $subjects, 'days_table' => $days_table, 'rating_table' => $rating_table]);
	}
	
}
