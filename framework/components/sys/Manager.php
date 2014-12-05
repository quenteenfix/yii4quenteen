<?php
class Manager {

    public function __get($name){
        $factory = Factory::getInstance($this);

        $this->$name = $factory->getClass($name);

        return $this->$name;
    }

    public function __set($name, $value){
        $this->$name = $value;
    }
}