<?php

class Dashboard_Controller extends Base_Controller {

	public $restful = true;
	protected $user_notice;

	public function __construct() {
		$this->filter('before', 'auth');

        $user_notice = DB::table('users_noticeboard')
                    ->where('user_id', '=', Auth::user()->id)
                    ->first();

        $this->user_notice = empty($user_notice) ? '':$user_notice->user_notice;
	}


	public function get_index() {
		// 应该到index去的，暂时缺省去profile
		return View::make('dashboard.profile')
			->with('user_notice', $this->user_notice)
			->with('static_ethnics', DB::table('static_ethnics')->get())
			->with('static_nationalities', DB::table('static_nationalities')->get())
			->with('static_districts', DB::table('static_districts')->get())
			->with('static_marriages', DB::table('static_marriages')->get())
			->with('static_livings', DB::table('static_livings')->get())
			->with('static_academics', DB::table('static_academics')->get())
			->with('static_industries', DB::table('static_industries')->get())
			->with('static_professions', DB::table('static_professions')->get())
			->with('static_companytypes', DB::table('static_companytypes')->get())
			->with('static_salaries', DB::table('static_salaries')->get())
			->with('verified', Auth::user()->verified)
			->with('menuflg_profile', true);
		/*
		return View::make('dashboard.index')
			->with('menuflg_index', true);
		*/
	}

	public function get_profile() {
		return View::make('dashboard.profile')
			->with('user_notice', $this->user_notice)
			->with('static_ethnics', DB::table('static_ethnics')->get())
			->with('static_nationalities', DB::table('static_nationalities')->get())
			->with('static_districts', DB::table('static_districts')->get())
			->with('static_marriages', DB::table('static_marriages')->get())
			->with('static_livings', DB::table('static_livings')->get())
			->with('static_academics', DB::table('static_academics')->get())
			->with('static_industries', DB::table('static_industries')->get())
			->with('static_professions', DB::table('static_professions')->get())
			->with('static_companytypes', DB::table('static_companytypes')->get())
			->with('static_salaries', DB::table('static_salaries')->get())
			->with('verified', Auth::user()->verified)
			->with('menuflg_profile', true);
	}

	public function get_personalad() {
		return View::make('dashboard.personalad')
			->with('user_notice', $this->user_notice)
			->with('verified', Auth::user()->verified)
			->with('menuflg_personalad', true);
	}

	public function get_miscellaneous() {
		return View::make('dashboard.miscellaneous')
			->with('user_notice', $this->user_notice)
			->with('verified', Auth::user()->verified)
			->with('menuflg_miscellaneous', true);
	}

	public function get_message() {
		$user_infoauth_result = DB::table('users_infoauth')
					->where('user_id', '=', Auth::user()->id)
					->first();
		if (empty($user_infoauth_result)) {
			$user_infoauth = array();
		} else {
			$user_infoauth = unserialize($user_infoauth_result->user_info_requested_id);
		}

		return View::make('dashboard.message')
			->with('user_notice', $this->user_notice)
			->with('user_infoauth', $user_infoauth)
			->with('verified', Auth::user()->verified)
			->with('menuflg_message', true);
	}

	// 处理查看彩色照片的请求: 请求 or 忽略
	public function post_messagegalleryauthhandle() {
		if (!Request::ajax()) exit;

		$choice = Input::get('choice');
		$userid = (int) Input::get('userid');

		if (!in_array($choice, array('accepted', 'ignored'))) {
			return json_encode(array('success' => false, 'msg' => '操作错误！'));
			exit;
		}

		$user_infoauth_result = DB::table('users_infoauth')
					->where('user_id', '=', Auth::user()->id)
					->first();

		// 从infoauth表中去除这个人的请求
		if (empty($user_infoauth_result)) {
			$user_infoauth = array();
		} else {
			$user_infoauth = unserialize($user_infoauth_result->user_info_requested_id);
		}

		if(($key = array_search($userid, $user_infoauth)) !== false) {
		    unset($user_infoauth[$key]);
		}

		$affected = DB::table('users_infoauth')
			->where('user_id', '=', Auth::user()->id)
			->update(array('user_info_requested_id' => serialize(array_values($user_infoauth))));

		if ($affected > 0) {
			if ($choice == 'ignored') {
				return json_encode(array('success' => true, 'msg' => '请求处理成功！'));
				exit;
			}

			// 将这个人添加进infoauthed表中
			$exists = DB::table('users_infoauthed')
						->where('user_id', '=', Auth::user()->id)
						->where('user_info_accepted_id', '=', $userid)
						->first();
			if ($exists) {
				return json_encode(array('success' => true, 'msg' => '请求处理成功！'));
				exit;
			}

			$insert = DB::table('users_infoauthed')->insert(array(
				'user_id' => Auth::user()->id,
				'user_info_accepted_id' => $userid,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')));

			if ($insert) {
				return json_encode(array('success' => true, 'msg' => '请求处理成功！'));
				exit;
			}

			return json_encode(array('success' => false, 'msg' => '请求处理失败！'));
			exit;
		}

		return json_encode(array('success' => false, 'msg' => '请求处理失败！'));
		exit;


	}

	public function get_personaladcontent() {
		$user_personalad = DB::table('users_personalad')
					->where('user_id', '=', Auth::user()->id)
					->first();
		if (empty($user_personalad)) {
			return json_encode(array());
		}
		return json_encode($user_personalad->user_personalad);
	}

	public function post_personalad() {
		if (!Request::ajax()) exit;

		$submitData = Input::get('submitData');
		$user_personalad = DB::table('users_personalad')
							->where('user_id', '=', Auth::user()->id)
							->first();

		if ( !empty($user_personalad) ) {
			// update
			$affected = DB::table('users_personalad')
			    ->where('user_id', '=', Auth::user()->id)
			    ->update(array('user_personalad' => $submitData));

			if ($affected > 0) {
				return json_encode(array('success' => true, 'msg' => '征婚启事更新成功！'));
				exit;
			}
			return json_encode(array('success' => false, 'msg' => '征婚启事更新失败！'));
			exit;
		}

		// insert
		$insert = DB::table('users_personalad')->insert(array(
						'user_id' => Auth::user()->id,
						'user_personalad' => $submitData));
		if ($insert) {
			return json_encode(array('success' => true, 'msg' => '征婚启事添加成功！'));
			exit;
		}
		return json_encode(array('success' => false, 'msg' => '征婚启事添加失败！'));
		exit;
	}

	public function get_image() {
		return View::make('dashboard.image')
			->with('user_notice', $this->user_notice)
			->with('images', Auth::user()->images()->get())
			->with('images_num', Image::where('user_id', '=', Auth::user()->id)->count())
			->with('verified', Auth::user()->verified)
			->with('menuflg_image', true);
	}

	//upload image, save to tmp folder
	public function post_imageupload() {
		$uploader = new Qqfileuploader(Config::get('application.upallowedexts'), Config::get('application.upsizelimit'));

		// Call handleUpload() with the name of the folder, relative to PHP's getcwd()
		$result = $uploader->handleUpload('public/images/profile/tmp/');

		if ($result === true) {
			return json_encode(array('success' => true, 'uploadFileName' => $uploader->getUploadName()));
			exit;
		}

		return json_encode(array('success' => false));
	}

	//convert the uploaded image, then save it and add a record into db
	public function post_imagehandle() {
		//retrieve uploaded file name
		$imgNameFullUploaded = path('image_profile_tmp') . trim(strtolower((Input::get('uploadFileName'))));

		//check if is allowed format
		if(!in_array(File::extension($imgNameFullUploaded), Config::get('application.upallowedexts'))) {
			return json_encode(array('success' => false));
			exit;
		}

		//If 0 is provided as a width or height parameter, aspect ratio is maintained
		$image = new Imagick($imgNameFullUploaded);
		$image->compositeimage($image, Imagick::COMPOSITE_OVER, 0, 0);
		$image->setImageFormat('jpg');

		//define full-path file name to save as (eg. large20121011075938.jpg)
		$imgName = date('Ymdhis') . '.jpg';
		$imgNameSaved = 'large' . $imgName;
		$imgNameSavedThumb = 'small' . $imgName;
		$imgNameFullSaved = path('image_profile_large') . $imgNameSaved;
		$imgNameFullSavedThumb = path('image_profile_small') . $imgNameSavedThumb;

		//save
		$image->writeImage($imgNameFullSaved);

		//convert a thumbnail
		$thumb = new Imagick($imgNameFullSaved);
		$thumb->thumbnailImage(0, 120);
		$thumb->setImageFormat('jpg');
		$thumb->writeImage($imgNameFullSavedThumb);


		//check if large/small image is not jpeg format
		if (!File::is('jpg', $imgNameFullSaved) || !File::is('jpg', $imgNameFullSavedThumb)) {
			return json_encode(array('success' => false));
			exit;
		}

		@unlink($imgNameFullUploaded);

		//insert a record into database
		$insert = Image::create(array(	'user_id' => Auth::user()->id,
										'filename' => $imgNameSaved,
										'filename_thumb' => $imgNameSavedThumb));
		if ($insert != false) {
			return json_encode(array('success' => true));
			exit;
		}

		return json_encode(array('success' => false));
	}


	//执行裁剪、然后转成黑白素描图片作为头像
	public function post_imagecrop() {
		ob_start();

		$targ_w = 116;
		$targ_h = 137;
		$jpeg_quality = 90;

		$src = Input::get('imgtocrop');

		if ($_POST['x'] == 0 || $_POST['y'] == 0 || $_POST['w'] == 0 || $_POST['h'] == 0) {
			return Redirect::to_route('dashboard_image');
		}

		$img_r = imagecreatefromjpeg($src);
		$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

		imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
								$targ_w,$targ_h,$_POST['w'],$_POST['h']);

		imagejpeg($dst_r, null, $jpeg_quality);

		$i = ob_get_clean();

		//save icon image
		$iconName = Auth::user()->id . '.jpg';
		$iconNameFull = path('image_profile_icon') . $iconName;
		$fp = fopen($iconNameFull, 'w');
		if(fwrite($fp, $i) == false) {
			return Redirect::to_route('dashboard_image');
		}

		fclose($fp);

		if (!file_exists($iconNameFull)) return Redirect::to_route('dashboard_image');

		//convert into black and white first
		$img = new Imagick($iconNameFull);
		$img->modulateImage(100,0,100);
		$img->writeImage($iconNameFull);

		//convert into sketch
		$c = path('public') . 'sketch -k desat ' . $iconNameFull . ' ' . $iconNameFull;
		exec($c);

		sleep(1);

		return Redirect::to_route('dashboard_profile');
	}

	//delete choosen image, remove it in db
	public function delete_imagedelete() {
		if (!Request::ajax()) exit;

		$imgtodelete = trim(strtolower(Input::get('imgtodelete')));
		$imgtodeleteName = substr($imgtodelete, strrpos($imgtodelete, '/') + 1);
		$imgtodeleteNameThumb = str_replace('large', 'small', $imgtodeleteName);

		$affected = DB::table('images')->where('filename', '=', $imgtodeleteName)->delete();
		if ($affected < 1) {
			return json_encode(array('success' => false));
			exit;
		}

		@unlink(path('image_profile_large') . $imgtodeleteName);
		@unlink(path('image_profile_small') . $imgtodeleteNameThumb);

		return json_encode(array('success' => true));
	}

}
