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

    public function edit($id,$title,$keywords,$seo_desc,$name,$anons,$h1,$h2,$text,$file,$url){


        $sth = $this->_db->prepare("UPDATE stock
                SET title = :title,
                    seo_desc = :seo_desc,
                    keywords = :keywords,
                    name = :name,
                    anons = :anons,
                    h1 = :h1,
                    h2 = :h2,
                    text = :text,
                    img = :file,
                    url = :url
                WHERE id = :id");

        return $sth->execute([
                      ':title' => $title,
                      ':seo_desc' => $seo_desc,
                      ':keywords' => $keywords,
                      ':name' => $name,
                      ':anons' => $anons,
                      ':h1' => $h1,
                      ':h2' => $h2,
                      ':text' => $text,
                      ':file' => $file,
                      ':url' => $url,
                      ':id' => $id
                    ]);


    }

    public function insert($title,$keywords,$seo_desc,$name,$anons,$h1,$h2,$text,$file,$url){


        $sth = $this->_db->prepare("INSERT INTO stock(title, seo_desc, keywords, name, anons, h1, h2, text, img, url ) 
                                    VALUES(:title, :seo_desc, :keywords, :name, :anons, :h1, :h2, :text, :img, :url)");

        return $sth->execute([
          ':title' => $title,
          ':seo_desc' => $seo_desc,
          ':keywords' => $keywords,
          ':name' => $name,
          ':anons' => $anons,
          ':h1' => $h1,
          ':h2' => $h2,
          ':text' => $text,
          ':img' => $file,
          ':url' => $url
        ]);

    }

    public function delete($url){
        $url = $this->_db->quote($url);
        $sql = "DELETE FROM stock
            WHERE url = $url
            LIMIT 1";
        $this->_db->exec($sql);
    }
   
    
    
    
 } 