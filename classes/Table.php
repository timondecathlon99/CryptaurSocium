<?php
/**
 * Created by PhpStorm.
 * User: Zhitkov
 * Date: 15.05.2018
 * Time: 15:39
 */
class Table extends Unit{

    protected $table;

    public function getTable(string $table){
        $this->table =  $table;
    }

    public function setTable(){
        return $this->table;
    }

    public function addColumn($name , $type){
        $add_sql = $this->pdo->prepare("ALTER TABLE ".$this->setTable()." ADD $name $type");
        $add_sql->execute();
    }



}