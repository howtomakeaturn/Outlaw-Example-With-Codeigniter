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

    /*
     * A very dangerous method which inserting data into database.
     * 
     */
    function inject($table_name=null){
        $table_name = ($table_name) ? $table_name : $this->guessTableName();

        # TODO:
        # throw new NoModelNameException('');

        $instance = $book = R::dispense($table_name);

        foreach($_REQUEST as $key => $value){
            if (strpos($key, 'ol_')===0){
                $attr_name = substr($key, 3);
                if ($attr_name === 'table'){
                    continue;
                }
                $instance->$attr_name = $value;
            }
        }

        $id = R::store($instance);        
        return $id;
    }
    
    // A very dangerous method which removes data from database.
    function murder(){
        $model_name = $_REQUEST['ol_table'];
        $id = $_REQUEST['ol_id'];
        $book = R::load('book', $id);
        $instance = R::load($model_name, $id);
        R::trash( $instance );        
    }
    
    function take($table_name=null, $id=null){
        $table_name = ($table_name) ? $table_name : $this->guessTableName();
        $id = ($id) ? $id : $this->guessId();
        $instance = R::load($table_name, $id);
        return $instance;
    }

    function pollute(){
        $model_name = $_REQUEST['ol_table'];
        $id = $_REQUEST['ol_id'];
        $instance = R::load($model_name, $id);

        foreach($_REQUEST as $key => $value){
            if (strpos($key, 'ol_')===0){
                $attr_name = substr($key, 3);
                if ($attr_name === 'table'){
                    continue;
                }
                if ($attr_name === 'id'){
                    continue;
                }
                $instance->$attr_name = $value;
            }
        }

        $id = R::store($instance);                
        return $id;
    }
    
    /*
     * Fetch all rows from the table.
     * It guesses the table name if you don't provide.
     * @params String
     * @return Array of RedBean beans
     */
    function gather($table_name=null){
        $table_name = ($table_name) ? $table_name : $this->guessTableName();
        return R::findAll($table_name);
    }
    
    /*
     * Guess the table name by the $_REQUEST parameters.
     */
    function guessTableName(){
        return $_REQUEST['ol_table'];
    }

    function guessId(){
        return $_REQUEST['ol_id'];
    }

    
}
