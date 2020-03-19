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

        $new_arr = array();
        for ($i = 0, $c = count($arr); $i < $c; $i++)
        {
            $new_arr[$arr[$i]['parent_id']][] = $arr[$i];
        }

        return $new_arr;

   }

    public function insert($id_post,$parent_id,$name,$email,$text){

        $sth = $this->_db->prepare("INSERT INTO comments(id_post, parent_id, name, email, comment, date_add ) 
                                    VALUES(:id_post, :parent_id, :name, :email, :comment, NOW())");

        $sth->execute([
          ':id_post' => $id_post,
          ':parent_id' => $parent_id,
          ':name' => $name,
          ':email' => $email,
          ':comment' => $text
        ]);

        return $this->_db->lastInsertId();

    }




      
        
}
    
    
 