<?php

require_once(realpath(dirname(__FILE__)) . '/src/rb.php');
require_once(__DIR__ . '/src/Valitron/Validator.php');
require_once(__DIR__ . '/src/Exceptions.php');
use Valitron\Validator as V;
class Outlaw{
    
    protected $validate;
    protected $errors;
    function __construct(){
        $configs = array(
            'dns' => 'mysql:host=localhost;dbname=koala',
            'db_user' => 'koala',
            'db_password' => 'koala'
        );

        R::setup($configs['dns'], $configs['db_user'], $configs['db_password']);    
        
        V::langDir(__DIR__.'/src/Valitron/lang'); // always set langDir before lang.
        V::lang('en');
        
        $this->validate = array(
            'articles' => array(
                // notice the attribute is wrapped in an array even it's just a string
                'required' => [['ol_title'], ['ol_content']],
                'lengthMin' => [['ol_title', 5], ['ol_content', 10]]
            ),
            'stores' => [
                'required' => [ ['ol_name'], ['ol_boss'], ['ol_phone'], ['ol_address'] ]
            ]
        );
                
    }

    /*
     * A very dangerous method which inserting data into database.
     * 
     */
    function inject($table_name=null){
        if (!$table_name) throw new OutlawNoTableName();

        # TODO:
        # throw new NoModelNameException('');

        $instance = $book = R::dispense($table_name);

        foreach($_REQUEST as $key => $value){
            if (strpos($key, 'ol_')===0){
                $attr_name = substr($key, 3);
                // This is used for determine the table
                // Don't do anything here.
                if ($attr_name === 'table'){
                    continue;
                }
                // This is used for one-to-many relationship.
                // Assign the parent for the instance.
                if (strpos($attr_name, 'belong_')===0){
                    $parent_name = substr($attr_name, 7);                  
                    $parent_instance = R::load($parent_name, $value);
                    $instance->$parent_name = $parent_instance;
                }
                // This is just table column.
                // So assign the value for it.
                else{
                    $instance->$attr_name = $value;                  
                }

            }
        }

        $v = new Valitron\Validator($_REQUEST);
        $rules = $this->validate[$table_name];
        $v->rules($rules);
        if(!$v->validate()) {
            $this->errors = $v->errors();
            return false;
        }

        $id = R::store($instance);        
        return $id;
    }
    
    function getErrors(){
        return $this->errors;
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
        if (!$table_name) throw new OutlawNoTableName();
        $id = ($id) ? $id : $this->guessId();
        $instance = R::load($table_name, $id);
        return $instance;
    }

    function pollute($table_name=null){
        if (!$table_name) throw new OutlawNoTableName();
        $id = $_REQUEST['ol_id'];
        $instance = R::load($table_name, $id);

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

        $v = new Valitron\Validator($_REQUEST);
        $rules = $this->validate[$table_name];
        $v->rules($rules);
        if(!$v->validate()) {
            $this->errors = $v->errors();
            return false;
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
        if (!$table_name) throw new OutlawNoTableName();
        return R::findAll($table_name);
    }
    
    function guessId(){
        return $_REQUEST['ol_id'];
    }    
    
}
