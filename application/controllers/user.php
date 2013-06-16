<?php
class User_Controller extends Base_Controller
{
    public function __construct() {
        $this->filter('before', 'auth');
    }

    public $restful = true;

    public function get_search() {
        // 判断自己是否通过了帐号验证
        $iamverified = DB::table('users')
            ->where('id', '=', Auth::user()->id)
            ->where('verified', '=', 2)
            ->first();
        $iamverified = empty($iamverified)? false:true;
        if ($iamverified) {
            return View::make('search');
                //->with('users', User::all());
        }

        return View::make('site.pageneedverified');
    }

    public function post_search() {

        $qHeightSmaller = (int) Input::get('qHeightSmaller');
        $qHeightTaller  = (int) Input::get('qHeightTaller');

        $qSalaryLow     = (int) Input::get('qSalaryLow');
        $qSalaryHigh    = (int) Input::get('qSalaryHigh');
        if ($qSalaryLow < 1000) {
            $qSalaryLow = 1;
        } elseif ($qSalaryLow < 1900) {
            $qSalaryLow = 2;
        } elseif ($qSalaryLow < 2900) {
            $qSalaryLow = 3;
        } elseif ($qSalaryLow < 3900) {
            $qSalaryLow = 4;
        } elseif ($qSalaryLow < 4900) {
            $qSalaryLow = 5;
        } elseif ($qSalaryLow < 5900) {
            $qSalaryLow = 6;
        } elseif ($qSalaryLow < 6900) {
            $qSalaryLow = 7;
        } elseif ($qSalaryLow < 7900) {
            $qSalaryLow = 8;
        } elseif ($qSalaryLow < 8900) {
            $qSalaryLow = 9;
        } elseif ($qSalaryLow < 9900) {
            $qSalaryLow = 10;
        } elseif ($qSalaryLow < 11900) {
            $qSalaryLow = 11;
        } elseif ($qSalaryLow < 14900) {
            $qSalaryLow = 12;
        } elseif ($qSalaryLow < 19900) {
            $qSalaryLow = 13;
        } elseif ($qSalaryLow < 29900) {
            $qSalaryLow = 14;
        } elseif ($qSalaryLow < 30000) {
            $qSalaryLow = 15;
        }

        if ($qSalaryHigh < 1000) {
            $qSalaryHigh = 1;
        } elseif ($qSalaryHigh < 1900) {
            $qSalaryHigh = 2;
        } elseif ($qSalaryHigh < 2900) {
            $qSalaryHigh = 3;
        } elseif ($qSalaryHigh < 3900) {
            $qSalaryHigh = 4;
        } elseif ($qSalaryHigh < 4900) {
            $qSalaryHigh = 5;
        } elseif ($qSalaryHigh < 5900) {
            $qSalaryHigh = 6;
        } elseif ($qSalaryHigh < 6900) {
            $qSalaryHigh = 7;
        } elseif ($qSalaryHigh < 7900) {
            $qSalaryHigh = 8;
        } elseif ($qSalaryHigh < 8900) {
            $qSalaryHigh = 9;
        } elseif ($qSalaryHigh < 9900) {
            $qSalaryHigh = 10;
        } elseif ($qSalaryHigh < 11900) {
            $qSalaryHigh = 11;
        } elseif ($qSalaryHigh < 14900) {
            $qSalaryHigh = 12;
        } elseif ($qSalaryHigh < 19900) {
            $qSalaryHigh = 13;
        } elseif ($qSalaryHigh < 29900) {
            $qSalaryHigh = 14;
        } elseif ($qSalaryHigh <= 30000) {
            $qSalaryHigh = 15;
        }

        $qBornYoung        = date('Y') - (int) Input::get('qAgeYoung');
        $qBornOld          = date('Y') - (int) Input::get('qAgeOld');

        $qAcademicLow      = (int) Input::get('qAcademicLow');
        $qAcademicHigh     = (int) Input::get('qAcademicHigh');

        $qSex              = Input::get('qSex');
        $qNationalityStr   = Input::get('qNationality');
        $qNationalityArr   = explode(',', $qNationalityStr);

        $qDistrictStr      = Input::get('qDistrict');
        $qDistrictArr      = explode(',', $qDistrictStr);

        $users = DB::table('users')
                    ->where('height',         '>=',  $qHeightSmaller)
                    ->where('height',         '<=',  $qHeightTaller)
                    ->where('born',           '>=',  $qBornOld)
                    ->where('born',           '<=',  $qBornYoung)
                    ->where('salary',         '>=',  $qSalaryLow)
                    ->where('salary',         '<=',  $qSalaryHigh)
                    ->where('academic',       '>=',  $qAcademicLow)
                    ->where('academic',       '<=',  $qAcademicHigh)
                    ->where('sex',            '=',   $qSex)
                    ->where_in('nationality', $qNationalityArr)
                    ->where_in('district',    $qDistrictArr)
                    ->where('verified',       '=',   2)
                    //->join('images',          'users.id', '=', 'images.user_id')
                    ->order_by('id',          'desc')
                    ->get(array('id'));

        //var_dump(DB::profile());
        return Response::json($users);
    }

    public function get_galleryauth($id) {
        $record = DB::table('users_infoauth')->where('user_id', '=', $id)->first();
        if (empty($record)) {
            // insert
            $insert = DB::table('users_infoauth')->insert(array(
                            'user_id' => $id,
                            'user_info_requested_id' => serialize(array(Auth::user()->id)),
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')));
            if ($insert) {
                return json_encode(array('success' => true, 'msg' => '发送成功！！'));
                exit;
            }
            return json_encode(array('success' => false, 'msg' => '发送失败！！'));
            exit;
        }
        //var_dump($record);die;
        // update
        $user_info_requested_id = unserialize($record->user_info_requested_id);
        if ( !in_array(Auth::user()->id, $user_info_requested_id) ) {
            $user_info_requested_id[] = Auth::user()->id;
            $affected = DB::table('users_infoauth')
                        ->where('user_id', '=', $id)
                        ->update(array('user_info_requested_id' => serialize($user_info_requested_id),
                                       'updated_at' => date('Y-m-d H:i:s')));
            if ($affected > 0) {
                return json_encode(array('success' => true, 'msg' => '发送成功！'));
                exit;
            }
        }

        return json_encode(array('success' => false, 'msg' => '已发送过，请等待对方处理！'));
        exit;
    }

    public function get_profile($id) {
        // 判断用户是否存在，不存在就返回404页面
        if( User::find($id) === null ) {
            return Response::error('404');
        }

        // 判断自己是否通过了帐号验证
        if ((int)Auth::user()->id != (int)$id) {
            $iamverified = DB::table('users')
                ->where('id', '=', Auth::user()->id)
                ->where('verified', '=', 2)
                ->first();
            $iamverified = empty($iamverified)? false:true;
            if (!$iamverified) {
                return View::make('site.pageneedverified');
            }
        }

        // 如果看的人不是自己，就往关注表里插入一条查看过TA的历史信息
        if( (int) Auth::user()->id !== (int) $id ){
            $insert = DB::table('users_bewatched')->insert(array(
                            'user_id' => $id,
                            'watcher_user_id' => Auth::user()->id,
                            'watched_date' => date('Y-m-d H:i:s')));
        }

        // 检查自己有没有对他的照片查看权，如果有，则隐藏按钮，并显示彩色照片
        $iamallowed = DB::table('users_infoauthed')
            ->where('user_id', '=', $id)
            ->where('user_info_accepted_id', '=', Auth::user()->id)
            ->first();
        $iamallowed = empty($iamallowed)? false:true;

        // 获取征婚信息
        $user_personalad = DB::table('users_personalad')
                    ->where('user_id', '=', $id)
                    ->first();
        $user_personalad = empty($user_personalad) ? '':$user_personalad->user_personalad;

        // 获取login历史信息
        $d = array();// 最近50天的日期
        for($i = 49; $i >= 0; $i--)
            $d[date('Y-m-d', strtotime('-'. $i .' days'))] = 0;

        $login_history = DB::query("SELECT COUNT(user_id) AS login_times, DATE_FORMAT(login_at, '%Y-%m-%d') AS login_date
                        FROM users_loginhistory
                        WHERE user_id = ?
                        GROUP BY login_date
                        LIMIT 100", array($id));

        foreach ($login_history as $date) {
            if (array_key_exists($date->login_date, $d)) {
                $d[$date->login_date] = $date->login_times;
            }
        }

        // 获取被关注的信息
        $watchers = DB::table('users_bewatched')
                ->where('user_id', '=', $id)
                ->take(20)
                ->distinct()
                ->order_by('watched_date', 'desc')
                ->get(array('watcher_user_id'));
        
        return View::make('profile')
            ->with('iamallowed', $iamallowed)
            ->with('images', User::find($id)->images)
            ->with('user_personalad', $user_personalad)
            ->with('d', $d)
            ->with('watchers', $watchers)
            ->with('user', User::profile($id));
    }
}
