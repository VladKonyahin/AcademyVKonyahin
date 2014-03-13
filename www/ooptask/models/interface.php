<?php

interface dbFunction {

public function select();

public function insert($value);

public function update();

public function delete($index);

public function search($word);

public static function getList();
}
?>