<?php
/**
 * Created by PhpStorm.
 * User: coffee
 * Date: 2017/6/7
 * Time: 16:23
 */
require_once '../init.php';
header('content-type:text/html;charset=utf-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>注册</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BLOG_URL; ?>admin/views/css/reset.css">
    <link rel="stylesheet" href="<?php echo BLOG_URL; ?>admin/views/css/supersized.css">
    <link rel="stylesheet" href="<?php echo BLOG_URL; ?>admin/views/css/style.css">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
<div class="page-container">
    <h1>注册</h1>
    <form action="" method="post" id="regform">
        <div class="int">
                <input type="text" name="username" id="username" placeholder="用户名为英文名，6~10个字符" autocomplete="off">
                 <span class="utext"></span>
        </div>
        <div class="int">
                <input type="password" name="password" id="password" placeholder="请输入密码">
                <span class="textpd"></span>
        </div>
        <div class="int">
                <input type="password" name="password2" id="rpassword" placeholder="请再次输入密码">
                <span class="textrpd"></span>
        </div>
        <div class="int">
                <input type="text" name="email" id="email" placeholder="请输入邮箱" autocomplete="off">
                <span class="textemail"></span>
        </div>

                <input class="submit" type="submit" value="注册">
        <div class="error"><span>+</span></div>
    </form>
</div>
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.2.min.js"></script>
<script>
    $(document).ready(function () {
        var username = false,
            passwd = false,
            rpassed =false,
            email=false;
        //验证用户名
        $("#username").change(function () {
            var $username = $("#username"),
                $text = $(".utext"),
                value = $.trim($username.val()),
                reg = /^[A-Za-z]+$/;
            var changeUrl = "reguse.php?action=check&username="+value;
            if (!value.match(reg)) {
                $text.text("用户名为英文，不能有空格");
                return false;
            } else if(value.length<6){
                $text.text("用户名的长度在6~10个字符");
                return false;
            }else if( value.length>10){
                $text.text("用户名的长度在6~10个字符");
                return false;
            } else {
                $.get(changeUrl,function(str){
                    if(str == '1'){
                        $(".utext").html("<font color=\"red\">您输入的用户名存在！请重新输入！</font>");
                        return false;
                    }else{
                        $text.text('用户名可以用');
                        username = true;
                    }
                })
                return false;
            }
        });
        //验证密码
        $("#password").change(function () {
            var $password = $("#password"),
                $text = $(".textpd"),
                value = $.trim($password.val());
            if (value.length < 8) {
                $text.text("密码不能小于8个字符");
                return false;
            } else {
                $text.text("");
                passwd = true;
            }
        });
        //验证两次密码是否一致
        $("#rpassword").change(function () {
            var rpassedval =$("#rpassword").val(),
                password= $("#password").val(),
                $text=$('.textrpd');
            if(rpassedval!=password){
                $text.text('两次密码不一致');
                return false;
            }else {
                $text.text("");
                rpassed = true;
            }
        });
        //验证邮箱
        $("#email").change(function () {
            var emailval=$("#email").val(),
                $text=$(".textemail"),
                emailreg = /^[A-Za-z0-9\u4e00-\u9fa5]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;
            if(!emailval.match(emailreg)){
                $text.text("你输入的邮箱不正确");
                return false;
            }else {
                $text.text("");
                email =true;
            }

        });
        //提交数据验证
        $("#regform").submit(function () {
            if (username && passwd && rpassed && email) {
                var data = {
                    username: $("#username").val(),
                    password: $("#password").val(),
                    email: $("#email").val()
                };
                $.post("reguse.php?action=new",data, function(){
                   // $(".reult").html(data);
                    self.location='user.php?active_add=1';

                    return false;
                    <?php //emDirect('./user.php?active_add=1');?>
                });
                return false;

            } else {
                alert("你填的信息不正确");
                return false;
            }
        })

    })
</script>
</body>
<!-- Javascript -->
<style>
    .int span {
        color: red;
    }
</style>

<script src="<?php echo BLOG_URL; ?>admin/views/js/jquery-1.8.2.min.js"></script>
<script src="<?php echo BLOG_URL; ?>admin/views/js/supersized.3.2.7.min.js"></script>
<script src="<?php echo BLOG_URL; ?>admin/views/js/supersized-init.js"></script>
<script src="<?php echo BLOG_URL; ?>admin/views/js/scripts.js"></script>
</html>

