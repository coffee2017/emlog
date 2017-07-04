<?php 
/**
 * 阅读文章页面
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>

<?php include View::getView('navside');?>
<div class="col-md-8 content echo-log">
    <div class="list">
        <div class="discription">
	      <h2><?php topflg($top); ?><?php echo $log_title; ?></h2>
	      <?php echo $log_content; ?>
        </div>
    <div class="count">
        <div class="count-list">
        <span class="date">
            <i class="fa fa-calendar-o" aria-hidden="true"> </i>
            <?php echo gmdate('Y-n-j', $date); ?>
        </span>
        <span class="author">
            <i class="fa fa-user" aria-hidden="true"></i>
            <?php blog_author($author); ?>
        </span>
        <span class="sort">
            <i class="fa fa-columns" aria-hidden="true"></i>
            <?php blog_sort($logid); ?>
        </span>
            <?php editflg($logid,$author); ?>
       </div>
    </div>
        <div class="nextlog">
            <?php neighbor_log($neighborLog); ?>
            <p class="tag"><?php blog_tag($logid); ?></p>
        </div>
    </div>
	<div class="comments">
	<?php doAction('log_related', $logData); ?>
    <?php blog_comments($comments); ?>
    <?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
    </div>
</div>
    <?php
    //include View::getView('side');
    include View::getView('footer');
    ?>
</div>
<?php  $ret = explode('<pre', $log_content, 2);
if (!empty($ret[1])):?>
<link href='<?php echo BLOG_URL; ?>pub/css/sh/shCore.css' rel='stylesheet' type='text/css'>
<link href='<?php echo BLOG_URL; ?>pub/css/sh/shThemeDefault.css' rel='stylesheet' type='text/css'>
<script src='<?php echo BLOG_URL; ?>pub/js/sh/shCore.js' type='text/javascript'></script>
<script src='<?php echo BLOG_URL; ?>pub/js/sh/shAutoloader.js' type='text/javascript'></script>
<script src='<?php echo BLOG_URL; ?>pub/js/sh/main.js' type='text/javascript'></script>
  <?php endif;?>
