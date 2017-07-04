<?php
/**
 * 幻灯片管理
 * @copyright (c) Emlog All Rights Reserved
 */

require_once 'globals.php';
$emImage = new Image_Model();
//加载页面管理页面
if ($action == '') {
    $imagerow = $emImage->getImage();
    $state = isset($_GET['hide']) ?addslashes($_GET['hide']) : 'a';
    $selectimage= $emImage->selectState($state);
    include View::getView('header');
    require_once(View::getView('image'));
    include View::getView('footer');
    View::output();
}
//添加新幻灯片
if ($action== 'new') {
    if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 20000000)) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        } else {
            if (file_exists("/ads/" . $_FILES["file"]["name"])) {
            } else {
              move_uploaded_file($_FILES["file"]["tmp_name"],
                    EMLOG_ROOT."/content/uploadfile/ads/" . $_FILES["file"]["name"]);
            }
        }
        $title=isset($_POST['title'])?addslashes(trim($_POST['title'])):'';
        $files = "/content/uploadfile/ads/" . $_FILES["file"]["name"];
        $emImage->addTmage($title,$files);
        emDirect('image.php');
    }
    else
    {
       echo '文件格式不对';
    }
}
if($action=='del'){
    $id=isset($_GET['id'])?intval(trim($_GET['id'])):'';
    $filesname=isset($_GET['token'])?addslashes(trim($_GET['token'])):'';
    //删除文件夹里的图片
    unlink(EMLOG_ROOT.$filesname);
    $emImage->deleteImage($id);
    emDirect('image.php');
}
if($action=='display'){
    $id=isset($_GET['id'])?intval(trim($_GET['id'])):'';
    $state=isset($_GET['hide'])?addslashes(trim($_GET['hide'])):'';
    $emImage->updateImageState($state,$id);
    emDirect('image.php');
}

if($action=='eidt'){
    $id=isset($_GET['id'])?intval(trim($_GET['id'])):'';
    $title=isset($_POST['title'])?addslashes(trim($_POST['title'])):'';
    emDirect('getimage.php');
}
