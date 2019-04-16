<?php

class BigQueryConnection implements ConnectionInterface{
    
    private $bigQueryLib;

    public function attach($bigQueryLib){

        $this->bigQueryLib=$bigQueryLib;

    }

}


?>