<?php

interface ConnectionInterface{

    public function attach($bigQueryLib);

}


interface BsegInterface{

    public function subtotal($params);
    public function breakdown($params);
    public function ammount($params);

}



?>