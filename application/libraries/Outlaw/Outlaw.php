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
    // Use REQUEST instead of POST ?
    function inject(){
        $model_name = $_POST['ol_table'];

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
    
    // A very dangerous method which removes data from database.
    function murder(){
        $model_name = $_REQUEST['ol_table'];
        $id = $_REQUEST['ol_id'];
        $book = R::load('book', $id);
        $instance = R::load($model_name, $id);
        R::trash( $instance );        
    }
    
    function take(){
        $model_name = $_REQUEST['ol_table'];
        $id = $_REQUEST['ol_id'];
        $instance = R::load($model_name, $id);
        return $instance;
    }
    
    function gather(){
        $table_name = $_REQUEST['ol_table'];
        return R::findAll($table_name);
    }
    
}
