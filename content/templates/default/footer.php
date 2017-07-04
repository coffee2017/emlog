<?php 
/**
 * 页面底部信息
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
	</div>
</div>
<footer class="col-md-8 content">
    <div class="col-lg-12 footer-below">
        Powered by <a href="http://www.emlog.net" title="采用emlog系统">emlog</a> | <span>Theme By coffee</span>
        <p>Copyright © <?php echo '2017-'.date('Y'); ?> <a href="/" alt="coffee blog" title="coffee blog">coffee</a>  All Rights Reserved. </p>
        <p> <a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp; ?></a> <?php echo $footer_info; ?></p>
        <?php doAction('index_footer'); ?>
    </div>
</footer>
<div id="signup-login">
<div class="modal front" id="login-modal">
    <a class="close" data-dismiss="modal"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
    <h1>登录</h1>
    <div class="switch">
        <a data-toggle="modal"  data-dismiss="modal" href="#signup-modal"><i class="fa fa-toggle-on"></i>注册</a>
    </div>
    <div id="message"></div>
    <form name="f" method="post" action="" class="form-horizontal" id="login">
        <br>
        <div class="form-group">
            <div class="col-sm-10">
                <label class="icon" for="user_name"><i class="fa fa-user"></i></label>
                <input type="text" name="user" class="form-control" id="user" placeholder="用户名" required="required">
                <label class="usertext"></label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <label class="icon" for="user_pass"><i class="fa fa-lock"></i></label>
                <input type="password" name="pw" class="form-control" id="pw" placeholder="密码" required="required">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
             <div class="checkbox">
                 <input type="checkbox" name="ispersis">记住我
             </div>
                <div id="small-buttons">
                    <a href="http://wiki.emlog.net/doku.php?id=chpwd" class="btn btn-link btn-xs" role="button" target="_blank">忘记密码</a>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <input type="submit" id="login" class="btn btn-lg btn-success" value="登录" style="width: 100%;">
            </div>
        </div>
    </form>


</div>


<div class="modal back" id="signup-modal">
    <a class="close" data-dismiss="modal"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
    <h1>注册</h1>
    <div class="switch">
        <a data-toggle="modal"  data-dismiss="modal" href="#login-modal"><i class="fa fa-toggle-off"></i>登录</a>
        <div id="message"></div>
    </div>
    <form action="" method="post" id="regform">
        <div class="form-group">
            <div class="col-sm-10" id="user">
                <label class="icon" for="user_name"><i class="fa fa-user"></i></label>
                 <input type="text" name="username" id="username" placeholder="用户名为英文名，6~10个字符" class="form-control" autocomplete="off">
                <label class="utext"></label>
            </div>
        </div>
        <div class="form-group">

            <div class="col-sm-10">
                <label class="icon" for="user_pass"><i class="fa fa-lock"></i></label>
                <input type="password" name="password" id="password" placeholder="请输入密码" class="form-control">
                <label class="textpd"></label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <label class="icon" for="user_pass2"><i class="fa fa-retweet"></i></label>
                <input type="password" name="password2" id="rpassword" placeholder="请再次输入密码" class="form-control">
                <label class="textrpd"></label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <label class="icon" for="user_email"><i class="fa fa-envelope"></i></label>
                <input type="text" name="email" id="email" placeholder="请输入邮箱" autocomplete="off" class="form-control">
                <label class="textemail"></label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
            <input  type="submit" value="注册" class="submit btn btn-lg btn-success" style="width: 100%;">
            </div>
        </div>
    </form>
</div>
</div>
<script>
$(document).ready(function(){
	dropdownOpen();//鼠标划过就展开子菜单，免得需要点击才能展开
    prettyPrint();
});
function dropdownOpen() {
	var $dropdownLi = $('li.dropdown');
	$dropdownLi.mouseover(function() {
		$(this).addClass('open');
	}).mouseout(function() {
		$(this).removeClass('open');
	});
}
</script>
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.2.min.js"></script>
<script src="<?php echo BLOG_URL; ?>pub/js/reg.js"></script>
<link href="<?php echo BLOG_URL; ?>pub/css/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Flip/1.1.2/jquery.flip.min.js"></script>
</body>
</html>