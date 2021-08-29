<?php
abstract class alap {

    public $class_name;

    public function __construct(){
        
    }

    public function setname() {
        $this->class_name = __CLASS__;
    }

}

class peldany extends alap {

    public function __construct() {

        $this->setname();

        var_dump($this->class_name);

    }

}
echo "Indit";
$peldany = new peldany();
?>