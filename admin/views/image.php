<?php if (!defined('EMLOG_ROOT')) {exit('error!');}
?>
<div style="margin:20px 0px 0px 0px;">幻灯片图片</div>
<select onChange="selectSort(this);" style="width:120px;" class="form-control">
    <option value="a" <?php if($state == 'a') echo 'selected'; ?>>按显示查询</option>
    <option value="y" <?php if($state == 'y') echo 'selected'; ?>>显示</option>
    <option value="n" <?php if($state == 'n') echo 'selected'; ?>>不显示</option>
</select>
<table class="table table-striped table-bordered table-hover dataTable no-footer">
    <thead>
    <tr>
        <th width="21"><b>id</b></th>
        <th width="300">标题</th>
        <th width="200"><b>图片</b></th>
        <th width="100" colspan=""><b>是否显示</b></th>
        <th width="90"><b>删除</b></th>
    </tr>
    </thead>
    <tbody>
    <?php if($state=="a"){
        $selectimage=$imagerow;
    }
    ?>
    <?php foreach($selectimage as $key=>$value):?>
            <tr>
                <td width="21"><?php echo ($key+1); ?></td>
                <td width="300">
                    <a onclick="changeTitle($(this), '<?php echo $value['id']; ?>')">
                        <?php if( $value['title']==false){
                            echo "标题为空";
                        }else{
                           echo $value['title'];
                        } ?>
                    </a>
                </td>
                <td width="200"><a onclick="changeImage($(this), '<?php echo $value['id']; ?>')"><?php echo  '<img src="'.$value['image'].'" style="width: 100px;">'; ?></a></td>
                <td>
                    <?php if ($value['hide'] == 'y'): ?>
                        <a href="./image.php?action=display&id=<?php echo $value['id']; ?>&hide=n" title="点击隐藏">显示</a>
                    <?php else: ?>
                        <a href="./image.php?action=display&id=<?php echo $value['id']; ?>&hide=y" title="点击显示" style="color:red;">隐藏</a>
                    <?php endif;?>
                </td>
                <td width="90"><b><a href="javascript: em_confirm('<?php echo $value['id'];?>' , 'img','<?php echo $value['image']?>');" class="care">删除</a></b></td>
            </tr>
        <?php endforeach;?>
</table>
<div id="input"></div>
<div style="margin:20px 0px 0px 0px;">添加图片</div>
<form action="image.php?action=new" method="post" enctype="multipart/form-data">
<table class="table table-striped table-bordered table-hover dataTable no-footer">
    <tbody>
        <tr>
            <td width="100">添加</td>
            <td width="300"><input type="text" name="title" placeholder="添加标题"></td>
            <td width="490">
                <input type="file" name="file" id="file" />
            </td>
            <td><input type="submit" name="submit" value="添加" /></td>
        </tr>

    </tbody>
</table>
</form>

<script type="text/javascript">
    function selectSort(obj) {
        window.open("./image.php?hide=" + obj.value, "_self");
    }
    //标题修改
    function changeTitle(obj, id) {
        var val = obj.text();
        var c = obj.parent("td");
        obj.parent("td").html("<input type='text' style='width:300px;' onFocus=this.select()  onblur=submit($(this)," + id + ") value='" + val + "' />");
        c.children("input").focus();
    }
    function submit(obj, id) {
        var data ={
            id: id,
            title: obj.val(),
        };
        $.get("./getimage.php",data,function(data) {
            if (obj.val()==false){
                obj.parent("td").html("<a onclick=changeTitle($(this)," + id + ")>标题为空</a>");
            }else {
                obj.parent("td").html("<a onclick=changeTitle($(this)," + id + ")>" + obj.val() + "</a>");
            }
        });
        console.log(data);
        return false;
    }
    $("#menu_view").addClass('in');
    $("#menu_image").addClass('active');
    /*   function changeImage(obj, id) {
     var val = obj.text();
     var c = obj.parent("td");
     obj.parent("td").html("<input type='file' style='width:50px;' onFocus=this.select()  onblur=Imagesubmit($(this)," + id + ") value='" + val + "' />");
     c.children("input").focus();
     }
     function Imagesubmit(obj, id) {
     var data ={
     id: id,
     title: obj.val(),
     };
     $.get("./getimage.php",data,function(data) {
     obj.parent("td").html("<a onclick=changeTitle($(this)," + id + ")>" + obj.val() + "</a>");
     $("#input").html(data);
     });
     console.log(data);
     return false;
     }*/
</script>
