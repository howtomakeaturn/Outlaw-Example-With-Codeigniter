<?php

require_once(realpath(dirname(__FILE__)) . '/src/rb.php');

class Outlaw{
    
    // A very dangerous method which inserting data into database.
    function inject(){
        $model_name = $_POST['ol_model_name'];

        # TODO:
        # throw new NoModelNameException('');

        $instance = $book = R::dispense($model_name);

        foreach($_POST as $key => $value){
            if (strpos($key, 'ot_')===0){
                $attr_name = substr($key, 3);
                $instance->attr_name = $value;
            }
        }

        $id = R::store($instance);        
    }
    
}
