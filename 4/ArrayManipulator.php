<?php

class ArrayManipulator{
    private $data = [];

    public function __get($name){
        return $this->data[$name];
    }

    public function __set($name, $value){
        $this->data[$name] = $value;
    }

    public function __isset($name){
        return isset($this->data[$name]);
    }

    public function __unset($name){
        unset($this->data[$name]);
    }

    public function __toString(){
        return json_encode($this->data);
    }
}

$array = new ArrayManipulator;
$array->__set(0, 1);
$array->__set('', 2);
echo "Get method " . $array->__get(0) . "<br>";

echo " isset method key 0" . var_export($array->__isset(0)) . "<br>";
echo " isset method key 3" . var_export($array->__isset(3)) . "<br>";

$array->__unset(0);
echo "After unsetting key 0 <br>";
echo " isset method key 0" . var_export($array->__isset(0)) . "<br>";

print_r($array);

?>