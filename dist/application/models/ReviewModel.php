<?php
class ReviewModel{
    
    protected $_db;
    
    public function __construct(){
        
        $this->_db = DBConnect::run();
        
    }

    public function getReview(){
        $sql="SELECT id,img
              FROM review
              ORDER BY id DESC";
        $stmt = $this->_db->query($sql);
        return  $stmt->fetchAll(PDO::FETCH_ASSOC);
   }

    public function getPost($url){
        $url = $this->_db->quote($url);
        $sql="SELECT id,title,seo_desc,keywords,IFNULL(img, 'BlogDefault.jpg') AS img,h1,text,url,DATE_FORMAT(date_add, '%d.%m.%y') AS date_add
              FROM blog
              WHERE url = $url";
        $stmt = $this->_db->query($sql);
        return  $stmt->fetch(PDO::FETCH_ASSOC);
    }


      
        
}
    
    
 