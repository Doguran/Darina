<?php
class CommentModel{
    
    protected $_db;
    
    public function __construct(){
        
        $this->_db = DBConnect::run();
        
    }

    public function getComments($id){
        $id = $this->_db->quote($id);
        $sql="SELECT id, parent_id, name, email, comment, DATE_FORMAT(date_add, '%d %M %Y %H:%i') as date_add 
              FROM comments 
              WHERE id_post= $id
              ORDER BY parent_id ASC, id ASC";
        $stmt = $this->_db->query($sql);
        $arr =  $stmt->fetchAll(PDO::FETCH_ASSOC);


        for ($i = 0, $c = count($arr); $i < $c; $i++)
        {
            $new_arr[$arr[$i]['parent_id']][] = $arr[$i];
        }

        return $new_arr;

   }




      
        
}
    
    
 