<?php
/*
Template Name:默认模板
Description:默认模板，简洁优雅
Author:emlog
Author Url:http://www.emlog.net
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $site_title; ?></title>
<meta name="keywords" content="<?php echo $site_key; ?>" />
<meta name="description" content="<?php echo $site_description; ?>" />
<meta name="generator" content="emlog" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="<?php echo BLOG_URL; ?>pub/images/favicon.ico" type="image/x-icon" />
<link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo BLOG_URL; ?>rss.php" />
<link href="<?php echo BLOG_URL; ?>pub/css/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo BLOG_URL; ?>pub/css/sidemenu.css" rel="stylesheet" type="text/css" />
<link href="<?php echo BLOG_URL; ?>pub/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link  href="<?php echo BLOG_URL; ?>pub/css/reg.css" rel="stylesheet" type="text/css">
<script src="<?php echo BLOG_URL; ?>pub/js/jquery/jquery-1.11.0.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<script src="<?php echo BLOG_URL; ?>pub/js/common_tpl.js" type="text/javascript"></script>
<script src="<?php echo BLOG_URL; ?>pub/js/bootstrap.min.js" type="text/javascript"></script>
<?php doAction('index_head'); ?>
</head>
<body>
<?php blog_navi();?>
<div class="container">
	<div class="row">