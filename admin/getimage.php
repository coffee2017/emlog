<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/22
 * Time: 9:49
 */
require_once 'globals.php';
    $emImage=new Image_Model();
    $id=isset($_GET['id'])?intval(trim($_GET['id'])):'';
    $title= $_GET['title'];
   // $files = "/content/uploadfile/ads/" . $_FILES["file"]["name"];
    $emImage->editImage($id,$title);
    $oneimage= $emImage->oneImage($id);
    echo $id;

