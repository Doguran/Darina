<?php
class AdminblogModel{
    
    protected $_db;
    
    
    public function __construct(){
        
        if(!ADMIN)
        throw new Exception("Нет доступа");
        $this->_db = DBConnect::run();
        
    }

    public function getIllustration($url){
        $url = $this->_db->quote($url);
        $sql = "SELECT img
                FROM  blog
                WHERE url = $url
                LIMIT 1";
        $stmt = $this->_db->query($sql);
        return $stmt->fetchColumn();
    }
    public function delIllustration($url){
        $url = $this->_db->quote($url);

        $sql = "UPDATE blog
                SET img  = null
                WHERE url = $url
                LIMIT 1";

        return $this->_db->exec($sql);
    }

    public function edit($id,$title,$keywords,$seo_desc,$h1,$text,$file,$url,$date_add){


        $sth = $this->_db->prepare("UPDATE blog
                SET title = :title,
                    seo_desc = :seo_desc,
                    keywords = :keywords,
                    h1 = :h1,
                    text = :text,
                    img = :file,
                    url = :url,
                    date_add = :date_add
                WHERE id = :id");

        return $sth->execute([
                      ':title' => $title,
                      ':seo_desc' => $seo_desc,
                      ':keywords' => $keywords,
                      ':h1' => $h1,
                      ':text' => $text,
                      ':file' => $file,
                      ':url' => $url,
                      ':date_add' => $date_add,
                      ':id' => $id
                    ]);


    }

    public function insert($title,$keywords,$seo_desc,$h1,$text,$file,$url){


        $sth = $this->_db->prepare("INSERT INTO blog(title, seo_desc, keywords, h1, text, img, url, date_add ) 
                                    VALUES(:title, :seo_desc, :keywords, :h1, :text, :img, :url, NOW())");

        return $sth->execute([
          ':title' => $title,
          ':seo_desc' => $seo_desc,
          ':keywords' => $keywords,
          ':h1' => $h1,
          ':text' => $text,
          ':img' => $file,
          ':url' => $url
        ]);

    }

    public function delete($url){
        $url = $this->_db->quote($url);
        $sql = "DELETE FROM blog
            WHERE url = $url
            LIMIT 1";
        $this->_db->exec($sql);
    }
   
    
    
    
 } 