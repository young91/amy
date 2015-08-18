<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserVip extends Model {

	protected $table = 'amy_user_vip_log';
	public $timestamps = false;
	protected $fillable = array('uid', 'month', 'fee', 'vip_end_time', 'create_time');

}
