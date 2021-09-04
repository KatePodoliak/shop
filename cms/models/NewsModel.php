<?php

class NewsModel extends Model
{
    private $articles;
    private $article;

    public function addArticle($name, $content, $url)
    {
        $fnames = implode(", ", array('name','content','dateAdd','url'));
        $fvalues = implode(", ", array("'$name'","'$content'",'NOW()',"'$url'"));
        $sql = "INSERT INTO ".DBTBL_NEWS." ($fnames) VALUES ($fvalues);";
        return MyDB::query($sql);
    }

    public function updateArticle($id, $name, $content, $url, $fname='id')
    {
        $data = array('name' => "'$name'",'url'=>"'$url'",'content'=>"'$content'");
        $fvalues = '';
        foreach ($data as $key => $value) 
            $fvalues .= " $key = $value,";
        $fvalues = substr($fvalues, 0, -1);
        $sql = "UPDATE ".DBTBL_NEWS." SET $fvalues WHERE $fname = '$id';";
        return MyDB::query($sql);
    }

    public function deleteArticle($fvalue, $fname='id')
    {
        $sql = "DELETE FROM ".DBTBL_NEWS." WHERE $fname = '$fvalue';";
        return MyDB::query($sql);
    }

    public function getArticles($fname = "", $fvalue = "")
    {
        $where = "";
        if ($fname != "")
            $where = " WHERE $fname = $fvalue";
        $sql = "SELECT * FROM " . DBTBL_NEWS . " " . $where . ";";
        $this->articles = MyDB::query($sql);
        return $this->articles;
    }

    public function getArticle($idNews)
    {
        $data = array('name', 'url','id','content','dateAdd');
        $this->article = $this->getArticles('id', "'$idNews'", $data);
        if(count($this->article) == 1)
            $this->article = $this->article[0];
        return $this->article;
    }
}