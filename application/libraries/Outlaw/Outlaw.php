<?php

require_once(realpath(dirname(__FILE__)) . '/src/rb.php');

class Outlaw{
    
    function __construct(){
        $configs = array(
            'dns' => 'mysql:host=localhost;dbname=koala',
            'db_user' => 'koala',
            'db_password' => 'koala'
        );

        R::setup($configs['dns'], $configs['db_user'], $configs['db_password']);    
      
    }
    
    // A very dangerous method which inserting data into database.
    function inject(){
        $model_name = $_POST['ol_model_name'];

        # TODO:
        # throw new NoModelNameException('');

        $instance = $book = R::dispense($model_name);

        foreach($_POST as $key => $value){
            if (strpos($key, 'ol_')===0){
                $attr_name = substr($key, 3);
                if ($attr_name === 'model_name'){
                    continue;
                }
                $instance->$attr_name = $value;
            }
        }

        $id = R::store($instance);        
    }
    
}
