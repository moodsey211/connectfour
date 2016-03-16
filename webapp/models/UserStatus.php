<?php

class UserStatus extends CActiveRecord
{
    const IDLE = 0;
    const SINGLE = 1;
    const MULTIPLAYER = 2;
    const CHALLENGE = 3;

    public static function UpdateStatus($status)
    {
        $uid = Yii::app() -> user -> ID;

        $obj = self::model() -> findByAttributes(array('userid' => $uid));

        if(empty($obj)) {
            $obj = new UserStatus;

            $obj -> userid = $uid;
            $obj -> status = 0;
            $obj -> lastupdate_utc = gmdate('c');
            $obj -> lastupdate = date('c');
            
            $obj -> save();
        } else {
            $obj -> status = $status;
            $obj -> lastupdate_utc = gmdate('c');
            $obj -> lastupdate = date('c');
            
            $obj -> save();
        }

        $c = new CDbCriteria;

        $c -> condition = "timezone('UTC', CURRENT_TIMESTAMP) - lastupdate_utc > '5 minutes'::INTERVAL";

        self::model() -> deleteAll($c);
    }
    
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
    
    public function tableName()
    {
        return 'userstatus';
    }
}
