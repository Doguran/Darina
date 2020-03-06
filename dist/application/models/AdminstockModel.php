<?php
class AdminstockModel{
    
    protected $_db;
    
    
    public function __construct(){
        
        if(!ADMIN)
        throw new Exception("Нет доступа");
        $this->_db = DBConnect::run();
        
    }

    public function getIllustration($url){
        $url = $this->_db->quote($url);
        $sql = "SELECT img
                FROM  stock
                WHERE url = $url
                LIMIT 1";
        $stmt = $this->_db->query($sql);
        return $stmt->fetchColumn();
    }
    public function delIllustration($url){
        $url = $this->_db->quote($url);

        $sql = "UPDATE stock
                SET img  = null
                WHERE url = $url
                LIMIT 1";

        return $this->_db->exec($sql);
    }
   
    
    
    
 } 