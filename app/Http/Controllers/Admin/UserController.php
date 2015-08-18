<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserService;
use App\Models\UserWeight;
use App\Models\UserVip;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Validator;
use Auth;

use itbdw\QiniuStorage\QiniuStorage;

class UserController extends Controller {

	protected $view = 'user';

	public function __construct()
	{
			view()->share('view', $this->view);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
			$users = User::all();
			return view('admin.user_list', ['users' => $users]);
	}

	public function add()
	{
			return view('admin.user_add');
	}

	/**
	* 添加新用户
	*
	*/
	public function postAddUser()
	{
			$request = Request::all();
			$validator = Validator::make($request, User::rules());
			if($validator->fails())
			{
					return redirect()->back()->withErrors($validator)->withInput();
			}
			$vip = Request::input('month', '1');
			$vip_end_time = strtotime("+{$vip} month", time());
			$vip_end_date = date('Y-m-d H:i:s', $vip_end_time);
			$t = time();

			//添加用户数据
			$user = User::create([
       		'name' => $request['name'],
       		'sex' => $request['sex'],
       		'age' => $request['age'],
       		'mobile' => $request['mobile'],
       		'provinceId' => $request['provinceId'],
       		'cityId' => $request['cityId'],
       		'height' => $request['height'],
       		'weight' => $request['weight'],
       		'last_weight' => $request['weight'],
       		'vip_end_time' => $vip_end_date,
       ]);
			 //添加vip充值记录
			 UserVip::create([
 					'uid' => $user->uid,
					'month' => $vip,
					'fee' => $request['fee'],
					'vip_end_time' => $vip_end_date,
					'create_time' => $t,
 				]);

				//添加用户体重数据
				UserWeight::create([
							'uid' => $user->uid,
							'weight' => $request['weight'],
							'create_time' => $t,
					]);

				//保存上传的图片
				$files = Request::file('imageFile');
				$url = [];
				if(!empty($files))
				{
						foreach ($files as $k => $file)
						{
								if($file->isValid())
								{
										$extension = $file->getClientOriginalExtension();
										$filename = 'focusgirls_' . $k . '_' . microtime(true) * 10000 . '.' . $extension;

										$disk = QiniuStorage::disk('qiniu');
										$disk->put($filename, File::get($file));

										$url[] = $disk->downloadUrl($filename);
								}
						}
				}
				$content = $request['content'];
				if(!empty($url) && $content)
				{
						//保存用户服务记录
						$tmp_url = json_encode($url);
						UserService::create([
									'uid' => $user->uid,
									'img' => $tmp_url,
									'content' => $content,
									'serv_id' => Auth::user()->id,
									'create_time' => $t,
							]);
				}

		 	return redirect('user');
	}

	/**
	*	 更新用户体重记录
	*/
	public function postupdateWeight()
	{
			$request = Request::all();
			$uid = $request['uid'];
			$weight = $request['weight'];
			if($uid && $weight)
			{
					$user = User::find($uid);
					if($user)
					{
							$user->last_weight = $weight;
							$user->save();
							$t = time();
							//添加用户体重数据
							UserWeight::create([
										'uid' => $user->uid,
										'weight' => $weight,
										'create_time' => $t,
								]);
					}
			}
			return redirect('user');
	}

	/**
	*	 会员续费
	*/
	public function postupdateVip()
	{
			$request = Request::all();
			$uid = $request['uid'];
			$month = $request['month'];
			$fee = $request['fee'];
			if($uid && $month && $fee)
			{
					$user = User::find($uid);
					if($user)
					{
							$vip_end_time = $user->vip_end_time;

							$vip_end_time = strtotime("+{$month} month", strtotime($vip_end_time));
							$vip_end_date = date('Y-m-d H:i:s', $vip_end_time);

							$user->vip_end_time = $vip_end_date;
							$user->save();
							$t = time();
							//添加vip充值记录
			 			 	UserVip::create([
			  					'uid' => $user->uid,
				 					'month' => $month,
				 					'fee' => $fee,
				 					'vip_end_time' => $vip_end_date,
				 					'create_time' => $t,
			  				]);
					}
			}
			return redirect('user');
	}


	function getUserService($uid)
	{
			$user = User::find($uid);
			if($user)
			{
					return view('admin.user_service', ['user' => $user]);
			}
			return redirect('user');
	}


	function postupdateService()
	{
			$request = Request::all();
			$uid = $request['uid'];
			$content = $request['content'];
			$files = Request::file('imageFile');
			$user = User::find($uid);
			if($user && !empty($files) && $content)
			{
					$t = time();
					$user->updated_at = date('Y-m-d H:i:s', $t);
					$user->save();

					$url = $this->uploadImgs($files);
					$tmp_url = json_encode($url);
					UserService::create([
								'uid' => $user->uid,
								'img' => $tmp_url,
								'content' => $content,
								'serv_id' => Auth::user()->id,
								'create_time' => $t,
						]);
			}
			return redirect('user');
	}

	function uploadImgs($files)
	{
			$url = [];
			if(!empty($files))
			{
					foreach ($files as $k => $file)
					{
							if($file->isValid())
							{
									$extension = $file->getClientOriginalExtension();
									$filename = 'focusgirls_' . $k . '_' . microtime(true) * 10000 . '.' . $extension;

									$disk = QiniuStorage::disk('qiniu');
									$disk->put($filename, File::get($file));

									$url[] = $disk->downloadUrl($filename);
							}
					}
			}

			return $url;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
