<?php
class BlogModel{
    
    protected $_db;
    
    public function __construct(){
        
        $this->_db = DBConnect::run();
        
    }

    public function getLastPosts($limit){
        $sql="SELECT id,url,h1
              FROM blog
              ORDER BY date_add DESC 
              LIMIT $limit";
        $stmt = $this->_db->query($sql);
        return  $stmt->fetchAll(PDO::FETCH_ASSOC);
   }

    public function getPost($url){
        $url = $this->_db->quote($url);
        $sql="SELECT id,title,seo_desc,keywords,img,h1,text,url,DATE_FORMAT(date_add, '%d.%m.%y') AS date_add
              FROM blog
              WHERE url = $url";
        $stmt = $this->_db->query($sql);
        return  $stmt->fetch(PDO::FETCH_ASSOC);
    }


      
        
}
    
    
 