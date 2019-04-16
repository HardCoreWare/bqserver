<?php

class Connection implements ConnectionInterface{

    protected $bigQueryLib;

    public function attach($bigQueryLib){

        $this->bigQueryLib=$bigQueryLib;

    }


}