<?php
class AdminedittextModel{
    
    protected $_db;
    
    
    public function __construct(){
        
        if(!ADMIN)
        throw new Exception("Нет доступа");
        $this->_db = DBConnect::run();
        
    }
    
    public function editContact($phone1,$phone2,$address,$email,$mode,$footer){
        
        $phone1 = $this->_db->quote($phone1);
        $phone2 = $this->_db->quote($phone2);
        $email = $this->_db->quote($email);
        $mode = $this->_db->quote($mode);
        $address = $this->_db->quote($address);
        $footer = $this->_db->quote($footer);

        
        $sql="UPDATE contact
                SET mode=$mode,
                    address=$address,
                    email=$email,
                    phone1=$phone1,
                    phone2=$phone2,
                    footer=$footer";
        return $this->_db->exec($sql); 
                
    }
    
    public function editText($text,$column){
        
        $text = $this->_db->quote($text);
        
        $sql="UPDATE texts
                SET $column=$text";
                
        return $this->_db->exec($sql); 
                
    }
    
    
    public function editMainText($title,$seo_desc,$keywords,$h1,$h2,$text,$text2){


        $title = $this->_db->quote($title);
        $seo_desc  = $this->_db->quote($seo_desc);
        $keywords = $this->_db->quote($keywords);
        $h1 = $this->_db->quote($h1);
        $h2 = $this->_db->quote($h2);
        $text = $this->_db->quote($text);
        $text2 = $this->_db->quote($text2);
        
        $sql="UPDATE texts
                SET
                    title = $title,
                    seo_desc = $seo_desc,
                    keywords = $keywords,
                    h1 = $h1,
                    h2 = $h2,
                    text2 = $text2,
                    text = $text
                    WHERE id = 1";
                
        return $this->_db->exec($sql); 
                
    }
    
   
    
    
    
 } 