<?php

class CardRepository{
    function createBatch($amount, $prefix){
        for ($k = 0 ; $k < $amount; $k++){
            $card = R::dispense('cards');
            $card->number = $prefix . rand();
            $card->created_at = date('c');
            R::store($card);
        }        
      
    }
}
