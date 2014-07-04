<?php

require_once( 'Outlaw/Outlaw.php' );

class OutlawWrapper {

    protected $outlaw_instance;
 
    function __construct(){
        $this->outlaw_instance = new Outlaw();
    }
    
    function __call($method, $arguments){
        return call_user_func_array( array($this->outlaw_instance, $method), $arguments);
    }

}
