<header class="home-page-header">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="carousel slide" id="carousel-945216">
                    <?php
                    $emimage= new Image_Model();
                    $imagerow=$emimage->getImage();
                    function filter($rows){
                        if($rows['hide']==="n"){
                            return false;
                        }else{
                            return true;
                        }
                    }
                    $imagerow = array_filter( $imagerow, 'filter');
                    ?>
                    <ol class="carousel-indicators">
                        <?php foreach ($imagerow as $key=>$value): ?>

                            <?php if($value !=end($imagerow)){?>
                                <li data-slide-to="<?php echo $key;?>" data-target="#carousel-945216">
                                </li>
                            <?php }else{?>
                                <li data-slide-to="<?php echo $key; ?>" data-target="#carousel-945216" class="active">
                                </li>
                            <?php }?>
                        <?php endforeach;?>
                    </ol>
                    <div class="carousel-inner">
                        <?php foreach ($imagerow as $key =>$value):?>
                            <?php if($value !=end($imagerow)){?>
                                <div class="item">
                                    <img alt="" src="<?php echo $value['image'] ;?>" />
                                    <div class="carousel-caption">
                                        <p>
                                            <?php echo $value['title'];?>
                                        </p>
                                    </div>
                                </div>
                            <?php  }else{?>
                                <div class="item active">
                                    <img alt="" src="<?php echo $value['image'] ;?>" />
                                    <div class="carousel-caption">
                                        <p>
                                            <?php echo $value['title'];?>
                                        </p>
                                    </div>
                                </div>
                            <?php }?>
                        <?php endforeach;?>
                    </div> <a data-slide="prev" href="#carousel-945216" class="left carousel-control">‹</a> <a data-slide="next" href="#carousel-945216" class="right carousel-control">›</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.carousel').carousel()
    </script>
</header>