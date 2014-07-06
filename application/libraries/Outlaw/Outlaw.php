<?php

require_once(realpath(dirname(__FILE__)) . '/src/rb.php');
require_once(__DIR__ . '/src/Valitron/Validator.php');
require_once(__DIR__ . '/src/Exceptions.php');
use Valitron\Validator as V;
class Outlaw{
    
    protected $validate;
    protected $errors;
    protected $uploadPath;
    
    function __construct(){
      
        require_once('config.php');

        R::setup($config['database']['dns'], $config['database']['user'], $config['database']['password']);    
        
        V::langDir(__DIR__.'/src/Valitron/lang'); // always set langDir before lang.
        V::lang($config['lang']);
        
        $this->validate = $config['rules'];
        
        $this->uploadPath = $config['upload_path'];                
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

        foreach($_FILES as $key => $value){
            if (strpos($key, 'ol_')!==0){
                continue;
            }
            // Save the file in the path.
            $tmp_name = $_FILES[$key]["tmp_name"];
            $token = md5_file($tmp_name);
            $name = $token . '_' . $_FILES[$key]["name"];            
            move_uploaded_file($tmp_name, $this->uploadPath . "$name");            
            // Save the file name so we could find it.
            $attr_name = substr($key, 3);
            $instance->$attr_name = $name;
        }

        $id = R::store($instance);        
        return $id;
    }
    
    function getErrors(){
        return $this->errors;
    }
    
    // A very dangerous method which removes data from database.
    function murder($table_name, $id){
        $instance = R::load($table_name, $id);
        R::trash( $instance );        
    }
    
    function take($table_name=null, $id=null){
        if (!$table_name) throw new OutlawNoTableName();
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
    
}
