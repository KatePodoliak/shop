<?php

class ProductModel extends Model
{
    private $sections;
    private $section;
    private $products;
    private $params;

    public function addSection($name)
    {
        $field_names = implode(", ", array('name'));
        $field_values = implode(", ", array("'$name'"));
        $sql = "INSERT INTO ".DBTBL_SECTIONS." ($field_names) VALUES ($field_values);";
        return MyDB::query($sql);
    }

    public function updateSection($id, $name, $fname = 'id')
    {
        $data = array('name' => "'$name'");
        $fvalues = '';
        foreach ($data as $key => $value)
            $fvalues .= " $key = $value,";
        $fvalues = substr($fvalues, 0, -1);
        $sql = "UPDATE ".DBTBL_SECTIONS." SET $fvalues WHERE $fname = '$id';";
        return MyDB::query($sql);
    }

    public function deleteSection($fvalue, $fname ='id')
    {
        $sql = "DELETE FROM ".DBTBL_SECTIONS." WHERE $fname = '$fvalue';";
        return MyDB::query($sql);
    }

    public function getSection($id)
    {
        $this->section = $this->getTable(DBTBL_SECTIONS, 'id', $id);
        if(count($this->section) == 1)
            $this->section = $this->section[0];
        return $this->section;
    }

    public function getSections()
    {
        $this->sections = $this->getTable(DBTBL_SECTIONS);
        return $this->sections;
    }

    public function getTable($table, $fname = "", $fvalue = "")
    {
        $where = "";
        if ($fname != "")
            $where = " WHERE $fname = $fvalue";
        $sql = "SELECT * FROM " . $table . " " . $where . " ORDER BY id;";
        $tmp = MyDB::query($sql);
        return $tmp;
    }

    public function addProduct($name, $brand, $img, $price, $code, $idSection)
    {
        $fnames = implode(", ", array('name','brand','img','price','code','idSection'));
        $fvalues = implode(", ", array("'$name'","'$brand'","'$img'","'$price'","'$code'","'$idSection'"));
        $sql = "INSERT INTO ".DBTBL_PRODUCTS." ($fnames) values ($fvalues);";
        return MyDB::query($sql);
    }

    public function updateProduct($id, $name, $brand, $img, $price, $code, $fname = 'id')
    {
        $data = array('name' => "'$name'",'brand'=>"'$brand'",'img'=>"'$img'",'price'=>"'$price'",'code'=>"'$code'");
        $field_names_values = '';
        foreach ($data as $key => $value) 
            $field_names_values .= " $key = $value,";
        $field_names_values = substr($field_names_values, 0, -1);
        $sql = "UPDATE ".DBTBL_PRODUCTS." SET $field_names_values  WHERE $fname = '$id';";
        return MyDB::query($sql);
    }

    public function deleteProduct($fvalue, $fname ='id')
    {
        $sql = "DELETE FROM ".DBTBL_PRODUCTS." WHERE $fname = '$fvalue';";
        $this->deleteParams($fvalue);
        return MyDB::query($sql);
    }

    public function getAllProducts()
    {
        $this->products = $this->getTable(DBTBL_PRODUCTS);
        return $this->products;
    }

    public function getProducts($idSection)
    {
        $this->products = $this->getTable(DBTBL_PRODUCTS,'idSection', $idSection);
        return $this->products;
    }

    public function getProduct($id)
    {
        $this->params = $this->getTable(DBTBL_PRODUCTS,'id',$id);
        if(count($this->params) == 1)
            $this->params = $this->params[0];
        if (!is_null($this->params)) {
            $tmp = $this->getTable(DBTBL_PARAMS,'idProduct',$id);
            if (!is_null($tmp))
                $this->params['param'] = $tmp;
            return $this->params;
        }
        return null;
    }

    public function getProductByCode($code)
    {
        $product = $this->getTable(DBTBL_PRODUCTS, 'code', $code);
    }

    public function addParam($id, $name, $value)
    {
        $sql = "INSERT INTO " . DBTBL_PARAMS . " (name, value, idProduct) VALUES ('$name','$value','$id');";
        return MyDB::query($sql);
    }

    public function deleteParams($id)
    {
        $sql = "DELETE FROM ".DBTBL_PARAMS." WHERE idProduct = '$id';";
        return MyDB::query($sql);
    }

    public function deleteParam($fvalue, $fname = 'id')
    {
        $sql = "DELETE FROM ".DBTBL_PARAMS." WHERE $fname = '$fvalue';";
        return MyDB::query($sql);
    }
}