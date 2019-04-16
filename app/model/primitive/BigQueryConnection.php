<?php

class Connection implements ConnectionInterface{
    
    private $bigQueryLib;

    public function attach($bigQueryLib){

        $this->bigQueryLib=$bigQueryLib;

    }

}


?>