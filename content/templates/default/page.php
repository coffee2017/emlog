<?php 
/**
 * 自建页面模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<?php include View::getView('navside');?>
<div class="col-md-8 content echo-log">
    <div class="list">
    <div class="discription">
	<h2><?php echo $log_title; ?></h2>
	<?php echo $log_content; ?>
	<?php blog_comments($comments); ?>
	<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
	<div style="clear:both;"></div>
</div>
</div>
</div>
<?php
 include View::getView('footer');
?>
<?php  $ret = explode('<pre', $log_content, 2);
if (!empty($ret[1])):?>
    <link href='http://agorbatchev.typepad.com/pub/sh/3_0_83/styles/shCore.css' rel='stylesheet' type='text/css'>
    <link href='http://agorbatchev.typepad.com/pub/sh/3_0_83/styles/shThemeDefault.css' rel='stylesheet' type='text/css'>
    <script src='http://agorbatchev.typepad.com/pub/sh/3_0_83/scripts/shCore.js' type='text/javascript'></script>
    <script src='http://agorbatchev.typepad.com/pub/sh/3_0_83/scripts/shAutoloader.js' type='text/javascript'></script>
    <script src='<?php echo TEMPLATE_URL; ?>js/main.js' type='text/javascript'></script>
<?php endif;?>
