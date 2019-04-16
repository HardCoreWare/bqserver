<?php

namespace Pit\BigQuery\Model;

class Connection implements ConnectionInterface{
    
    private $bigQueryLib;

    public function attach($bigQueryLib){

        $this->bigQueryLib=$bigQueryLib;

    }

}


?>