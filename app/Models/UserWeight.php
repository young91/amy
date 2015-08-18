<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserWeight extends Model {

	protected $table = 'amy_user_weight';
	public $timestamps = false;
	protected $fillable = array('uid', 'weight', 'create_time');

}
