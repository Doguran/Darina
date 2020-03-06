<?php
class TextModel{
    
    protected $_db;
    
    public function __construct(){
        
        $this->_db = DBConnect::run();
        
    }

    public static function getStaticContact(){
        $sql="SELECT mode,address,email,phone1,phone2,footer
            FROM contact";
        $stmt = DBConnect::run()->query($sql);
        return  $stmt->fetch(PDO::FETCH_ASSOC);

    }


    public function getContact(){
    $sql="SELECT mode,address,email,phone1,phone2,footer
            FROM contact";
    $stmt = $this->_db->query($sql); 
    return  $stmt->fetch(PDO::FETCH_ASSOC);        
    
   }  
   
   public function getContactText(){
    $sql="SELECT contact_text
            FROM contact";
    $stmt = $this->_db->query($sql); 
    return  $stmt->fetch(PDO::FETCH_ASSOC);        
    
   }
   
   public function getText($id){

   $id = $this->_db->quote($id);

    $sql="SELECT title, seo_desc, keywords, h1, h2, text, text2
            FROM texts
            WHERE id = $id";
    $stmt = $this->_db->query($sql); 
    return  $stmt->fetch(PDO::FETCH_ASSOC);        
    
   }
   
   
   public function getAdminMail(){
    $sql="SELECT email
    FROM contact";
    $stmt = $this->_db->query($sql); 
    $email  = $stmt->fetch(PDO::FETCH_ASSOC); 
    return $email["email"];
   }
      
        
}
    
    
 