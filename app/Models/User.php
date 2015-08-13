<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

		protected $table = 'amy_user';


		public static function rules()
		{
				$rules = [
				'role_id' => 'required',
	    		'name' => 'required|min:4|max:50',
	    		'sex' => 'required',
	    		'age' => 'required',
	    		'mobile' => 'required',
	    		'contry' => 'required',
	    		'city' => 'required',
	    		'height' => 'required',
	    		'weight' => 'required',
	    	];

				return $rules;
		}
}
