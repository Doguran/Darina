<?php
class GalleryModel{
    
    protected $_db;
    
    public function __construct(){
        
        $this->_db = DBConnect::run();
        
    }

    public function getGallery(){
        $sql="SELECT id,img
              FROM gallery
              ORDER BY id DESC";
        $stmt = $this->_db->query($sql);
        return  $stmt->fetchAll(PDO::FETCH_ASSOC);
   }




      
        
}
    
    
 