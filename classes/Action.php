<?
class Action extends Unit
{
    public function setTable(){
        return 'actions';
    }

    public function actionId(){
        return $this->showField('id');
    }

    public function setRecord(int $member, int $element_id){
        $element_group_id = 1;
        $time = time();
        $sql = $this->pdo->prepare("INSERT INTO ".$this->setTable()."(author,element_id,element_group_id,publ_time)VALUES(:member,:element_id,$element_group_id,$time) ");
        $sql->bindParam(':member', $member);
        $sql->bindParam(':element_id', $element_id);
        $sql->execute();
    }

    public function setSubscription(int $member, int $element_id){
        $element_group_id = 2;
        $time = time();
        $sql = $this->pdo->prepare("INSERT INTO ".$this->setTable()."(author,element_id,element_group_id,publ_time)VALUES(:member,:element_id,$element_group_id,$time) ");
        $sql->bindParam(':member', $member);
        $sql->bindParam(':element_id', $element_id);
        $sql->execute();
    }

    public function setUnsubscription(int $member, int $element_id){
        $element_group_id = 7;
        $time = time();
        $sql = $this->pdo->prepare("INSERT INTO ".$this->setTable()."(author,element_id,element_group_id,publ_time)VALUES(:member,:element_id,$element_group_id,$time) ");
        $sql->bindParam(':member', $member);
        $sql->bindParam(':element_id', $element_id);
        $sql->execute();
    }

    public function setComment(int $member, int $element_id){
        $element_group_id = 3;
        $time = time();
        $sql = $this->pdo->prepare("INSERT INTO ".$this->setTable()."(author,element_id,element_group_id,publ_time)VALUES(:member,:element_id,$element_group_id,$time) ");
        $sql->bindParam(':member', $member);
        $sql->bindParam(':element_id', $element_id);
        $sql->execute();
    }

    public function setLike(int $member, int $element_id){
        $element_group_id = 4;
        $time = time();
        $sql = $this->pdo->prepare("INSERT INTO ".$this->setTable()."(author,element_id,element_group_id,publ_time)VALUES(:member,:element_id,$element_group_id,$time) ");
        $sql->bindParam(':member', $member);
        $sql->bindParam(':element_id', $element_id);
        $sql->execute();
    }


    public function setDislike(int $member, int $element_id){
        $element_group_id = 5;
        $time = time();
        $sql = $this->pdo->prepare("INSERT INTO ".$this->setTable()."(author,element_id,element_group_id,publ_time)VALUES(:member,:element_id,$element_group_id,$time) ");
        $sql->bindParam(':member', $member);
        $sql->bindParam(':element_id', $element_id);
        $sql->execute();
    }

    public function setRepost(int $member, int $element_id){
        $element_group_id = 6;
        $time = time();
        $sql = $this->pdo->prepare("INSERT INTO ".$this->setTable()."(author,element_id,element_group_id,publ_time)VALUES(:member,:element_id,$element_group_id,$time) ");
        $sql->bindParam(':member', $member);
        $sql->bindParam(':element_id', $element_id);
        $sql->execute();
    }



    public function setReference(){

    }

    public function description()
    {
        return $this->showField('description');
    }

    public function actionTable()
    {
        return $this->showField('action_table');
    }

    public function actionType()
    {
        return $this->showField('element_group_id');
    }

    public function author()
    {
        return $this->showField('author');
    }

    public function publTime(){
        return date_format_rus($this->showField('publ_time'));
    }
}
