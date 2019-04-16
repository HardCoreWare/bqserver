<?php

class BigQueryConnection implements ConnectionInterface{
    
    private $bigQueryLib=null;

    public function attach($bigQueryLib){

        $this->bigQueryLib=$bigQueryLib;

    }

}


?>