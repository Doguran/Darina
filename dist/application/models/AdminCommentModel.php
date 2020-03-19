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

        $this->delete($id);

        $child = $this->getPapa($id);
        if($child){
            foreach ($child AS $val){
                $this->del($val['id']);
            }
        }
                
    }

    private function getPapa($id){
        $sql="SELECT id FROM comments
                WHERE parent_id = $id";
        $stmt = $this->_db->query($sql);
        return  $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function delete($id){

        $sql="DELETE FROM comments
                WHERE id = $id";

        return $this->_db->exec($sql);

    }


    
    
    
    
   
    
    
    
 } 