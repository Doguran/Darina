<?php
class StockModel{
    
    protected $_db;
    
    public function __construct(){
        
        $this->_db = DBConnect::run();
        
    }

    public function getStock($url){
        $url = $this->_db->quote($url);
        $sql="SELECT id,title,seo_desc,keywords,img,name,anons,h1,h2,text,url
              FROM stock
              WHERE url = $url";
        $stmt = $this->_db->query($sql);
        return  $stmt->fetch(PDO::FETCH_ASSOC);
   }

    public static function getStaticStocks(){

        $sql="SELECT id,img,h1,name,anons,url
              FROM stock";
        $stmt = DBConnect::run()->query($sql);
        return  $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

      
        
}
    
    
 