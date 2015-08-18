<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserService extends Model {

	protected $table = 'amy_user_service';
	public $timestamps = false;
	protected $fillable = array('uid', 'img', 'content', 'serv_id', 'create_time');

}
