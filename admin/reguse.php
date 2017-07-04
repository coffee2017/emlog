<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/14
 * Time: 17:09
 */
require_once '../init.php';

define('TEMPLATE_PATH', EMLOG_ROOT.'/admin/views/');//后台当前模板路径
define('OFFICIAL_SERVICE_HOST', 'http://www.emlog.net/');//官方服务域名

$sta_cache = $CACHE->readCache('sta');
$user_cache = $CACHE->readCache('user');
$action = isset($_GET['action']) ? addslashes($_GET['action']) : '';
global $CACHE;
$db = MySql::getInstance();
$frm_action=$_GET['action'];
$User_Model = new User_Model();
if($frm_action == 'check') {
    $username = $_GET['username'];
    //根据$username去判断是否再数据库里存在填入的用户名字，如果存在返回1，如果不存在返回0，这个返回值是传到reg.js里。
    if($User_Model -> isUserExist($username)) {
        echo '1';
    }else{
        echo '0';
    }
    exit();
}
if ($action== 'new') {
        $login = isset($_POST['username']) ? addslashes(trim($_POST['username'])) : '';
        $password = isset($_POST['password']) ? addslashes(trim($_POST['password'])) : '';
        $role = isset($_POST['role']) ? addslashes(trim($_POST['role'])) : ROLE_WRITER;
        $ischeck = isset($_POST['ischeck']) ? addslashes(trim($_POST['ischeck'])) : 'y';
        $email=isset($_POST['email']) ? addslashes(trim($_POST['email'])) : '';
       // LoginAuth::checkToken();
        $PHPASS = new PasswordHash(8, true);
        $password = $PHPASS->HashPassword($password);
        $User_Model->addUser($login, $password, $role, $ischeck, $email);
        $CACHE->updateCache(array('sta','user'));
        //注册之后登入
        $username=$login;
        $password = isset($_POST['password']) ? addslashes(trim($_POST['password'])) : '';
        $img_code = Option::get('login_code') == 'y' && isset($_POST['imgcode']) ? addslashes(trim(strtoupper($_POST['imgcode']))) : '';
        $ispersis = isset($_POST['ispersis']) ? intval($_POST['ispersis']) : false;
        $loginAuthRet = LoginAuth::checkUser($username, $password, $img_code);
        if ($loginAuthRet === true) {
            LoginAuth::setAuthCookie($username, $ispersis);
            echo '<span style="color:green">注册成功，正在为你登录......</span>';
           // emDirect("./");
        } else{
            //LoginAuth::loginPage($loginAuthRet);
            echo 'Failure';
        }

}
if ($action == 'login') {
    $username = isset($_POST['user']) ? addslashes(trim($_POST['user'])) : '';
    $password = isset($_POST['pw']) ? addslashes(trim($_POST['pw'])) : '';
    $ispersis = isset($_POST['ispersis']) ? intval($_POST['ispersis']) : false;
    $img_code = Option::get('login_code') == 'y' && isset($_POST['imgcode']) ? addslashes(trim(strtoupper($_POST['imgcode']))) : '';
    $loginAuthRet = LoginAuth::checkUser($username, $password, $img_code);
    if ($loginAuthRet === true) {
        LoginAuth::setAuthCookie($username, $ispersis);
        emDirect("./");
    } else{
        //LoginAuth::loginPage($loginAuthRet);
        echo 'Failure';
    }
}