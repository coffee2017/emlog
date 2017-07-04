<?php
/**
 *侧边导航栏
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
?>

<div class="col-md-4 sidebar">
    <a href="<?php echo BLOG_URL;?>" class="logo">
            <img src="<?php echo BLOG_URL; ?>pub/images/logo.jpg" alt="<?php echo $site_title; ?>"  width="100%">
    </a>
    <div class="blog-url">
        <?php echo substr( $_SERVER['HTTP_HOST'],4,20);?>
    </div>
    <div id="jquery-accordion-menu" class="jquery-accordion-menu red">
        <?php blog_navi_side();?>
    </div>

</div>
<?php /*<script>
    $(document).ready(function() {
        var navOffset=$(".col-md-4.sidebar").offset().top;
        $(window).scroll(function(){
            var scrollPos=$(window).scrollTop();
            if(scrollPos >=navOffset){
                $(".col-md-4.sidebar").addClass("fixed");
            }else{
                $(".col-md-4.sidebar").removeClass("fixed");
            }
        });

    });
</script>*/?>


