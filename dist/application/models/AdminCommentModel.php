<?php
class AdminCommentModel{
    
    protected $_db;
    
    
    public function __construct(){
        
        if(!ADMIN)
        throw new Exception("Нет доступа");
        $this->_db = DBConnect::run();
        
    }
    
    
    
    public function del($id){
        
        $id = $this->_db->quote($id);
        
        $sql="DELETE FROM comments
                WHERE id = $id";
                
        return $this->_db->exec($sql); 
                
    }
    
    
    
    
   
    
    
    
 } 