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


      
        
}
    
    
 