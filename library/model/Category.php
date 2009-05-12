<?php
Rhaco::import("model.table.CategoryTable");
/**
 * 
 */
class Category extends CategoryTable{
    function toString(){
        return $this->name;
    }
}

?>