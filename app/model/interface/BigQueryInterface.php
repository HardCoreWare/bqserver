<?php

interface ConnectionInterface{

    public function attach($bigQueryLib);

}

interface CountInterface{

    public function count();

}

interface BsegInterface{

    public function subtotal($params);
    public function breakdown($params);
    public function ammount($params);

}



?>