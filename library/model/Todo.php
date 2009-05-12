<?php
Rhaco::import("model.table.TodoTable");
/**
 * 
 */
class Todo extends TodoTable{
    function beforeUpdate(){
        $this->updated = time();
    }
    function toString(){
        return $this->subject;
    }
    function views(){
        return array(
            'ordering' => '-priority',
            'list_display' => 'category,subject,description,priority',
            'form_display' => 'category,subject,description,priority',
        );
    }
}

?>