 $(document).ready(function () {
        var username = false,
            passwd = false,
            rpassed =false,
            email=false;
        //验证用户名
        $("#username").bind('input propertychange',function () {
            var $username = $("#username"),
                $text = $(".utext"),
                value = $.trim($username.val()),
                $user =$("#username"),
                reg = /^[A-Za-z]+$/;
            var changeUrl = "/admin/reguse.php?action=check&username="+value;
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
                        $(".utext").text('用户名已存在');
                        return false;
                    }else{
                        $text.text('');
                        username = true;
                    }
                })
                return false;
            }
        });
        //验证密码
        $("#password").bind('input propertychange',function () {
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
        $("#rpassword").bind('input propertychange',function () {
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
        $("#email").bind('input propertychange',function () {
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
                $.post("/admin/reguse.php?action=new",data, function(data){
                    $(".switch #message").html(data);
                    setTimeout("window.location.reload()",2000)
                    /*setTimeout(function () {
                        window.location.reload(); //手机网页式跳转
                    },2000);*/
                   // window.location.reload();
                });
                return false;

            } else {
               $(".switch #message").text("您填的信息不完整，注册失败")
                return false;
            }
        });
        //登入信息验证
     $("#user").bind('input propertychange',function () {
         var $uer=$("#user"),
             $text=$(".usertext"),
             userval=$.trim($uer.val());
         if(userval.length<6){
             $text.text("用户名不能少于6个字符");
             return false;
         }else {
             $text.text("");
             return false;
         }
     });
     $("#login").submit(function () {
             var data = {
                 user: $("#user").val(),
                 pw: $("#pw").val()
             };
             $.post("/admin/reguse.php?action=login",data, function(data){
                 if(data=="Failure"){
                     $("#message").html("<span style='color:red'>用户名或者密码错误</span>");
                 }else {
                     window.location.reload();
                 }
                 return false;
             });
             return false;

     });
/*     $(".btn2").click(function(){
         $("#login-modal").animate({display:'none'});
     });*/

/*     $("#signup-login").flip({
         trigger: 'manual',
        speed:1000
     });

     $("#flip-btn").click(function(){
         $("#card-4").flip(true);
     });

     $("#unflip-btn").click(function(){
         $("#card-4").flip(false);
     });

     $("#toggle-btn").click(function(){
         $("#signup-login").flip('toggle');
     });*/
 });
/*
 $(document).on('focus','input',function(){
     $(this).siblings('label').animate({top:'-20px'});
 })
.on('focusout','input',function(){
         $(this).siblings('label').animate({top:'0'});
     })*/
