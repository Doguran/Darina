<?php
class AdmingalleryModel{
    
    protected $_db;
    
    
    public function __construct(){
        
        if(!ADMIN)
        throw new Exception("Нет доступа");
        $this->_db = DBConnect::run();
        
    }

    public function getIllustration($id){
        $url = $this->_db->quote($id);
        $sql = "SELECT img
                FROM  gallery
                WHERE id = $id
                LIMIT 1";
        $stmt = $this->_db->query($sql);
        return $stmt->fetchColumn();
    }
    public function delIllustration($url){
        $url = $this->_db->quote($url);

        $sql = "UPDATE gallery
                SET img  = null
                WHERE url = $url
                LIMIT 1";

        return $this->_db->exec($sql);
    }



    public function insert($file){

        $sth = $this->_db->prepare("INSERT INTO gallery(img) VALUES(:img)");

        return $sth->execute([
          ':img' => $file
        ]);

    }

    public function delete($id){
        $id = $this->_db->quote($id);
        $sql = "DELETE FROM gallery
            WHERE id = $id
            LIMIT 1";
        $this->_db->exec($sql);
    }
   
    
    
    
 } 