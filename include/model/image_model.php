<?php

/**
 * 幻灯片加载
 */
class Image_Model{
    private $db;

    function __construct() {
        $this->db = Database::getInstance();
    }
    function getImage() {

        $sql = "SELECT * FROM " . DB_PREFIX . "image";
        $res = $this->db->query($sql);
        $logs = array();
        while ($row = $this->db->fetch_array($res)) {
            $row['id']	=$row['id'];
            $row['title']	=$row['title'];
            $logs[] = $row;
        }
        return $logs;
    }
    function addTmage($title,$files){
        $sql="insert into ".DB_PREFIX."image (title,image) values('$title','$files')";
        $this->db->query($sql);
    }
    function deleteImage($id) {
        $this->db->query("delete from ".DB_PREFIX."image where id=$id");
    }
    function updateImageState($state, $id) {
        $this->db->query("update ".DB_PREFIX."image set hide='$state' where id=$id");
    }
    function selectState($state){
        $res= $this->db->query("select * from ".DB_PREFIX."image where hide='$state'");
        $logs=array();
        while ($row = $this->db->fetch_array($res)){
            $logs[]=$row;
        }
        return $logs;
    }
    function editImage($id,$title){
        $this->db->query("update ".DB_PREFIX."image set title='$title' where id=$id");
    }
    function oneImage($id){
      $oneimage=$this->db->query("select * from ".DB_PREFIX."image where id= $id");
        $logs=array();
        while ($row = $this->db->fetch_array($oneimage)){
            $logs[]=$row;
        }
        return $logs;
    }
}
