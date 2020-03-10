<?php

class SearchModel{
    
    protected $_db;
    
    
    public function __construct(){
        
        $this->_db = DBConnect::run();
        
    }
    
    public function searchId($fields,$keywords){
        $found = array();
        foreach($fields as $field){
            foreach($keywords as $keyword){
            if(!empty($keyword)){
                $sql = "SELECT 'stock' as t, url,h1, LEFT(text,200) AS text, IFNULL(img, 'DarinaDefault.jpg') AS img
                            FROM stock 
                            WHERE `$field` LIKE '%$keyword%' 
                        UNION ALL 
                        SELECT 'blog' as t, url,h1, LEFT(text,200) AS text, IFNULL(img, 'BlogDefault.jpg') AS img
                            FROM blog 
                            WHERE `$field` LIKE '%$keyword%'";
                    $stmt = $this->_db->query($sql);
                    $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if(!empty($all)){
                        foreach($all as $one){
                            $found[] = $one;
                        }
                    }
                }
            }
        }
       return $this->super_unique($found);
        
    }


    //уникализирует многомерный массив
    public function super_unique($array) {
        $result = array_map("unserialize", array_unique(array_map("serialize", $array)));

        foreach ($result as $key => $value)
        {
            if ( is_array($value) )
            {
                $result[$key] = $this->super_unique($value);
            }
        }

        return $result;
    }
    
    
    
    
}