<?php
/**
 * 站点首页模板
 */
/**
 * Created by PhpStorm.
 * User: coffee
 * Date: 2017/6/7
 * Time: 13:57
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
?>
<?php include View::getView('navside');?>
<div class="col-md-8 content log-list">
<?php if ( blog_tool_ishome() ) { ?>
    <?php include View::getView('image');?>
<?php } ?>
<?php
    if (!empty($logs)):
        foreach ($logs as $value):
            ?>
            <div class="list">
                <div class="discription">
                    <h2>
                        <?php topflg($value['top'], $value['sortop'], isset($sortid) ? intval($sortid) : '-1'); ?>
                        <a href="<?php echo $value['log_url']; ?>"><?php echo $value['log_title']; ?></a>
                    </h2>
                    <?php
                    $description=$value['log_description'];
                    //取出文章中的图片
                    preg_match('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i',$description,$match);
                    $match=isset($match[0])?$match[0]:'';
                    $description=strip_tags($description);
                    $description=mb_strlen($description, 'utf-8') > 9 ? mb_substr($description, 0, 30, 'utf-8').'[...]' : $description;
                    echo $description;
                    echo $match;
                    echo '<p class="readmore"><a href="' . Url::log($value['logid']) . '">阅读全文&gt;&gt;</a></p>';
                    ?>
                    <?php
                    //获取文章截断 文章中用[break]标准
                   // echo breakLog($value['log_description'],$value['logid']);
                    ?>
                </div>

                <div class="count">
                    <span class="date">
                        <i class="fa fa-calendar-o" aria-hidden="true"> </i>
                        <?php echo gmdate('Y-n-j', $value['date']); ?>
                    </span>
                    <span class="author">
                        <i class="fa fa-user" aria-hidden="true"></i>
                       <?php blog_author($value['author']); ?>
                    </span>
                    <span class="sort">
                        <i class="fa fa-columns" aria-hidden="true"></i>
                        <?php blog_sort($value['logid']); ?>
                    </span>
                        <?php editflg($value['logid'], $value['author']); ?>
                    <span class="comments">
                        <i class="fa fa-comments-o" aria-hidden="true"></i>
                        <a href="<?php echo $value['log_url']; ?>#comments">评论(<?php echo $value['comnum']; ?>)</a>
                    </span>
                    <span class="views">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <a href="<?php echo $value['log_url']; ?>">浏览(<?php echo $value['views']; ?>)</a>
                    </span>
                </div>
                <div style="clear:both;"></div>
            </div>
            <?php
        endforeach;
    else:
        ?>
        <h2>未找到</h2>
        <p>抱歉，没有符合您查询条件的结果。</p>
        <p><input type="button" name="button1" id="button1" value="返回" onclick="history.go(-1)"></p>
        <?php endif; ?>

    <div id="pagenavi">
        <span class="pages">第 <?php echo $page; ?> 页，共 <?php echo $total_pages; ?> 页</span>
<?php echo $page_url; ?>
    </div>
</div>

<?php
//include View::getView('side');
include View::getView('footer');
?>