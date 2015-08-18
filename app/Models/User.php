<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

		protected $table = 'amy_user';
		protected $fillable = array('name', 'mobile', 'sex', 'age', 'provinceId', 'cityId', 'height', 'weight', 'last_weight', 'vip_end_time');
		protected $primaryKey = 'uid';


		public static function rules()
		{
				$rules = [
	    		'name' => 'required',
	    		'mobile' => 'required',
	    		'sex' => 'required',
	    		'age' => 'required',
	    		'provinceId' => 'required',
	    		'cityId' => 'required',
	    		'height' => 'required',
	    		'weight' => 'required',
	    	];
				return $rules;
		}
}
