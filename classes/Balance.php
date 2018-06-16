<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 31.05.2018
 * Time: 21:58
 */
class Balance extends Unit{

    public function setTable()
    {
        return 'balance_actions';
    }

    public function currentUser()
    {
        $member = new Member($_COOKIE['member_id']);
        return $member->member_id();
    }



    public function setBalanceLike(int $element_id){
        $balanceActionType = new Post(6);
        $balanceActionType->getTable('actions_price');
        $type = $balanceActionType->postId();
        $author = $this->currentUser();
        $points = $balanceActionType->showField('price');
        $table =  $balanceActionType->showField('action_table');
        $time = time();
        /*------ IF there is already action for this post by this user--------*/
        $sql = $this->pdo->prepare("SELECT * FROM ".$this->setTable()." WHERE author='$author' AND action_table='$table' AND type='$type' AND element_id=:element_id");
        $sql->bindParam(':element_id', $element_id);
        $sql->execute();
        $balanceActionInfo = $sql->fetch(PDO::FETCH_LAZY);
        if($sql->rowCount() > 0){
            $sql = $this->pdo->prepare("DELETE FROM ".$this->setTable()." WHERE id='".$balanceActionInfo->id."'");
        }else{
            $sql = $this->pdo->prepare("INSERT INTO ".$this->setTable()."(type,author,element_id,action_table,points,publ_time)VALUES($type,$author,:element_id,'$table',$points,$time) ");
            $sql->bindParam(':element_id', $element_id);
        }
        $sql->execute();
    }

    public function setBalanceDislike(int $element_id){
        $balanceActionType = new Post(7);
        $balanceActionType->getTable('actions_price');
        $type = $balanceActionType->postId();
        $author = $this->currentUser();
        $points = $balanceActionType->showField('price');
        $table =  $balanceActionType->showField('action_table');
        $time = time();
        /*------ IF there is already action for this post by this user--------*/
        $sql = $this->pdo->prepare("SELECT * FROM ".$this->setTable()." WHERE author='$author' AND action_table='$table' AND type='$type' AND element_id=:element_id");
        $sql->bindParam(':element_id', $element_id);
        $sql->execute();
        $balanceActionInfo = $sql->fetch(PDO::FETCH_LAZY);
        if($sql->rowCount() > 0){
            $sql = $this->pdo->prepare("DELETE FROM ".$this->setTable()." WHERE id='".$balanceActionInfo->id."'");
        }else{
            $sql = $this->pdo->prepare("INSERT INTO ".$this->setTable()."(type,author,element_id,action_table,points,publ_time)VALUES($type,$author,:element_id,'$table',$points,$time) ");
            $sql->bindParam(':element_id', $element_id);
        }
        $sql->execute();
    }


    public function setBalanceRepost(int $element_id){
        $balanceActionType = new Post(8);
        $balanceActionType->getTable('actions_price');
        $type = $balanceActionType->postId();
        $author = $this->currentUser();
        $points = $balanceActionType->showField('price');
        $table =  $balanceActionType->showField('action_table');
        $time = time();
        /*------ IF there is already action for this post by this user--------*/
        $sql = $this->pdo->prepare("SELECT * FROM ".$this->setTable()." WHERE author='$author' AND action_table='$table' AND type='$type' AND element_id=:element_id");
        $sql->bindParam(':element_id', $element_id);
        $sql->execute();
        $balanceActionInfo = $sql->fetch(PDO::FETCH_LAZY);
        if($sql->rowCount() > 0){
            $sql = $this->pdo->prepare("DELETE FROM ".$this->setTable()." WHERE id='".$balanceActionInfo->id."'");
        }else{
            $sql = $this->pdo->prepare("INSERT INTO ".$this->setTable()."(type,author,element_id,action_table,points,publ_time)VALUES($type,$author,:element_id,'$table',$points,$time) ");
            $sql->bindParam(':element_id', $element_id);
        }
        $sql->execute();
    }

    public function setBalanceReference(int $element_id){
        $balanceActionType = new Post(5);
        $balanceActionType->getTable($this->setTable());
        $category =  $balanceActionType->description();
        $sql = $this->pdo->prepare("INSERT INTO ".$this->setTable()."(type,author,element_id,category,publ_time)VALUES($balanceActionType->postId(),$this->currentUser(),:element_id,$category,time()) ");
        $sql->bindParam(':element_id', $element_id);
        $sql->execute();
    }

    public function setBalanceInfluence(int $record_id, $item_table){
        $balanceType = new Post(4);
        $balanceType->getTable('actions_price');
        $recordReference = new Post($record_id);
        $recordReference->getTable($item_table);
        $time = time();
        $sql = $this->pdo->prepare("INSERT INTO ".$this->setTable()."(type,category,author,publ_time)VALUES($balanceType->postId(),$recordReference->category(),$this->currentUser(),$time) ");
        $sql->execute();
    }
}